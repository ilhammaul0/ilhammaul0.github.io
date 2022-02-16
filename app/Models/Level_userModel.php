<?php

namespace App\Models;

use CodeIgniter\Model;

class Level_userModel extends Model
{
    protected $table = 'auth_groups';
    protected $useTimestamps = true;
    protected $allowedFields = ['name', 'slug', 'description'];

    public function getLevel_user($slug = false)
    {
        if ($slug == false) {       
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
}