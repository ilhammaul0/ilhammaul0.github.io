<?php

namespace App\Controllers;

use App\Models\FrontendModel;

class Frontend extends BaseController
{
    protected $frontendModel;
    public function __construct()
    {
        $this->frontendModel = new FrontendModel();
    }
    public function index()
    {

        $data = [
            'title' => 'Layanan APP',
            'app' => $this->frontendModel->withDeleted()->findAll(),
        ];

        return view('frontend/index', $data);
    }
}