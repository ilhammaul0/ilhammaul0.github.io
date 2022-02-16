<?php

namespace App\Models;

use CodeIgniter\Model;

class DeveloperModel extends Model
{
    protected $table = 'developer';
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = ['fullname', 'slug', 'nip', 'gender', 'foto', 'created_by', 'note', 'hp', 'email'];

    public function getDeveloper($slug = false)
    {
        if ($slug == false) {       
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
}
