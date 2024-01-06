<?php

namespace App\Models;

use CodeIgniter\Model;

class m_komentar extends Model
{
    protected $table = 'komentar';
    protected $primarykey = 'id_komen';
    protected $allowedFields = ['id_komen', 'komentar', 'id', 'id_member'];

    public function get_komentar($id)
    {
        return $this->db->table('komentar')
            ->join('member', 'member.id_member=komentar.id_member')
            ->where(['id' => $id])->get()->getResultArray();
    }

    public function komentar()
    {
        return $this->db->table('komentar')
            ->select(['komentar.id_komen', 'member.nama', 'komentar.komentar', 'berita.judul', 'berita.id', 'count(*) as jml_komen'])
            ->join('berita', 'berita.id=komentar.id')
            ->join('member', 'member.id_member=komentar.id_member')->groupBy('berita.judul')->get()->getResultArray();
    }

    public function lihat_komentar($id)
    {
        return $this->db->table('komentar')
            ->select(['komentar.id_komen', 'member.nama', 'komentar.komentar', 'berita.judul'])
            ->join('berita', 'berita.id=komentar.id')
            ->join('member', 'member.id_member=komentar.id_member')->where('berita.id', $id);
    }
}
