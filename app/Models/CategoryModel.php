<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table = 'category';
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = ['field', 'slug', 'val', 'isactive'];

    public function getCategory($slug = false)
    {
        if ($slug == false) {       
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }

    public function search($keyword)
    {
        return $this->table('category')->like('field', $keyword)->orLike('val', $keyword);
    }
}