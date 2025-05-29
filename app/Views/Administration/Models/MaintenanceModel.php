<?php

namespace Modules\Administration\Models;

use CodeIgniter\Model;

class MaintenanceModel extends Model
{
    protected $DBGroup   = 'default';
    protected $table      = 'maintenance_requests';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    // protected $useSoftDeletes = true;
    protected $allowedFields = [
        'id',
        'uuid',
        'customer_name',
        'maintenancenumber',
        'ticket_search_id',
        'costs',
        'main_time',
        'main_date',
        'executed',
        'marked_as_executed_by',
        'unmarked_as_executed_by',
        'files',
        'ticket_id',
        'first_level_approval',
        'f_approved_officer',
        'f_approved_through',
        'requested_by',
        'description',
        'purpose',

    ];
}
