<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\m_member;

class Member extends BaseController
{
    public function __construct()
    {
        $this->m_member = new m_member();
    }

    public function index()
    {
        $member = $this->m_member->findAll();

        $data = [
            'title' => 'SIXNEWS | Member',
            'member' => $member
        ];

        return view('admin/member', $data);
    }

    public function hapus($id)
    {
        $this->m_member->where('id_member', $id)->delete();
        session()->setFlashdata('pesan', 'data berhasil dihapus!');
        return redirect()->to('/admin/member');
    }
}
