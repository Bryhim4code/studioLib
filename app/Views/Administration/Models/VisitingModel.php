<?php

namespace Modules\Administration\Models;

use CodeIgniter\Model;

class VisitingModel extends Model
{
    protected $table = 'visiting';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id ',
        'uuid',
        'visits_id',
        'resident_fullname',
        'codes',
        'phone',
        'username',
        'remark',
        'scheduled_time_in',
        'scheduled_time_out',
        'pur_of_visit',
        'name_of_visitor',
        'phone_of_visitor',
        'checkedin_time',
        'checkedin_by',
        'checkedout_time',
        'checkedout_by',
        'admin_remarks',
        'status',
        'created_at',
    ];
    protected $useAutoIncrement = true;
    // protected $returnType = 'array';

    public function getVisitorById($visitorId)
    {
        return $this->find($visitorId);
    }
}
