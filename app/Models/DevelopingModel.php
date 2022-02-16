<?php

namespace App\Models;

use CodeIgniter\Model;

class DevelopingModel extends Model
{
    protected $table = 'developing';
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = ['id_developer', 'slug', 'id_aplikasi'];

    public function getDeveloping($slug = false)
    {
        if ($slug == false) {       
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }

    public function search($keyword)
    {
        return $this->table('developing')->like('id_developer', $keyword)->orLike('id_aplikasi', $keyword);
    }   
}