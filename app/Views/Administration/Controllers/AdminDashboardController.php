<?php


namespace Modules\Administration\Controllers;

use App\Libraries\SesApi;
use App\Models\Commonmodel;
use Modules\Administration\Libraries\AdminDbScripts;
use Modules\Administration\Models\AuthModel;
use Modules\Administration\Models\VisitingModel;
use Modules\Administration\Models\TicketingModel;
use Modules\Administration\Models\MaintenanceModel;
use Modules\Administration\Models\ModuleLinksModel;
use Modules\Administration\Models\AnnouncementModel;
use Modules\Administration\Models\HostelSessionModel;
use Modules\Administration\Models\StudentAnnouncementModel;
use Modules\Profile\Models\StudentModel;

// class AdminDashboardController extends  \App\Controllers\BaseController
class AdminDashboardController extends  AdminBaseController
{

    public function index()
    {  // Fetch visitor data
        $visitingModel = new VisitingModel();
        $MaintenanceModel = new MaintenanceModel();
        $TicketingModel = new TicketingModel();
        $AuthModel = new AuthModel();
        $visitingData = $visitingModel->where('status', 'CHECKEDIN')->orderBy('when_created', 'desc')->findAll();
        $username = session()->get('username');
        $this->viewBag = [
            'visitingData' => $visitingData,
            'MaintenanceRequests' => $MaintenanceModel->where('executed', 'PENDING')->orderBy('created', 'desc')->findAll(),
            'scheduled' => $visitingModel->where('status', 'PENDING')->findAll(),
            'Checkedin' => $visitingModel->where('status', 'CHECKEDIN')->findAll(),
            'Checkedout' => $visitingModel->where('status', 'CHECKEDOUT')->findAll(),
            'AdminData' => $AuthModel->where('username', session('username'))->first(),
            'AllTicketsData' => $TicketingModel->whereIn('ticket_status', ['OPEN', 'INPROGRESS', 'REOPENED'])->orderBy('ticket_open_date', 'desc')->find(),
            'title' => 'Admin Profile',
            'pagetitle' => 'All Profile are made here'
        ];
        $module = new ModuleLinksModel();
        // Set active menu item
        $this->viewBag['Modules'] = [
            'Modulelinks' => $module->findAll(),
        ];

        $activeMenuItem = 'Admindashboard';
        $this->viewBag['activeMenuItem'] = $activeMenuItem;
        return view(MODULE_ADMIN_VIEWS . '/pages/profile/dash_view', $this->viewBag);
    }
    public function listAnnouncements()
    {
        $announcementModel = new AnnouncementModel();
        $announcement = $announcementModel->findAll();
        // echo '<pre>';
        // print_r($announcement);
        // die;
        $this->viewBag = [
            'announcements' => $announcement,
            'title' => 'Admin Profile',
            'pagetitle' => 'All Profile are made here'
        ];
        $activeMenuItem = 'Announcements'; // Set active menu item
        $module = new ModuleLinksModel();
        // Set active menu item
        $this->viewBag['Modules'] = [
            'Modulelinks' => $module->findAll(),
        ];



        $activeMenuItem = 'Announcements';
        $this->viewBag['activeMenuItem'] = $activeMenuItem;
        return view(MODULE_ADMIN_VIEWS . '/pages/profile/announcement_list_view.php', $this->viewBag);
    }
    public function createAnnouncement()
    {
        $this->viewBag = [
            'title' => 'Admin Profile',
            'pagetitle' => 'All Profile are made here'
        ];
        $announcementModel = new AnnouncementModel();
        $post = $this->request->getPost();
        if ($post) {
            $data = [
                'title' => $post['title'],
                'message' => $post['message'],
                'start_date' => $post['start_date'],
                'end_date' => $post['end_date'],
            ];

            $announcementModel->insert($data);

            return redirect()->to('/admin/announcements')->with('success', 'Announcement created successfully');
        }
        $module = new ModuleLinksModel();
        // Set active menu item
        $this->viewBag['Modules'] = [
            'Modulelinks' => $module->findAll(),
        ];

        $activeMenuItem = 'Announcements'; // Set active menu item
        $this->viewBag['activeMenuItem'] = $activeMenuItem;
        return view(MODULE_ADMIN_VIEWS . '/pages/profile/create_announcement_view.php', $this->viewBag);
    }
    public function editAnnouncement($id)
    {
        $announcementModel = new AnnouncementModel();
        $announcement = $announcementModel->find($id);
        $post = $this->request->getPost();
        $this->viewBag = [
            'Id' =>  $id,
            'mode' => 'edit',
            'announcement' => $announcement,
            'title' => 'Admin Profile',
            'pagetitle' => 'All Profile are made here'
        ];
        if ($post) {
            $data = [
                'title' => $post['title'],
                'message' => $post['message'],
                'start_date' => $post['start_date'],
                'end_date' => $post['end_date'],
            ];
            $announcementModel->update($id, $data);

            return redirect()->to('/admin/announcements')->with('success', 'Announcement updated successfully');
        }
        $module = new ModuleLinksModel();
        // Set active menu item
        $this->viewBag['Modules'] = [
            'Modulelinks' => $module->findAll(),
        ];


        $activeMenuItem = 'Announcements'; // Set active menu item
        $this->viewBag['activeMenuItem'] = $activeMenuItem;
        return view(MODULE_ADMIN_VIEWS . '/pages/profile/create_announcement_view.php', $this->viewBag);
    }
    public function deleteAnnouncement($id)
    {
        $announcementModel = new AnnouncementModel();
        $announcementModel->delete($id);

        return redirect()->to('/admin/announcements')->with('success', 'Announcement deleted successfully');
    }
    public function listSession()
    {
        $HostelSessionModel = new HostelSessionModel();
        $sessions = $HostelSessionModel->findAll();
        // echo '<pre>';
        // print_r($announcement);
        // die;
        $this->viewBag = [
            'session' => $sessions,
            'title' => 'Admin Profile',
            'pagetitle' => 'All Profile are made here'
        ];
        $activeMenuItem = 'sessions'; // Set active menu item
        $module = new ModuleLinksModel();
        // Set active menu item
        $this->viewBag['Modules'] = [
            'Modulelinks' => $module->findAll(),
        ];



        $activeMenuItem = 'sessions';
        $this->viewBag['activeMenuItem'] = $activeMenuItem;
        return view(MODULE_ADMIN_VIEWS . '/pages/profile/session_list_view.php', $this->viewBag);
    }
    public function createSession()
    {
        $this->viewBag = [
            'title' => 'Admin Profile',
            'pagetitle' => 'All Profiles are managed here',
        ];

        $hostelSessionModel = new HostelSessionModel();
        $post = $this->request->getPost();

        if ($post) {
            $start = $post['session_start'];
            $end = $post['session_end'];

            $startTime = strtotime($start);
            $endTime = strtotime($end);
            $now = strtotime(date('Y-m-d'));

            if ($startTime < $now || $endTime < $now) {
                return redirect()->back()->withInput()->with('error', 'Cannot create session for past dates.');
            }

            if ($startTime >= $endTime) {
                return redirect()->back()->withInput()->with('error', 'Session end date must be after start date.');
            }

            $overlaps = $hostelSessionModel
                ->where("('$start' BETWEEN session_start AND session_end) 
                      OR ('$end' BETWEEN session_start AND session_end) 
                      OR (session_start BETWEEN '$start' AND '$end')
                      OR (session_end BETWEEN '$start' AND '$end')")
                ->findAll();

            if (!empty($overlaps)) {
                return redirect()->back()->withInput()->with('error', 'Session dates overlap with an existing session.');
            }

            $session_year = $start . '-TO-' . $end . '-SESSION';

            $data = [
                'session_uid' => uniqid('SESS-'),
                'session_year' => $session_year,
                'session_description' => $post['session_description'] ?? '',
                'session_start' => $start,
                'session_end' => $end,
                'session_status' => 'INACTIVE',
            ];

            if ($hostelSessionModel->insert($data)) {
                return redirect()->to('/admin/all-sessions')->with('success', 'Session created successfully');
            } else {
                return redirect()->back()->withInput()->with('error', implode('<br>', $hostelSessionModel->errors()));
            }
        }

        $module = new ModuleLinksModel();
        $this->viewBag['Modules'] = [
            'Modulelinks' => $module->findAll(),
        ];
        $this->viewBag['activeMenuItem'] = 'sessions';

        return view(MODULE_ADMIN_VIEWS . '/pages/profile/create_session_view.php', $this->viewBag);
    }
    public function editSession($id)
    {
        helper('form');
        $hostelSessionModel = new HostelSessionModel();
        $session = $hostelSessionModel->find($id);
        $post = $this->request->getPost();

        $this->viewBag = [
            'Id' => $id,
            'mode' => 'edit',
            'session' => $session,
            'title' => 'Admin Profile',
            'pagetitle' => 'All Profile are made here'
        ];

        if ($post) {
            $start = $post['session_start'];
            $end = $post['session_end'];

            $startTime = strtotime($start);
            $endTime = strtotime($end);
            $now = strtotime(date('Y-m-d'));

            if ($startTime < $now || $endTime < $now) {
                return redirect()->back()->withInput()->with('error', 'Cannot set session to a past date.');
            }

            if ($startTime >= $endTime) {
                return redirect()->back()->withInput()->with('error', 'Session end date must be after start date.');
            }

            $overlaps = $hostelSessionModel
                ->where("id !=", $id)
                ->where("('$start' BETWEEN session_start AND session_end) 
                  OR ('$end' BETWEEN session_start AND session_end) 
                  OR (session_start BETWEEN '$start' AND '$end')
                  OR (session_end BETWEEN '$start' AND '$end')")
                ->findAll();

            if (!empty($overlaps)) {
                return redirect()->back()->withInput()->with('error', 'Session dates overlap with another existing session.');
            }

            $session_year = $start . '-TO-' . $end . '-SESSION';

            $data = [
                'session_description' => $post['session_description'] ?? '',
                'session_start' => $start,
                'session_end' => $end,
                'session_year' => $session_year
            ];

            if ($hostelSessionModel->update($id, $data)) {
                return redirect()->to('/admin/all-sessions')->with('success', 'Session updated successfully');
            } else {
                return redirect()->back()->withInput()->with('error', implode('<br>', $hostelSessionModel->errors()));
            }
        }

        $module = new ModuleLinksModel();
        $this->viewBag['Modules'] = [
            'Modulelinks' => $module->findAll(),
        ];
        $this->viewBag['activeMenuItem'] = 'sessions';

        return view(MODULE_ADMIN_VIEWS . '/pages/profile/create_session_view.php', $this->viewBag);
    }
    public function deleteSession($id)
    {
        $hostelSessionModel = new HostelSessionModel();
        $hostelSessionModel->delete($id);

        return redirect()->to('/admin/all-sessions')->with('success', 'Sessions deleted successfully');
    }
   
    public function allowPayments($id)
    {
        $hostelSessionModel = new HostelSessionModel();
        $studentModel = new StudentModel(); // Make sure this exists
        $sessions = $hostelSessionModel->find($id);
    
        if (!$sessions) {
            return redirect()->back()->with('error', 'Session not found');
        }
    
        // Determine new status
        $newStatus = ($sessions['allow_payment'] === 'NO') ? 'YES' : 'NO';
    
        // If changing to YES, set all others to NO
        if ($newStatus === 'YES') {
            $hostelSessionModel->where('id !=', $id)->set(['allow_payment' => 'NO'])->update();
        }
    
        // Update current session
        $updated = $hostelSessionModel->update($sessions['id'], ['allow_payment' => $newStatus]);
    
        if ($updated === false) {
            return redirect()->back()->with('error', 'Failed to update session payment status');
        }
    
        // ✅ If just activated, send email to all students
        if ($newStatus === 'YES') {
            $students = $studentModel->select('email, first_name, last_name')->where('email !=', null)->findAll();
    
            $sesapi = new SesApi;    
            foreach ($students as $student) {
                $message = "
                    <p>Dear {$student['first_name']} {$student['last_name']},</p>
                    <p>Room booking for the new session is now open. You can now log in to your student dashboard and proceed with payment and room selection.</p>
                    <p>Regards,<br>Iddocare Team</p>
                ";
    
                $sesapi->send(
                    $student['email'],
                    'Room Booking Now Open – Action Required',
                    $message,
                    'support@iddocare.com'
                );
            }
        }
    
        return redirect()->back()->with('success', 'Session payment status changed successfully and notifications sent.');
    }

    public function sessionStatus($id)
{
    $hostelSessionModel = new HostelSessionModel();
    $session = $hostelSessionModel->find($id);

    // Check if the session exists
    if (!$session) {
        return redirect()->back()->with('error', 'Session not found');
    }

    $newStatus = ($session['session_status'] === 'INACTIVE') ? 'ACTIVE' : 'INACTIVE';

    // If trying to activate this session, enforce end-date check
    if ($newStatus === 'ACTIVE') {
        // Get the currently active session (excluding this one)
        $activeSession = $hostelSessionModel
            ->where('session_status', 'ACTIVE')
            ->where('id !=', $id)
            ->first();

        if ($activeSession) {
            $today = date('Y-m-d');
            if ($today <= $activeSession['session_end']) {
                return redirect()->back()->with('error', 'You cannot activate a new session until the current session ends on ' . date('F j, Y', strtotime($activeSession['session_end'])) . '.');
            }

            // Deactivate the previous session
            $hostelSessionModel->where('id !=', $id)->set(['session_status' => 'INACTIVE'])->update();
        }
    }

    // Update the selected session status
    $updated = $hostelSessionModel->update($session['id'], [
        'session_status' => $newStatus
    ]);

    if ($updated === false) {
        return redirect()->back()->with('error', 'Failed to update session status');
    }

    return redirect()->back()->with('success', 'Session status changed successfully');
}

    
    // public function sessionStatus($id)
    // {

    //     $hostelSessionModel = new HostelSessionModel();
    //     $session = $hostelSessionModel->find($id);

    //     // Check if the session exists
    //     if (!$session) {
    //         return redirect()->back()->with('error', 'Session not found');
    //     }


    //     // Toggle the session status
    //     $newStatus = ($session['session_status'] === 'INACTIVE') ? 'ACTIVE' : 'INACTIVE';

    //     // If making this session ACTIVE, make all other sessions INACTIVE first
    //     if ($newStatus === 'ACTIVE') {
    //         // If making this session ACTIVE, make all other sessions INACTIVE first
    //         $hostelSessionModel->where('id !=', $id)->set(['session_status' => 'INACTIVE'])->update();
    //     }

    //     // Now update the selected session
    //     $updated = $hostelSessionModel->update($session['id'], [
    //         'session_status' => $newStatus
    //     ]);

    //     // Check if the update was successful
    //     if ($updated === false) {
    //         return redirect()->back()->with('error', 'Failed to update session status');
    //     }

    //     // Check if the session status was updated successfully
    //     return redirect()->back()->with('success', 'Session status changed successfully');
    // }

}
