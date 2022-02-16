<?php

namespace App\Models;

use CodeIgniter\Model;

class AppModel extends Model
{
    protected $table = 'app';
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = ['name_app', 'slug', 'desc_app', 'url', 'base_app', 'ordered_by', 'ip_server', 'lang', 'lang_version', 'framework', 'app_version', 'status', 'start_developed'. 'end_developed', 'live_at', 'created_by', 'isactive', 'note',];

    public function getApp($slug = false)
    {
        if ($slug == false) {       
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
}