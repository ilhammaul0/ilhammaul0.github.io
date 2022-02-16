<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\GroupuserModel;

class Admin extends BaseController
{
    protected $db, $builder, $adminModel, $groupuserModel;

    public function __construct()
    {
        $this->db         = \Config\Database::connect();
        $this->builder    = $this->db->table('users');
        $this->adminModel = new AdminModel();
        $this->groupuserModel = new GroupuserModel();
    }
    public function index()
    {
        $data = [
            'title' => 'User List',
        ];
        // $users = new \Myth\Auth\Models\UserModel();
        // $data['users'] = $users->findAll();

        $this->builder->select('users.id as userid, username, email, name');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $query      = $this->builder->get();

        $data['users'] = $query->getResult();
        return view('admin/index', $data);
    }

    public function detail($id = 0)
    {
        $data['title'] = 'User Detail';
        $this->builder->select('users.id as userid, username, email, fullname, foto, name');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $this->builder->where('users.id', $id);
        $query      = $this->builder->get();

        $data['user'] = $query->getRow();
        return view('admin/detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Form Tambah User',
            'validation' => \Config\Services::validation()
        ];
        return view('admin/create', $data);
    }

    public function save()
    {
        // validasi input
        if (!$this->validate([
            'fullname' => [
                'rules' => 'required|is_unique[users.fullname]',
                'errors' => [
                    'required' => 'Nama user harus diisi.',
                    'is_unique' => 'Nama user sudah tersedia.'
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
            return redirect()->to('/admin/create')->withInput();
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
        $this->adminModel->save([
            'fullname' => $this->request->getVar('fullname'),
            'email' => $this->request->getVar('email'),
            'username' => $this->request->getVar('username'),
            'password_hash' => password_hash(base64_encode(hash('sha384', true)), PASSWORD_DEFAULT),
            'slug' => $slug,
            'nip' => $this->request->getVar('nip'),
            'gender' => $this->request->getVar('gender'),
            'foto' => $namaFoto,
            'created_by' => $this->request->getVar('created_by'),
            'isactive' => $this->request->getVar('isactive'),
            'note' => $this->request->getVar('note'),
        ]);
        $id = $this->adminModel->getInsertID();
        $group = [
            'group_id' => 2,
            'user_id' => $id
        ];
        $this->groupuserModel->save($group);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
        return redirect()->to('/admin');
    }

    public function delete($slug)
    {
        // cari gambar berdasarkan id
        $admin = $this->adminModel->find($slug);
        // cek jika file gambarnya user.png
        if ($admin['foto'] != 'user.png') {
            // hapus gambar
            unlink('img/' . $admin['foto']);
        }

        $this->adminModel->delete($slug);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/admin');
    }

    public function edit($slug)
    {
        $data = [
            'title' => 'Form ubah data',
            'validation' => \Config\Services::validation(),
            'admins' => $this->adminModel->getAdminbyId($slug)
        ];
        return view('admin/edit', $data);
    }

    public function update($id)
    {
        // cek judul
        if (!$this->validate([
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
            return redirect()->to('/admin/create')->withInput();
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
        $this->adminModel->save([
            'id' => $id,
            'fullname' => $this->request->getVar('fullname'),
            'email' => $this->request->getVar('email'),
            'username' => $this->request->getVar('username'),
            'slug' => $slug,
            'nip' => $this->request->getVar('nip'),
            'gender' => $this->request->getVar('gender'),
            'foto' => $namaFoto,
            'created_by' => $this->request->getVar('created_by'),
            'isactive' => $this->request->getVar('isactive'),
            'note' => $this->request->getVar('note'),
            'email' => $this->request->getVar('email'),
        ]);
        $this->groupuserModel->save([
            'id' => $this->request->getVar('level_id'),
            'group_id' => $this->request->getVar('level')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah.');
        return redirect()->to('/admin');
    }
}
