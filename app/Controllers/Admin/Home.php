<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Home extends BaseController
{

    public function index()
    {
        $data = [
            'title' => 'SIXNEWS | Dashboard'
        ];
        return view('admin/home', $data);
    }
}
