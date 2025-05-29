<?php

namespace Modules\Administration\Models;

use CodeIgniter\Model;

class AnnouncementModel extends Model
{
    protected $DBGroup   = 'default';
    protected $table = 'announcements';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $allowedFields = ['title', 'message', 'start_date', 'end_date', 'created_at', 'updated_at'];
}
