<?php

namespace Modules\Administration\Models;

use CodeIgniter\Model;

class HostelSessionModel extends Model
{
    protected $DBGroup   = 'default';
    protected $table = 'hostel_session';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $allowedFields    = [
        'session_uid',
        'session_year',
        'session_description',
        'session_start',
        'session_end',
        'allow_payment',
        'last_day_of_access',
        'session_status',
        'created',
    ];
}
