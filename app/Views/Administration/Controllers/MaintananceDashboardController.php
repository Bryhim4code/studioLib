<?php


namespace Modules\Administration\Controllers;

use App\Models\Commonmodel;
use Modules\Administration\Libraries\AdminDbScripts;
use Modules\Administration\Models\AuthModel;
use Modules\Administration\Models\VisitingModel;
use Modules\Administration\Models\TicketingModel;
use Modules\Administration\Models\MaintenanceModel;
use Modules\Administration\Models\ModuleLinksModel;

// class AdminDashboardController extends  \App\Controllers\BaseController
class MaintananceDashboardController extends  AdminBaseController
{
    public function index()
    {  // Fetch visitor data
        $visitingModel = new VisitingModel();
        $MaintenanceModel = new MaintenanceModel();
        $TicketingModel = new TicketingModel();
        $visitingData = $visitingModel->where('status', 'CHECKEDIN')->orderBy('when_created', 'desc')->findAll();
        $AuthModel = new AuthModel();

        $username = session()->get('username');
        $this->viewBag = [
            'visitingData' => $visitingData,
            'MaintenanceRequests' => $MaintenanceModel->where('executed', 'EXECUTED')->orderBy('created', 'desc')->findAll(),
            'scheduled' => $visitingModel->where('status', 'PENDING')->findAll(),
            'Checkedin' => $visitingModel->where('status', 'CHECKEDIN')->findAll(),
            'Checkedout' => $visitingModel->where('status', 'CHECKEDOUT')->findAll(),
            'AdminData' => $AuthModel->where('username', session('username'))->first(),
            'AllTicketsData' => $TicketingModel->whereIn('ticket_status', ['OPEN', 'INPROGRESS', 'REOPENED'])->orderBy('ticket_open_date', 'desc')->find(),
            // 'AllTicketsData' => $TicketingModel->orderBy('ticket_open_date', 'desc')->findAll(),
            'title' => 'Admin Profile',
            'pagetitle' => 'All Profile are made here'
        ];
        $module = new ModuleLinksModel();
        // Set active menu item
        $this->viewBag['Modules'] = [
            'Modulelinks' => $module->findAll(),
        ];

        $activeMenuItem = 'maintanance'; // Set active menu item
        $this->viewBag['activeMenuItem'] = $activeMenuItem;
        return view(MODULE_ADMIN_VIEWS . '/pages/profile/maintanancedetails', $this->viewBag);
    }
}
