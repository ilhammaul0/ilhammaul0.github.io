<?php

namespace App\Controllers;

use App\Models\DeveloperModel;

class Developer extends BaseController
{
    protected $developerModel;

    public function __construct()
    {
        $this->developerModel = new DeveloperModel();
    }

    public function index()
    {
        $currentPage = $this->request->getVar('page_developer') ? $this->request->getVar('page_developer') : 1;

        $data = [
            'title' => 'Developer',
            'developer' => $this->developerModel->withDeleted()->findAll(),
            'currentPage' => $currentPage
        ];

        return view('developer/index', $data);
    }

    public function detail($slug)
    {
        $data = [
            'title' => 'Detail Developer',
            'developer' => $this->developerModel->getDeveloper($slug)
        ];
        // jika app tidak ada di tabel
        if (empty($data['developer'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama Developer ' . $slug . ' tidak ditemukan');
        }
        return view('developer/detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Form Tambah Developer App',
            'validation' => \Config\Services::validation()
        ];
        return view('developer/create', $data);
    }

    public function save()
    {
        // validasi input
        if (!$this->validate([
            'fullname' => [
                'rules' => 'required|is_unique[developer.fullname]',
                'errors' => [
                    'required' => 'Nama developer harus diisi.',
                    'is_unique' => 'Nama developer sudah tersedia.'
                ],
                'foto' => [
                    'rules' => 'max_size[foto,1024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                        'max_size' => 'Ukuran foto terlalu besar',
                        'is_image' => 'Yang anda pilih bukan foto',
                        'mime_in' => 'Yang anda pilih bukan foto'
                    ]
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();
            return redirect()->to('/developer/create')->withInput();
        }
        // ambil foto
        $fileFoto = $this->request->getFile('foto');
        // cek apakah tidak ada foto yang diupload
        if ($fileFoto->getError() == 4) {
            $namaFoto = 'user.png';
        } else {
            // generate nama foto random
            $namaFoto = $fileFoto->getRandomName();
            // pindahkan  file ke folder img
            $fileFoto->move('img', $namaFoto);
        }

        $slug = url_title($this->request->getVar('fullname'), '-', true);
        $this->developerModel->save([
            'fullname' => $this->request->getVar('fullname'),
            'slug' => $slug,
            'nip' => $this->request->getVar('nip'),
            'gender' => $this->request->getVar('gender'),
            'foto' => $namaFoto,
            'created_by' => $this->request->getVar('created_by'),
            'isactive' => $this->request->getVar('isactive'),
            'note' => $this->request->getVar('note'),
            'hp' => $this->request->getVar('hp'),
            'email' => $this->request->getVar('email'),
        ]);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
        return redirect()->to('/developer');
    }

    public function delete($slug)
    {
        // cari gambar berdasarkan id
        $developer = $this->developerModel->find($slug);
        // cek jika file gambarnya user.png
        if ($developer['foto'] != 'user.png') {
            // hapus gambar
            unlink('img/' . $developer['foto']);
        }

        $this->developerModel->delete($slug);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/developer');
    }

    public function edit($slug)
    {
        $data = [
            'title' => 'Form ubah data',
            'validation' => \Config\Services::validation(),
            'developer' => $this->developerModel->getDeveloper($slug)
        ];
        return view('developer/edit', $data);
    }

    public function update($id)
    {
        // cek judul
        $developerLama = $this->developerModel->getDeveloper($this->request->getVar('slug'));
        if ($developerLama['fullname'] == $this->request->getVar('fullname')) {
            $rule_name = 'required';
        } else {
            $rule_name = 'required|is_unique[developer.fullname]';
        }
        if (!$this->validate([
            'fullname' => [
                'rules' => $rule_name,
                'errors' => [
                    'required' => 'Nama developer harus diisi.',
                    'is_unique' => 'Nama developer sudah tersedia.'
                ]
            ],
            'foto' => [
                'rules' => 'max_size[foto,1024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran foto terlalu besar',
                    'is_image' => 'Yang anda pilih bukan foto',
                    'mime_in' => 'Yang anda pilih bukan foto'
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();
            return redirect()->to('/developer/create')->withInput();
        }
        $fileFoto = $this->request->getFile('foto');
        // cek gambar apakah tetap gambar lama
        if ($fileFoto->getError() == 4) {
            $namaFoto = $this->request->getVar('fotoLama');
        } else {
            // generate nama file random
            $namaFoto = $fileFoto->getRandomName();
            // pidahkan gambar
            $fileFoto->move('img', $namaFoto);
            // hapus file lama
            unlink('img/' . $this->request->getVar('fotoLama'));
        }
        $slug = url_title($this->request->getVar('fullname'), '-', true);
        $this->developerModel->save([
            'id' => $id,
            'fullname' => $this->request->getVar('fullname'),
            'slug' => $slug,
            'nip' => $this->request->getVar('nip'),
            'gender' => $this->request->getVar('gender'),
            'foto' => $namaFoto,
            'created_by' => $this->request->getVar('created_by'),
            'isactive' => $this->request->getVar('isactive'),
            'note' => $this->request->getVar('note'),
            'hp' => $this->request->getVar('hp'),
            'email' => $this->request->getVar('email'),
        ]);
        session()->setFlashdata('pesan', 'Data berhasil diubah.');
        return redirect()->to('/developer');
    }
}
