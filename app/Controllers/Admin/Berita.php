<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\m_berita;
use App\Models\m_kategori;

class Berita extends BaseController
{
    public function __construct()
    {
        $this->m_berita = new m_berita();
        $this->m_kategori = new m_kategori();
    }

    public function index()
    {
        if (isset($_POST['search'])) {
            $keyword = $this->request->getPost('keyword');
            $berita = $this->m_berita->get_keyword($keyword);
            $kategori = $this->m_kategori->where('terbit', '1')->findAll();

            $data = [
                'title' => 'SIXNEWS | Berita',
                'berita' => $berita,
                'kategori' => $kategori,
                'validation' => \Config\Services::validation()
            ];

            return view('admin/berita', $data);
        }

        $berita = $this->m_berita->get_data()->get()->getResultArray();
        $kategori = $this->m_kategori->where('terbit', '1')->findAll();

        $data = [
            'title' => 'SIXNEWS | Berita',
            'berita' => $berita,
            'kategori' => $kategori,
            'validation' => \Config\Services::validation()
        ];

        return view('admin/berita', $data);
    }

    public function tambah()
    {
        if (isset($_POST['tambah'])) {
            if (!$this->validate([
                'judul' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'kategori' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Silahkan pilih {field}',
                    ]
                ],
                'ket' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'keterangan gambar tidak boleh kosong',
                    ]
                ],
                'isi' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} berita tidak boleh kosong',
                    ]
                ],
                'gambar' => [
                    'rules' => 'uploaded[gambar]|max_size[gambar,2048]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg, image/png]',
                    'errors' => [
                        'uploaded' => 'pilih gambar terlebih dahulu',
                        'max_size' => 'ukuran gambar terlalu besar (max 2 mb)',
                        'is_image' => 'yang anda pilih bukan gambar',
                        'mime_in' => 'format yang diperbolehkan (jpg, jpeg, png)'
                    ]
                ],

            ])) {
                session()->setFlashdata('msg', 'Gagal menambahkan data');
                $validation = session()->setFlashdata('gagal', \Config\Services::validation()->listErrors());
                return redirect()->to('/admin/berita')->withInput()->with('validation', $validation);
            }
        }

        $file = $this->request->getFile('gambar');
        $file->move('img');

        $data = [
            'judul' => $this->request->getPost('judul'),
            'id_kat' => $this->request->getPost('kategori'),
            'isi' => $this->request->getPost('isi'),
            'gambar' => $file->getName(),
            'ket' => $this->request->getPost('ket'),
            'hari' => $this->request->getPost('hari'),
            'tanggal' => $this->request->getPost('tanggal'),
            'id_admin' => $this->request->getPost('id_admin'),
            'viewnum' => $this->request->getPost('viewnum'),
            'terbit' => $this->request->getPost('terbit')
        ];

        $succes = $this->m_berita->insert($data);
        if ($succes) {
            session()->setFlashdata('pesan', 'data berhasil ditambahkan!');
            return redirect()->to('/admin/berita');
        }
    }

    public function hapus($id)
    {
        $berita = $this->m_berita->find($id);

        unlink('img/' . $berita['gambar']);

        $this->m_berita->where('id', $id)->delete();
        session()->setFlashdata('pesan', 'data berhasil dihapus!');
        return redirect()->to('/admin/berita');
    }

    public function edit()
    {
        $id = $this->request->getPost('edit');

        $ber = $this->m_berita->where('id', $id)->first();

        $data = [
            'title' => 'SIXNEWS | Berita',
            'ber' => $ber,
            'berita' => $this->m_berita->get_data()->get()->getResultArray(),
            'kategori' => $this->m_kategori->where('terbit', '1')->findAll()
        ];

        return view('/admin/berita', $data);
    }

    public function update()
    {
        $id = $this->request->getPost('id');

        $file = $this->request->getFile('gambar');

        if ($file->getError() == 4) {
            $namaGambar = $this->request->getVar('gambarLama');
        } else {
            $namaGambar = $file->getName();

            $file->move('img', $namaGambar);

            unlink('img/' . $this->request->getVar('gambarLama'));
        }

        $data = [
            'judul' => $this->request->getPost('judul'),
            'id_kat' => $this->request->getPost('kategori'),
            'isi' => $this->request->getPost('isi'),
            'gambar' => $namaGambar,
            'ket' => $this->request->getPost('ket'),
            'hari' => $this->request->getPost('hari'),
            'tanggal' => $this->request->getPost('tanggal'),
            'id_admin' => $this->request->getPost('id_admin'),
            'view_num' => $this->request->getPost('viewnum'),
            'terbit' => $this->request->getPost('terbit')
        ];

        $succes = $this->m_berita->edit($data, $id);
        if ($succes) {
            session()->setFlashdata('pesan', 'data berhasil diubah');
            return redirect()->to('/admin/berita');
        }
    }
}
