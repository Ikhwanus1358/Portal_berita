<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\m_administrator;

class Login extends BaseController
{
    public function __construct()
    {
        $this->m_administrator = new m_administrator();
    }

    public function index()
    {
        $data = [
            'title' => 'SIXNEWS | Login Administrator',
            'validation' => \Config\Services::validation()
        ];

        return view('admin/login', $data);
    }

    public function auth()
    {
        if (isset($_POST['login'])) {
            if (!$this->validate([
                'username' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama Pengguna tidak boleh kosong',
                    ]
                ],
                'password' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kata Sandi tidak boleh kosong',
                    ]
                ],
            ])) {
                $validation = session()->setFlashdata('gagal', \Config\Services::validation()->listErrors());
                return redirect()->to('/admin/login')->withInput()->with('validation', $validation);
            }
        }

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $admin = $this->m_administrator->where('username', $username)->orWhere('email', $username)->first();

        if (empty($admin)) {
            session()->setFlashdata('pesan', 'Nama Pengguna / Email salah');
            return redirect()->to('/admin/login')->withInput();
        }
        if ($admin['password'] != $password) {
            session()->setFlashdata('pesan', 'Kata Sandi salah');
            return redirect()->to('/admin/login/')->withInput();
        }

        $data = [
            'id' => $admin['id_admin'],
            'username' => $username,
            'nama_admin' => $admin['nama'],
            'email' => $admin['email'],
            'role' => $admin['role']
        ];

        session()->set($data);

        if ($admin['role'] == 'penulis') {
            return redirect()->to('/admin/berita');
        }

        return redirect()->to('/admin/home');
    }

    public function logout()
    {
        $data = [
            'id',
            'username',
            'nama_admin',
            'email',
            'role',
        ];
        session()->remove($data);
        return redirect()->to('/admin/login');
    }
}
