<?php

namespace App\Models;

use CodeIgniter\Model;


class messageModel extends Model {

    protected $table = 'messageboard';
    protected $primarykey = 'id';
    protected $allowedFields = ['name', 'content','time'];
    
}