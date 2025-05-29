<?php

namespace Modules\Administration\Models;

use CodeIgniter\Model;

class BookingsSummaryModel extends Model
{
    protected $DBGroup   = 'default';
    protected $table      = 'bookings_summary';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    // protected $useSoftDeletes = true;
    protected $allowedFields = [
        'id',
        'uuid',
        'school_session',
        'selected_bunk',
        'location_code',
        'username',
        'payment_id',
        'payment_status',
        'gateway_response',
        'pmt_paymentchannel',
        'payment_date',
        'status',
        'pmt_transactionref',
        'bank_name',
        'ordernumber',
        'resident',
        'booking_id',
        'room_status',
        'checkedin_time',
        'checkedin_by',
        'student_name',
        'student_id',
        'price',
        'booking_date',
        'bed_space',
        'room_no',
        'floor',
        'no_of_beds',
        'room_type',
        'room_expiration_date',
        'full_room',
        'amount_due',


    ];
}