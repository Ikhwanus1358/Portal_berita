<?php

namespace App\Controllers;

use App\Models\m_berita;
use App\Models\m_kategori;
use App\Models\m_komentar;

class Page extends BaseController
{
    protected $m_berita;
    protected $m_kategori;
    protected $m_komentar;

    public function __construct()
    {
        $this->m_berita = new m_berita();
        $this->m_kategori = new m_kategori();
        $this->m_komentar = new m_komentar();
    }

    public function open($id)
    {
        $kategori = $this->m_kategori->where('terbit', '1')->findAll();
        $berita = $this->m_berita->get_berita($id);
        $berita_populer = $this->m_berita->berita_populer();
        $komentar = $this->m_komentar->get_komentar($id);

        $data = [
            'title' => 'SIXNEWS | Portal Berita Terpercaya',
            'berita' => $berita,
            'berita_populer' => $berita_populer,
            'kategori' => $kategori,
            'komentar' => $komentar
        ];

        return view('/page', $data);
    }

    public function komentar()
    {
        $id_berita = $this->request->getPost('id_berita');
        $id_member = $this->request->getPost('id_member');
        $komentar = $this->request->getPost('komentar');

        $data = [
            'id' => $id_berita,
            'id_member' => $id_member,
            'komentar' => $komentar
        ];

        if ($id_member == null) {
            return redirect()->to('/' . $id_berita);
        }

        $succes = $this->m_komentar->insert($data);
        if ($succes) {
            session()->setFlashdata('pesan', 'data berhasil ditambahkan!');
            return redirect()->to('/' . $id_berita);
        }
    }
}
