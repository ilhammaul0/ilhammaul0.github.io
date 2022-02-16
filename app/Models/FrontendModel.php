<?php

namespace App\Models;

use CodeIgniter\Model;

class FrontendModel extends Model
{
    protected $table = 'app';
    protected $useSoftDeletes = true;
}