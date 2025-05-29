<?php

namespace Modules\Administration\Models;

use CodeIgniter\Model;

class ModuleLinksModel extends Model
{
    protected $DBGroup   = 'default';
    protected $table      = 'module_links';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    // protected $useSoftDeletes = true;
    protected $allowedFields = [
        'id', // Added the fields for the employers table
        'uuid', // Added the fields for the employers table
        'module_name', // Added the fields for the employers table
        'module_link', // Added the fields for the employers table
        'module_color', // Added the fields for the employers table
        'module_title', // Added the fields for the employers table
    ];
}
