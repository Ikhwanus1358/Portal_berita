<?php

namespace App\Models;

use CodeIgniter\Model;

class m_kategori extends Model
{
    protected $table = 'kategori';
    protected $primarykey = 'id_kat';
    protected $allowedFields = ['id_kat', 'kategori', 'alias', 'terbit'];

    public function edit($data, $id)
    {
        return $this->db->table('kategori')->update($data, ['id_kat' => $id]);
    }
}
