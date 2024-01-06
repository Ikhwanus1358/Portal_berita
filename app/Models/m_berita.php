<?php

namespace App\Models;

use CodeIgniter\Model;

class m_berita extends Model
{
    protected $table = 'berita';
    protected $allowedFields = ['id', 'judul', 'id_kat', 'isi', 'gambar', 'ket', 'hari', 'tanggal', 'view_num', 'terbit', 'id_admin'];

    public function get_data()
    {
        return $this->db->table('berita')
            ->select(['berita.id', 'berita.judul', 'berita.isi', 'berita.gambar', 'berita.ket', 'berita.hari', 'berita.tanggal', 'berita.view_num', 'berita.terbit', 'administrator.id_admin', 'administrator.nama', 'kategori.id_kat', 'kategori.kategori', 'kategori.alias'])
            ->join('kategori', 'kategori.id_kat=berita.id_kat')
            ->join('administrator', 'administrator.id_admin=berita.id_admin');
    }

    public function get_list($kategori)
    {
        return $this->db->table('berita')->select(['berita.id', 'berita.judul', 'berita.isi', 'berita.gambar', 'berita.ket', 'berita.hari', 'berita.tanggal', 'berita.view_num', 'berita.terbit', 'administrator.id_admin', 'administrator.nama', 'kategori.id_kat', 'kategori.kategori', 'kategori.alias'])
            ->join('kategori', 'kategori.id_kat=berita.id_kat')
            ->join('administrator', 'administrator.id_admin=berita.id_admin')->where(['alias' => $kategori, 'berita.terbit' => '1'])->get()->getResultArray();
    }

    public function get_berita($id)
    {
        return $this->db->table('berita')
            ->join('kategori', 'kategori.id_kat=berita.id_kat')
            ->join('administrator', 'administrator.id_admin=berita.id_admin')->where(['id' => $id])->get()->getRowArray();
    }

    public function berita_populer()
    {
        return $this->db->table('berita')->where('terbit', '1')->orderBy('view_num', 'DESC')->limit(5)->get()->getResultArray();
    }

    public function get_keyword($keyword)
    {
        return $this->db->table('berita')
            ->join('kategori', 'kategori.id_kat=berita.id_kat')
            ->join('administrator', 'administrator.id_admin=berita.id_admin')
            ->like('berita.judul', $keyword)
            ->orlike('berita.isi', $keyword)
            ->where('berita.terbit', '1')->get()->getResultArray();
    }

    public function edit($data, $id)
    {
        return $this->db->table('berita')->update($data, ['id' => $id]);
    }

    public function get_search($keyword)
    {
        return $this->db->table('berita')
            ->select(['berita.id', 'berita.judul', 'berita.isi', 'berita.gambar', 'berita.ket', 'berita.hari', 'berita.tanggal', 'berita.view_num', 'berita.terbit', 'administrator.id_admin', 'administrator.nama', 'kategori.id_kat', 'kategori.kategori', 'kategori.alias'])
            ->join('kategori', 'kategori.id_kat=berita.id_kat')
            ->join('administrator', 'administrator.id_admin=berita.id_admin')
            ->like('berita.judul', $keyword)
            ->orlike('berita.isi', $keyword)
            ->get()->getResultArray();
    }
}
