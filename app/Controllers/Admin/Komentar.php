<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\m_komentar;

class Komentar extends BaseController
{
    public function __construct()
    {
        $this->m_komentar = new m_komentar();
    }

    public function index()
    {
        $komentar = $this->m_komentar->komentar();

        $data = [
            'title' => 'SIXNEWS | Komentar',
            'komentar' => $komentar
        ];

        return view('admin/komentar', $data);
    }

    public function show()
    {
        $id = $this->request->getPost('lihat');
        $komentar = $this->m_komentar->komentar();
        $showKomen = $this->m_komentar->lihat_komentar($id)->get()->getResultArray();;
        $show = $this->m_komentar->lihat_komentar($id)->get()->getRowArray();

        $data = [
            'title' => 'SIXNEWS | Komentar',
            'komentar' => $komentar,
            'showKomen' => $showKomen,
            'show' => $show
        ];

        return view('admin/komentar', $data);
    }

    public function hapus($id)
    {
        $this->m_komentar->where('id_komen', $id)->delete();
        session()->setFlashdata('pesan', 'data berhasil dihapus!');
        return redirect()->to('/admin/komentar');
    }
}
