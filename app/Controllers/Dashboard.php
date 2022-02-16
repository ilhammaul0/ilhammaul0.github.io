<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }
    public function index()
    {
        $app = $this->db->query("SELECT count(id) FROM app ")->getResultArray();
        $developer = $this->db->query("SELECT count(id) FROM developer ")->getResultArray();
        $users = $this->db->query("SELECT count(id) FROM users ")->getResultArray();

        $data = [
            'title' => 'Dashboard',
            'app' => $app,
            'developer' => $developer,
            'users' => $users
        ];

        return view('dashboard/index', $data);
    }
}