<?php

namespace App\Controllers;

use App\Models\m_berita;
use App\Models\m_kategori;

class Home extends BaseController
{
    protected $m_berita;
    protected $m_kategori;

    public function __construct()
    {
        $this->m_berita = new m_berita();
        $this->m_kategori = new m_kategori();
    }

    public function index()
    {
        $berita_populer = $this->m_berita->berita_populer();
        $kategori = $this->m_kategori->where('terbit', '1')->findAll();
        $berita = $this->m_berita->get_data()->where('berita.terbit', '1')->orderBy('tanggal', 'DESC')->get()->getResultArray();

        $data = [
            'title' => 'SIXNEWS | Portal Berita terpercaya',
            'berita' => $berita,
            'berita_populer' => $berita_populer,
            'kategori' => $kategori,
        ];

        return view('/home', $data);
    }

    public function kategori($kategori)
    {
        $berita = $this->m_berita->get_list($kategori);
        $berita_populer = $this->m_berita->berita_populer();
        $kategori = $this->m_kategori->where('terbit', '1')->findAll();

        $data = [
            'title' => 'SIXNEWS | Portal Berita terpercaya',
            'berita' => $berita,
            'berita_populer' => $berita_populer,
            'kategori' => $kategori,
        ];

        return view('/home', $data);
    }

    public function search()
    {
        $keyword = $this->request->getPost('keyword');
        $berita = $this->m_berita->get_keyword($keyword);
        $berita_populer = $this->m_berita->berita_populer();
        $kategori = $this->m_kategori->where('terbit', '1')->findAll();

        $data = [
            'title' => 'SIXNEWS | Portal Berita terpercaya',
            'berita' => $berita,
            'berita_populer' => $berita_populer,
            'kategori' => $kategori,
        ];

        return view('/home', $data);
    }
}
