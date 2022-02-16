<?php

namespace App\Controllers;

use App\Models\AppModel;

class App extends BaseController
{
    protected $appModel;
    public function __construct()
    {
        $this->appModel = new AppModel();
    }
    public function index()
    {
        $currentPage = $this->request->getVar('page_app') ? $this->request->getVar('page_app') : 1;

        $data = [
            'title' => 'App',
            'app' => $this->appModel->withDeleted()->findAll(),
            'currentPage' => $currentPage
        ];

        return view('app/index', $data);
    }

    public function detail($slug)
    {
        $data = [
            'title' => 'Detail App',
            'app' => $this->appModel->getApp($slug)
        ];
        // jika app tidak ada di tabel
        if (empty($data['app'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Nama App ' . $slug . ' tidak ditemukan');
        }
        return view('app/detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Form Tambah Data App',
            'validation' => \Config\Services::validation()
        ];
        return view('app/create', $data);
    }

    public function save()
    {
        // validasi input
        if (!$this->validate([
            'name_app' => [
                'rules' => 'required|is_unique[app.name_app]',
                'errors' => [
                    'required' => 'Nama app harus diisi.',
                    'is_unique' => 'Nama app sudah tersedia.'
                ]
            ],
        ])) {
            // $validation = \Config\Services::validation();
            return redirect()->to('/app/create')->withInput();
        }
        $slug = url_title($this->request->getVar('name_app'), '-', true);
        $this->appModel->save([
            'name_app' => $this->request->getVar('name_app'),
            'slug' => $slug,
            'desc_app' => $this->request->getVar('desc_app'),
            'url' => $this->request->getVar('url'),
            'base_app' => $this->request->getVar('base_app'),
            'ordered_by' => $this->request->getVar('ordered_by'),
            'ip_server' => $this->request->getVar('ip_server'),
            'lang' => $this->request->getVar('lang'),
            'lang_version' => $this->request->getVar('lang_version'),
            'framework' => $this->request->getVar('framework'),
            'app_version' => $this->request->getVar('app_version'),
            'status' => $this->request->getVar('status'),
            'start_developed' => $this->request->getVar('start_developed'),
            'end_developed' => $this->request->getVar('end_developed'),
            'live_at' => $this->request->getVar('live_at'),
            'created_at' => $this->request->getVar('created_at'),
            'updated_at' => $this->request->getVar('updated_at'),
            'created_by' => $this->request->getVar('created_by'),
            'isactive' => $this->request->getVar('isactive'),
            'note' => $this->request->getVar('note'),
        ]);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
        return redirect()->to('/app');
    }

    public function delete($id)
    {
        $this->appModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/app');
    }

    public function edit($slug)
    {
        $data = [
            'title' => 'Form ubah data',
            'validation' => \Config\Services::validation(),
            'app' => $this->appModel->getApp($slug)
        ];
        return view('app/edit', $data);
    }

    public function update($id)
    {
        // cek judul
        $appLama = $this->appModel->getApp($this->request->getVar('slug'));
        if ($appLama['name_app'] == $this->request->getVar('name_app')) {
            $rule_name = 'required';
        } else {
            $rule_name = 'required|is_unique[app.name_app]';
        }
        if (!$this->validate([
            'name_app' => [
                'rules' => $rule_name,
                'errors' => [
                    'required' => 'Nama app harus diisi.',
                    'is_unique' => 'Nama app sudah tersedia.'
                ]
            ],
        ])) {
            // $validation = \Config\Services::validation();
            return redirect()->to('/app/create')->withInput();
        }
        $slug = url_title($this->request->getVar('name_app'), '-', true);
        $this->appModel->save([
            'id' => $id,
            'name_app' => $this->request->getVar('name_app'),
            'slug' => $slug,
            'desc_app' => $this->request->getVar('desc_app'),
            'url' => $this->request->getVar('url'),
            'base_app' => $this->request->getVar('base_app'),
            'ordered_by' => $this->request->getVar('ordered_by'),
            'ip_server' => $this->request->getVar('ip_server'),
            'lang' => $this->request->getVar('lang'),
            'lang_version' => $this->request->getVar('lang_version'),
            'framework' => $this->request->getVar('framework'),
            'app_version' => $this->request->getVar('app_version'),
            'status' => $this->request->getVar('status'),
            'start_developed' => $this->request->getVar('start_developed'),
            'end_developed' => $this->request->getVar('end_developed'),
            'live_at' => $this->request->getVar('live_at'),
            'created_at' => $this->request->getVar('created_at'),
            'updated_at' => $this->request->getVar('updated_at'),
            'created_by' => $this->request->getVar('created_by'),
            'isactive' => $this->request->getVar('isactive'),
            'note' => $this->request->getVar('note'),
        ]);
        session()->setFlashdata('pesan', 'Data berhasil diubah.');
        return redirect()->to('/app');
    }
}
