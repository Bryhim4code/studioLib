<?php

namespace Modules\Administration\Models;

use CodeIgniter\Model;

class StudentAnnouncementModel extends Model
{
    protected $DBGroup   = 'default';
    protected $table = 'studentannouncements';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';

    protected $allowedFields = ['announcement_id', 'student_id', 'seen', 'seen_at'];
}
