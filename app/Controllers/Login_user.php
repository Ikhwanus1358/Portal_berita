<?php

namespace App\Controllers;

use App\Models\m_member;

class Login_user extends BaseController
{
    public function __construct()
    {
        $this->m_member = new m_member();
    }

    public function auth()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $member = $this->m_member->where('email', $email)->first();

        if (empty($member)) {
            session()->setFlashdata('pesan', 'Username email');
            return redirect()->to('/')->withInput();
        }
        if ($member['password'] != $password) {
            session()->setFlashdata('pesan', 'Password Salah');
            return redirect()->to('/')->withInput();
        }

        $data = [
            'id_member' => $member['id_member'],
            'nama' => $member['nama'],
        ];

        session()->set($data);
        return redirect()->to('/');
    }

    public function daftar()
    {
        $nama = $this->request->getPost('nama');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $no_telp = $this->request->getPost('no_telp');
        $jk = $this->request->getPost('jenis_kelamin');

        $data = [
            'nama' => $nama,
            'email' => $email,
            'password' => $password,
            'no_telp' => $no_telp,
            'jenis_kelamin' => $jk
        ];

        $succes = $this->m_member->insert($data);
        if ($succes) {
            session()->setFlashdata('daftar_success', 'pendaftaran berhasil');
            return redirect()->to('/');
        }
    }

    public function logout()
    {
        $data = [
            'id_member',
            'nama',
        ];
        session()->remove($data);
        return redirect()->to('/');
    }
}
