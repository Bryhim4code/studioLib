<?php

namespace Modules\Administration\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    protected $DBGroup   = 'default';
    protected $table      = 'users';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    // protected $useSoftDeletes = true;
    protected $allowedFields = [
        'id', // Added the fields for the employers table
        'username', // Added the fields for the employers table
        'address', // Added the fields for the employers table
        'phone', // Added the fields for the employers table
        'email', // Added the fields for the employers table
        'photo', // Added the fields for the employers table
        'status', // Added the fields for the employers table
        'first_name', // Added the fields for the employers table
        'last_name', // Added the fields for the employers table
        'role', // Added the fields for the employers table
        'reset_token', // Added the fields for the employers table
        'password', // Added the fields for the employers table
        'created_at',

    ];
}
