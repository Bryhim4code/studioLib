<?php

namespace Modules\Administration\Models;

use CodeIgniter\Model;

class BookingsDetailsModel extends Model
{
    protected $DBGroup   = 'default';
    protected $table      = 'bookings_details';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    // protected $useSoftDeletes = true;
    protected $allowedFields = [
        'id',
        'uuid',
        'school_session',
        'location_code',
        'username',
        'student_name',
        'summary_id',
        'student_id',
        'resident',
        'booking_id',
        'booking_date',
        'bed_space',
        'room_no',
        'total',
        'floor',
        'no_of_beds',
        'room_type',
        'room_expiration_date',
        'full_room',
        'amount_due',


    ];
}
