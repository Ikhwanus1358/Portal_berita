<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\m_administrator;

class User_admin extends BaseController
{
    public function __construct()
    {
        $this->m_administrator = new m_administrator();
    }

    public function index()
    {
        $admin = $this->m_administrator->findAll();

        $data = [
            'title' => 'SIXNEWS | Administrator',
            'admin' => $admin,
            'validation' => \Config\Services::validation()
        ];

        return view('admin/user_admin', $data);
    }

    public function tambah()
    {
        if (isset($_POST['tambah'])) {
            if (!$this->validate([
                'nama' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus di isi'
                    ]
                ],
                'username' => [
                    'rules' => 'required|is_unique[administrator.username]',
                    'errors' => [
                        'required' => '{field} harus di isi',
                        'is_unique' => '{field} sudah dipakai'
                    ]
                ],
                'password' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus di isi'
                    ]
                ],
                'email' => [
                    'rules' => 'valid_email',
                    'errors' => [
                        'valid_email' => 'format {field} tidak sesuai'
                    ]
                ],
            ])) {
                session()->setFlashdata('msg', 'Gagal menambahkan data');
                $validation = session()->setFlashdata('gagal', \Config\Services::validation()->listErrors());
                return redirect()->to('/admin/user_admin')->withInput()->with('validation', $validation);
            }
        }

        $nama = $this->request->getPost('nama');
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $email = $this->request->getPost('email');

        $data = [
            'nama' => $nama,
            'username' => $username,
            'password' => $password,
            'email' => $email
        ];

        $success = $this->m_administrator->insert($data);

        if ($success) {
            session()->setFlashdata('pesan', 'data berhasil ditambahkan');
            return redirect()->to('admin/user_admin');
        }
    }

    public function hapus($id)
    {
        $this->m_administrator->where('id_admin', $id)->delete();
        session()->setFlashdata('pesan', 'data berhasil dihapus');
        return redirect()->to('admin/user_admin');
    }

    public function edit()
    {
        $id = $this->request->getPost('edit');

        $adm = $this->m_administrator->where('id_admin', $id)->first();

        $data = [
            'title' => 'SIXNEWS | User Admin',
            'ad' => $adm,
            'admin' => $this->m_administrator->findAll()
        ];

        return view('/admin/user_admin', $data);
    }

    public function update()
    {
        $id = $this->request->getPost('id_admin');

        $data = [
            'nama' => $this->request->getPost('nama'),
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'email' => $this->request->getPost('email'),
        ];

        $succes = $this->m_administrator->edit($data, $id);
        if ($succes) {
            session()->setFlashdata('pesan', 'data berhasil diupdate');
            return redirect()->to('/admin/user_admin');
        }
    }
}
