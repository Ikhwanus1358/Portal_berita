<?php

namespace App\Models;

use CodeIgniter\Model;

class m_administrator extends Model
{
    protected $table = 'administrator';
    protected $primarykey = 'id_admin';
    protected $allowedFields = ['id_admin', 'nama', 'username', 'password', 'email'];

    public function edit($data, $id)
    {
        return $this->db->table('administrator')->update($data, ['id_admin' => $id]);
    }

    public function get_data($username, $password)
    {
        return $this->db->table('administrator')
            ->where(array('username' => $username, 'password' => $password))
            ->get()->getRowArray();
    }
}
