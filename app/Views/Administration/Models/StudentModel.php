<?php

namespace Modules\Administration\Models;

use CodeIgniter\Model;

class StudentModel extends Model
{
    protected $DBGroup   = 'default';
    protected $table      = 'students';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    // protected $useSoftDeletes = true;
    protected $allowedFields = [
        'id',
        'student_id',
        'username',
        'selected_bunk',
        'phone',
        'dob',
        'room_status',
        'room_no',
        'no_of_beds',
        'amount_due',
        'school',
        'course',
        'country',
        'govt_id',
        'level',
        'matric_number',
        'kyc_status',
        'nin_number',
        'address',
        'room_number',
        'custorId',
        'location',
        'photo',
        'emailverify',
        'term',
        'email',
        'first_name',
        'verified_payment',
        'last_name',
        'role',
        'reset_token',
        'password',
        'created_at',
        'school_session',
        'checkedin_by',
        'booking_id',
        'room_no_id',
        'booking_date',
        'checkedin_time',
        'bed_space',
        'room_type',
        'floor',
        'currency',
        'full_room',
        'pay_status',
        'room_expiration_date',
        'price',
        'payment_type',
    ];

    // public function updatestudentStatus($id, $data)
    // {
    //     return $this->update($id, $data);
    // }
}
