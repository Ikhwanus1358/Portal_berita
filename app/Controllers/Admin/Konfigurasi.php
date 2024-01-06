<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Konfigurasi extends BaseController
{

    public function index()
    {
        $data = [
            'title' => 'SIXNEWS | Konfigurasi',
            'validation' => \Config\Services::validation()
        ];
        return view('admin/konfigurasi', $data);
    }

    public function updatelogo()
    {
        if (isset($_POST['updateLogo'])) {
            if (!$this->validate([
                'logo' => [
                    'rules' => 'uploaded[logo]|max_size[logo,2048]|is_image[logo]|mime_in[logo,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                        'uploaded' => 'pilih gambar terlebih dahulu',
                        'max_size' => 'ukuran gambar terlalu besar (max 2 mb)',
                        'is_image' => 'yang anda pilih bukan gambar',
                        'mime_in' => 'format yang diperbolehkan (jpg, jpeg, png)'
                    ]
                ],
            ])) {
                session()->setFlashdata('msg', 'Gagal mengubah logo');
                $validation = session()->setFlashdata('gagal', \Config\Services::validation()->listErrors());
                return redirect()->to('/admin/konfigurasi')->withInput()->with('validation', $validation);
            }
        }

        $file = $this->request->getFile('logo');

        unlink('img/' . 'logo.png');

        $namaFile = 'logo.png';

        $file->move('img', $namaFile);
        return redirect()->to('/admin/konfigurasi');
    }

    public function updateIcon()
    {
        if (isset($_POST['updateIcon'])) {
            if (!$this->validate([
                'icon' => [
                    'rules' => 'uploaded[icon]|max_size[icon,1024]|is_image[icon]|mime_in[icon,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                        'uploaded' => 'pilih gambar terlebih dahulu',
                        'max_size' => 'ukuran gambar terlalu besar (max 1 mb)',
                        'is_image' => 'yang anda pilih bukan gambar',
                        'mime_in' => 'format yang diperbolehkan (jpg, jpeg, png)'
                    ]
                ],
            ])) {
                session()->setFlashdata('msg', 'Gagal mengubah logo');
                $validation = session()->setFlashdata('gagal', \Config\Services::validation()->listErrors());
                return redirect()->to('/admin/konfigurasi')->withInput()->with('validation', $validation);
            }
        }

        $file = $this->request->getFile('icon');

        unlink('img/' . 'icon.ico');

        $namaFile = 'icon.ico';

        $file->move('img/', $namaFile);

        return redirect()->to('/admin/konfigurasi');
    }
}
