<?php

namespace App\Controllers;

use App\Models\DevelopingModel;

class Developing extends BaseController
{
    protected $developingModel;
    public function __construct()
    {
        $this->developingModel = new developingModel();
    }
    public function index()
    {
        $currentPage = $this->request->getVar('page_developing') ? $this->request->getVar('page_developing') : 1;

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $developing = $this->developingModel->search($keyword);
        } else {
            $developing = $this->developingModel;
        }

        $data = [
            'title' => 'Developing',
            'developing' => $this->developingModel->withDeleted()->findAll(),
            'developing' => $developing->paginate(5),
            'pager' => $this->developingModel->pager,
            'currentPage' => $currentPage
        ];

        return view('developing/index', $data);
    }

    public function detail($slug)
    {
        $data = [
            'title' => 'Detail Developing',
            'developing' => $this->developingModel->getDeveloping($slug)
        ];
        // jika app tidak ada di tabel
        if (empty($data['developing'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Id Aplikasi ' . $slug . ' tidak ditemukan');
        }
        return view('developing/detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Form Tambah Data Developing',
            'validation' => \Config\Services::validation()
        ];
        return view('developing/create', $data);
    }

    public function save()
    {
        // validasi input
        if (!$this->validate([
            'id_developer' => [
                'rules' => 'required|is_unique[developing.id_developer]',
                'errors' => [
                    'required' => 'Id Developer harus diisi.',
                    'is_unique' => 'Id Developer sudah tersedia.'
                ]
            ],
        ])) {
            // $validation = \Config\Services::validation();
            return redirect()->to('/developing/create')->withInput();
        }
        $slug = url_title($this->request->getVar('id_developer'), '-', true);
        $this->developingModel->save([
            'id_developer' => $this->request->getVar('id_developer'),
            'slug' => $slug,
            'id_aplikasi' => $this->request->getVar('id_aplikasi')
        ]);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
        return redirect()->to('/developing');
    }

    public function delete($id)
    {
        $this->developingModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/developing');
    }

    public function edit($slug)
    {
        $data = [
            'title' => 'Form ubah data',
            'validation' => \Config\Services::validation(),
            'developing' => $this->developingModel->getDeveloping($slug)
        ];
        return view('developing/edit', $data);
    }

    public function update($id)
    {
        // cek judul
        $developingLama = $this->developingModel->getDeveloping($this->request->getVar('slug'));
        if ($developingLama['id_developer'] == $this->request->getVar('id_developer')) {
            $rule_name = 'required';
        } else {
            $rule_name = 'required|is_unique[developing.id_developer]';
        }
        if (!$this->validate([
            'id_developer' => [
                'rules' => $rule_name,
                'errors' => [
                    'required' => 'Id app harus diisi.',
                    'is_unique' => 'Id app sudah tersedia.'
                ]
            ],
        ])) {
            // $validation = \Config\Services::validation();
            return redirect()->to('/developing/create')->withInput();
        }
        $slug = url_title($this->request->getVar('id_developer'), '-', true);
        $this->developingModel->save([
            'id' => $id,
            'id_developer' => $this->request->getVar('id_developer'),
            'slug' => $slug,
            'id_aplikasi' => $this->request->getVar('id_aplikasi')
        ]);
        session()->setFlashdata('pesan', 'Data berhasil diubah.');
        return redirect()->to('/developing');
    }
}