<?php

namespace App\Controllers;

use App\Models\Level_userModel;

class Level_user extends BaseController
{
    protected $level_userModel;
    public function __construct()
    {
        $this->level_userModel = new level_userModel();
    }
    public function index()
    {
        $currentPage = $this->request->getVar('page_level_user') ? $this->request->getVar('page_level_user') : 1;

        $data = [
            'title' => 'Level User',
            'auth_groups' => $this->level_userModel->withDeleted()->findAll(),
            'currentPage' => $currentPage
        ];

        return view('level_user/index', $data);
    }

    public function detail($slug)
    {
        $data = [
            'title' => 'Detail Level User',
            'auth_groups' => $this->level_userModel->getLevel_user($slug)
        ];
        // jika app tidak ada di tabel
        if (empty($data['auth_groups'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama ' . $slug . ' tidak ditemukan');
        }
        return view('level_user/detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Form Tambah Data Level User',
            'validation' => \Config\Services::validation()
        ];
        return view('level_user/create', $data);
    }

    public function save()
    {
        $slug = url_title($this->request->getVar('name'), '-', true);
        $this->level_userModel->save([
            'name' => $this->request->getVar('name'),
            'slug' => $slug,
            'description' => $this->request->getVar('description')
        ]);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
        return redirect()->to('/level_user');
    }

    public function delete($id)
    {
        $this->level_userModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/level_user');
    }

    public function edit($slug)
    {
        $data = [
            'title' => 'Form ubah data',
            'validation' => \Config\Services::validation(),
            'level_user' => $this->level_userModel->getLevel_user($slug)
        ];
        
        return view('level_user/edit', $data);
    }

    public function update($id)
    {
        $slug = url_title($this->request->getVar('name'), '-', true);
        $this->level_userModel->save([
            'id' => $id,
            'name' => $this->request->getVar('name'),
            'slug' => $slug,
            'description' => $this->request->getVar('description')
        ]);
        session()->setFlashdata('pesan', 'Data berhasil diubah.');
        return redirect()->to('/level_user');
    }
}