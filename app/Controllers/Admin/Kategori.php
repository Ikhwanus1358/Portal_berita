<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\m_kategori;

class Kategori extends BaseController
{
    public function __construct()
    {
        $this->m_kategori = new m_kategori();
    }

    public function index()
    {
        $kategori = $this->m_kategori->findAll();

        $data = [
            'title' => 'SIXNEWS | Kategori',
            'kategori' => $kategori,
            'validation' => \Config\Services::validation()
        ];

        return view('admin/kategori', $data);
    }

    public function tambah()
    {
        if (isset($_POST['tambah'])) {
            if (!$this->validate([
                'kategori' => [
                    'rules' => 'required|is_unique[kategori.kategori]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_unique' => '{field} sudah ada'
                    ]
                ]
            ])) {
                session()->setFlashdata('msg', 'Gagal menambahkan data');
                $validation = session()->setFlashdata('gagal', \Config\Services::validation()->listErrors());
                return redirect()->to('/admin/kategori')->withInput()->with('validation', $validation);
            }
        }

        $kategori = $this->request->getPost('kategori');
        $alias = url_title($this->request->getPost('kategori'), '_', true);
        $terbit = $this->request->getPost('terbit');

        $data = [
            'kategori' => $kategori,
            'alias' => $alias,
            'terbit' => $terbit
        ];

        $succes = $this->m_kategori->insert($data);
        if ($succes) {
            session()->setFlashdata('pesan', 'data berhasil ditambahkan!');
            return redirect()->to('/admin/kategori');
        }
    }

    public function hapus($id)
    {
        $this->m_kategori->where('id_kat', $id)->delete();
        session()->setFlashdata('pesan', 'data berhasil dihapus!');
        return redirect()->to('/admin/kategori');
    }

    public function edit()
    {
        $id = $this->request->getPost('edit');

        $kat = $this->m_kategori->where('id_kat', $id)->first();

        $data = [
            'title' => 'SIXNEWS | Kategori',
            'kat' => $kat,
            'kategori' => $this->m_kategori->findAll()
        ];

        return view('/admin/kategori', $data);
    }

    public function update()
    {
        $id = $this->request->getPost('id_kat');

        $data = [
            'kategori' => $this->request->getPost('kategori'),
            'alias' => $this->request->getPost('alias'),
            'terbit' => $this->request->getPost('terbit')
        ];

        $succes = $this->m_kategori->edit($data, $id);
        if ($succes) {
            session()->setFlashdata('pesan', 'data berhasil diupdate');
            return redirect()->to('/admin/kategori');
        }
    }
}
