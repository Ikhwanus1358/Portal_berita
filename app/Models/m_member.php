<?php

namespace App\Models;

use CodeIgniter\Model;

class m_member extends Model
{
    protected $table = 'member';
    protected $primarykey = 'id_member';
    protected $allowedFields = ['id_member', 'nama', 'email', 'password', 'jenis_kelamin', 'no_telp'];
}
