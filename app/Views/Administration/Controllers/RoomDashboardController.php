<?php


namespace Modules\Administration\Controllers;


use Modules\Administration\Models\ModuleLinksModel;
use Modules\Administration\Models\BookingsSummaryModel;
use Modules\Administration\Models\StudentModel;

// class AdminDashboardController extends  \App\Controllers\BaseController
class RoomDashboardController extends  AdminBaseController
{
    // public function index()
    // {  // Fetch visitor data
    //     $BookingsSummaryModel = new BookingsSummaryModel();
    //     $StudentModel = new StudentModel();

    //     $bookings = $BookingsSummaryModel->where('status', 'PAID')->orderBy('booking_date', 'desc')->find();
    //     $checkin = $BookingsSummaryModel->where('room_status', 'CHECKEDIN')->orderBy('booking_date', 'desc')->findAll();
    //     // $username = session()->get('username');

    //     $username = $bookings ;

    //     echo '<pre>';
    //     print_r($username);
    //     die;
        
    //     $studentData = $StudentModel->where('username', $username)->first();
    //     $studentId = $studentData['id']; 


    //     $this->viewBag = [
    //         'Paymentsummary' =>  $bookings,
    //         'StudentsIN' =>   $checkin,
    //         'title' => 'Booking Summary ',
    //         'pagetitle' => 'All Profile are made here'
    //     ];

        
    //     $module = new ModuleLinksModel();
    //     // Set active menu item
    //     $this->viewBag['Modules'] = [
    //         'Modulelinks' => $module->findAll(),
    //     ];

    //     $activeMenuItem = 'room/master'; // Set active menu item
    //     $this->viewBag['activeMenuItem'] = $activeMenuItem;

    //     return view(MODULE_ADMIN_VIEWS . '/pages/profile/room_master', $this->viewBag);
    // }


    // public function index()
    // {
    //     // Load models
    //     $BookingsSummaryModel = new BookingsSummaryModel();
    //     $StudentModel = new StudentModel();
    //     $ModuleLinksModel = new ModuleLinksModel();
    
    //     // Step 1: Fetch bookings
    //     $bookings = $BookingsSummaryModel
    //         ->where('status', 'PAID')
    //         ->orderBy('booking_date', 'desc')
    //         ->find();
    
    //     $checkin = $BookingsSummaryModel
    //         ->where('room_status', 'CHECKEDIN')
    //         ->orderBy('booking_date', 'desc')
    //         ->findAll();
    
    //     // Step 2: Extract all unique usernames from bookings
    //     $usernames = array_unique(array_column($bookings, 'username'));
    
    //     // Step 3: Fetch all student records
    //     $students = [];
    //     $studentsMap = [];
    
    //     if (!empty($usernames)) {
    //         $students = $StudentModel->whereIn('username', $usernames)->findAll();
    
    //         // Create a map: username => student_id
    //         foreach ($students as $student) {
    //             $studentsMap[$student['username']] = $student['id'];
    //         }
    //     }
    
    //     // Step 4: Attach student_id to each booking
    //     foreach ($bookings as &$booking) {
    //         $username = $booking['username'];
    //         $booking['student_id'] = isset($studentsMap[$username]) ? $studentsMap[$username] : null;
    //     }
    
    //     // Step 5: Prepare data for view
    //     $this->viewBag = [
    //         'Paymentsummary' => $bookings, // Now each has a 'student_id'
    //         'StudentsIN' => $checkin,
    //         'Students' => $students,
    //         'title' => 'Booking Summary',
    //         'pagetitle' => 'All Profiles are made here',
    //         'Modules' => [
    //             'Modulelinks' => $ModuleLinksModel->findAll()
    //         ],
    //         'activeMenuItem' => 'room/master',
    //     ];
    

    //     // echo '<pre>';
    //     // print_r($this->viewBag);    
    //     // die;
    //     return view(MODULE_ADMIN_VIEWS . '/pages/profile/room_master', $this->viewBag);
    // }
    

    public function index()
{
    $db = \Config\Database::connect();
    $ModuleLinksModel = new ModuleLinksModel();
    $StudentModel = new StudentModel();

    // Step 1: Fetch bookings with student data for the active session
    $query = $db->query("
        SELECT b.*, s.id AS student_id, s.username AS student_username, s.email
        FROM bookings_summary b
        JOIN (
            SELECT session_year, session_start, session_end
            FROM hostel_session
            WHERE session_status = 'ACTIVE'
            LIMIT 1
        ) AS active_session
            ON b.school_session = active_session.session_year
        JOIN students s ON s.username = b.username
        WHERE 
            b.status = 'PAID'
            AND b.room_status = 'CHECKEDIN'
            AND CURDATE() BETWEEN active_session.session_start AND active_session.session_end
        ORDER BY b.booking_date DESC
    ");
    
    $bookings = $query->getResultArray();

    // Step 2: Optional — fetch all students if needed separately
    $usernames = array_unique(array_column($bookings, 'username'));
    $students = !empty($usernames) ? $StudentModel->whereIn('username', $usernames)->findAll() : [];

    // Step 3: Prepare data for view
    $this->viewBag = [
        'Paymentsummary' => $bookings,
        'StudentsIN' => $bookings, // Since you filtered CHECKEDIN already
        'Students' => $students,
        'title' => 'Booking Summary',
        'pagetitle' => 'All Profiles are made here',
        'Modules' => [
            'Modulelinks' => $ModuleLinksModel->findAll()
        ],
        'activeMenuItem' => 'room/master',
    ];

    return view(MODULE_ADMIN_VIEWS . '/pages/profile/room_master', $this->viewBag);
}

    

}