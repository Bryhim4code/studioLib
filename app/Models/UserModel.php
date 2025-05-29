<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $DBGroup   = 'default';
    protected $table      = 'artist';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    // protected $useSoftDeletes = true;
    protected $allowedFields = [
        'id',
        'student_id',
        'username',
        'phone',
        'status',
        'dob',
        'school',
        'activation_token',
        'course',
        'level',
        'matric_number',
        'address',
        'room_number',
        'custorId',
        'location',
        'photo',
        'emailverify',
        'term',
        'email',
        'first_name',
        'last_name',
        'role',
        'reset_token',
        'reset_attempts',
        'reset_timestamp',
        'password',
        'created_at',
        'nin_number'

    ];
}
