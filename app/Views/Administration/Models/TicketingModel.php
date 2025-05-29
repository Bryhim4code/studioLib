<?php

namespace Modules\Administration\Models;

use CodeIgniter\Model;

class TicketingModel extends Model
{
    protected $DBGroup   = 'default';
    protected $table      = 'tickets';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    // protected $useSoftDeletes = true;
    protected $allowedFields = [
        'id', // Added the fields for the employers table
        'uuid', // Added the field
        'ticket_title',
        'customer',
        'customer_address',
        'customer_email',
        'photo',
        'customer_phone',
        'ticket_id',
        'ticket_type',
        'ticket_status',
        'ticket_category_id',
        'complaint_text',
        'ticket_open_date',
        'assigned_to',
        'ticket_opened_by',
        'customer_note',
        'priority',
    ];



    public function getTicketWithCategory($ticketCategoryId)
    {
        // Load the database instance
        $db = \Config\Database::connect($this->DBGroup);

        // Perform the join operation
        $query = $db->table('tickets')
            ->select('tickets.*, ticket_category.ticket_category')
            ->join('ticket_category', 'ticket_category.id = tickets.ticket_category_id')
            ->where('tickets.ticket_category_id', $ticketCategoryId)
            ->get();

        // Check if there are any results
        if ($query->getNumRows() > 0) {
            return $query->getRowArray();
        } else {
            return null; // Or you can return an empty array, depending on your preference
        }
    }



    // public function getMaintenanceRequestsByUser($sessionUsername)
    // {
    //     // Retrieve ticket IDs where ticket_opened_by is the same as the username
    //     $ticketIds = $this->select('id')->where('ticket_opened_by', $sessionUsername)->findAll();

    //     // If no matching tickets found, return an empty array
    //     if (empty($ticketIds)) {
    //         return [];
    //     }

    //     // Extract IDs from the result
    //     $ticketIdsArray = array_column($ticketIds, 'id');

    //     // Retrieve maintenance requests where id is in the list of ticket IDs
    //     $maintenanceModel = new MaintenanceModel();
    //     return $maintenanceModel->whereIn('ticket_id', $ticketIdsArray)->findAll();
    // }
}
