<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $DBGroup   = 'default';
    protected $table      = 'studio_management';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    // protected $useSoftDeletes = true;
    protected $allowedFields = [
        'id', // Added the fields for the employers table
        'username', // Added the fields for the employers table
        'email', // Added the fields for the employers table
        'first_name', // Added the fields for the employers table
        'last_name', // Added the fields for the employers table
        'role', // Added the fields for the employers table
        'password', // Added the fields for the employers table
        'created_at',
        'reset_token',
        'reset_attempts',
        'reset_timestamp',

    ];
}
