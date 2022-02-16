<?php

namespace App\Controllers;

use App\Models\CategoryModel;

class Category extends BaseController
{
    protected $categoryModel;
    public function __construct()
    {
        $this->categoryModel = new categoryModel();
    }
    public function index()
    {
        $currentPage = $this->request->getVar('page_category') ? $this->request->getVar('page_category') : 1;

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $category = $this->categoryModel->search($keyword);
        } else {
            $category = $this->categoryModel;
        }

        $data = [
            'title' => 'Category',
            'category' => $this->categoryModel->withDeleted()->findAll(),
            'category' => $category->paginate(5),
            'pager' => $this->categoryModel->pager,
            'currentPage' => $currentPage
        ];

        return view('category/index', $data);
    }

    public function detail($slug)
    {
        $data = [
            'title' => 'Detail Category',
            'category' => $this->categoryModel->getCategory($slug)
        ];
        // jika app tidak ada di tabel
        if (empty($data['category'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Field ' . $slug . ' tidak ditemukan');
        }
        return view('category/detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Form Tambah Data Category',
            'validation' => \Config\Services::validation()
        ];
        return view('category/create', $data);
    }

    public function save()
    {
        // validasi input
        if (!$this->validate([
            'field' => [
                'rules' => 'required|is_unique[category.field]',
                'errors' => [
                    'required' => 'Field harus diisi.',
                    'is_unique' => 'Field sudah tersedia.'
                ]
            ],
        ])) {
            // $validation = \Config\Services::validation();
            return redirect()->to('/category/create')->withInput();
        }
        $slug = url_title($this->request->getVar('field'), '-', true);
        $this->categoryModel->save([
            'field' => $this->request->getVar('field'),
            'slug' => $slug,
            'val' => $this->request->getVar('val'),
            'isactive' => $this->request->getVar('isactive')
        ]);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
        return redirect()->to('/category');
    }

    public function delete($id)
    {
        $this->categoryModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/category');
    }

    public function edit($slug)
    {
        $data = [
            'title' => 'Form ubah data',
            'validation' => \Config\Services::validation(),
            'category' => $this->categoryModel->getCategory($slug)
        ];
        return view('category/edit', $data);
    }

    public function update($id)
    {
        // cek judul
        $categoryLama = $this->categoryModel->getCategory($this->request->getVar('slug'));
        if ($categoryLama['field'] == $this->request->getVar('field')) {
            $rule_name = 'required';
        } else {
            $rule_name = 'required|is_unique[category.field]';
        }
        if (!$this->validate([
            'field' => [
                'rules' => $rule_name,
                'errors' => [
                    'required' => 'Field harus diisi.',
                    'is_unique' => 'Field sudah tersedia.'
                ]
            ],
        ])) {
            // $validation = \Config\Services::validation();
            return redirect()->to('/category/create')->withInput();
        }
        $slug = url_title($this->request->getVar('field'), '-', true);
        $this->categoryModel->save([
            'id' => $id,
            'field' => $this->request->getVar('field'),
            'slug' => $slug,
            'val' => $this->request->getVar('val'),
            'isactive' => $this->request->getVar('isactive')
        ]);
        session()->setFlashdata('pesan', 'Data berhasil diubah.');
        return redirect()->to('/category');
    }
}
