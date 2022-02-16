<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = 'users';
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = ['email', 'username', 'slug', 'fullname', 'nip', 'foto', 'note', 'gender', 'password_hash'];

    public function getAdmin($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $slug])->first();
    }

    public function getAdminbyId($id)
    {
        $this->select('*, users.id as userid, auth_groups_users.id as authgroupid')
            ->join('auth_groups_users', 'users.id = auth_groups_users.user_id')
            ->where('users.id', $id);
        $query = $this->get();

        return $query->getResultArray();
    }
}
