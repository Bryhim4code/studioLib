<?php


namespace Modules\Administration\Controllers;

use Modules\Administration\Libraries\SesApi;
use Modules\Administration\Models\HostelSessionModel;
use Modules\Administration\Models\ModuleLinksModel;
use Modules\Administration\Controllers\AdminBaseController;
use Modules\Administration\Models\BookingsSummaryModel;
use Modules\Administration\Models\StudentModel;
use Modules\Bookings\Models\BedspaceModel;
use Modules\Bookings\Models\BookingsDetailsModel;
use Modules\Profile\Models\StudentPaymentCodeModel;

use function App\Controllers\_get_new_uuid;
use function Modules\Profile\Controllers\generate_bks_id;

// class AdminDashboardController extends  \App\Controllers\BaseController
class BookingDashboardController extends  AdminBaseController
{

    public function index()
    {  // Fetch visitor data
        $BookingsSummaryModel = new BookingsSummaryModel();
        $BookingsDetailsModel = new BookingsDetailsModel();
        $HostelSessionModel = new HostelSessionModel();
        // $AuthModel = new AuthModel();

        $sessions = $HostelSessionModel->where('session_status', 'ACTIVE')->findAll();
        $Allsessions = $HostelSessionModel->findAll();
        $activeSession = $sessions[0]['session_year'] ?? null;
        // echo "<pre>";
        // print_r($sessions);
        // die;

        $username = session()->get('username');
        $this->viewBag = [
            'noOfBedsBooked' => $BookingsDetailsModel
                ->where('payment_status', 'PAID')
                ->where('school_session', $activeSession)
                ->countAllResults(),
            'Bookings' => $BookingsSummaryModel ->where('school_session', $activeSession)->orderBy('booking_date', 'DESC')->find(),
            'StudentsIN' => $BookingsSummaryModel ->where('school_session', $activeSession)->where('room_status', 'CHECKEDIN')->orderBy('booking_date', 'desc')->find(),
            'title' => 'Booking Summary ',
            'sessions' => $Allsessions,
            'pagetitle' => 'All Profile are made here'
        ];


        // echo "<pre>";   
        // print_r($this->viewBag);
        // die;
        $module = new ModuleLinksModel();
        // Set active menu item
        $this->viewBag['Modules'] = [
            'Modulelinks' => $module->findAll(),
        ];

        $activeMenuItem = 'bookings'; // Set active menu item
        $this->viewBag['activeMenuItem'] = $activeMenuItem;
        return view(MODULE_ADMIN_VIEWS . '/pages/profile/bookingdetails', $this->viewBag);
    }

    public function AllSessionsBookings()
    {
        $BookingsSummaryModel = new BookingsSummaryModel();
        $BookingsDetailsModel = new BookingsDetailsModel();
        $HostelSessionModel = new HostelSessionModel();
    
        $sessions = $HostelSessionModel->where('session_status', 'ACTIVE')->findAll();
        $Allsessions = $HostelSessionModel->findAll();
        $activeSession = $sessions[0]['session_year'] ?? null;
    
        // Fetch all bookings first
        $Bookings = $BookingsSummaryModel->orderBy('booking_date', 'DESC')->find();
    
        // Handle filtering from GET parameters
        $search = isset($_GET['search']) ? trim(strtolower($_GET['search'])) : '';
        $selectedSession = isset($_GET['school_session']) ? $_GET['school_session'] : '';
    
        // Filter results in PHP
        if ($search || $selectedSession) {
            $Bookings = array_filter($Bookings, function($booking) use ($search, $selectedSession) {
                $matchesSearch = $search === '' || stripos($booking['student_name'] . $booking['booking_id'], $search) !== false;
                $matchesSession = $selectedSession === '' || $booking['school_session'] === $selectedSession;
    
                return $matchesSearch && $matchesSession;
            });
        }
    
        // Set up the viewBag
        $username = session()->get('username');
        $this->viewBag = [
            'noOfBedsBooked' => $BookingsDetailsModel
                ->where('payment_status', 'PAID')
                ->where('school_session', $activeSession)
                ->countAllResults(),
            'Bookings' => $Bookings,
            'StudentsIN' => $BookingsSummaryModel->where('room_status', 'CHECKEDIN')->orderBy('booking_date', 'desc')->find(),
            'title' => 'Booking Summary',
            'sessions' => $Allsessions,
            'pagetitle' => 'All Profile are made here'
        ];
    
        // Add module links and active menu item
        $module = new ModuleLinksModel();
        $this->viewBag['Modules'] = [
            'Modulelinks' => $module->findAll(),
        ];
        $this->viewBag['activeMenuItem'] = 'bookings';
    
        return view(MODULE_ADMIN_VIEWS . '/pages/profile/allsessions_bookingdetails_view', $this->viewBag);
    }
    

    public function paymentSummary($id)
    {
        $BookingsSummaryModel = new BookingsSummaryModel();
        $StudentModel = new StudentModel();
        $ModuleLinksModel = new ModuleLinksModel();

        // Retrieve the booking by its ID
        $booking = $BookingsSummaryModel->find($id);

        if (!$booking) {
            return redirect()->back()->with('error', 'Booking not found');
        }

        // Check the students table for the booking ID and retrieve verified_payment
        $student = $StudentModel->where('booking_id', $booking['booking_id'])->first();

        if ($student) {
            $verifiedPayment = $student['verified_payment'];
        } else {
            $verifiedPayment = 'Not Found';
        }

        // Prepare view data
        $this->viewBag = [
            'BookingSummary' => $booking,
            'VerifiedPayment' => $verifiedPayment,
            'title' => 'Admin Profile',
            'pagetitle' => 'All Profile are made here'
        ];

        $module = new ModuleLinksModel();
        // Set active menu item
        $this->viewBag['Modules'] = [
            'Modulelinks' => $module->findAll(),
        ];


        // Load the view
        return view(MODULE_ADMIN_VIEWS . '/pages/profile/booking_payment_summary_view', $this->viewBag);
    }

    public function Studentcheckin($id)
{
    $BookingsSummaryModel = new BookingsSummaryModel();
    $StudentModel = new StudentModel();
    $HostelSessionModel = new HostelSessionModel();

    // Fetch active session
    $activeSession = $HostelSessionModel->where('session_status', 'ACTIVE')->first();
    $allSessions = $HostelSessionModel->findAll();

    // Retrieve the booking by ID
    $booking = $BookingsSummaryModel->find($id);
    $firstname = session()->get('firstname');
    $lastname = session()->get('lastname');

    if (!$booking) {
        return redirect()->back()->with('error', 'Booking not found.');
    }

    // Check that the booking session matches the active session
    if (!$activeSession || $booking['school_session'] !== $activeSession['session_name']) {
        return redirect()->back()->with('error', 'Booking does not match the active hostel session.');
    }

    // Extract the username from the booking
    $username = $booking['username'];

    // Update booking record
    $data = [
        'room_status' => 'CHECKEDIN',
        'checkedin_time' => date('Y-m-d H:i:s'),
        'checkedin_by' => $firstname . ' ' . $lastname,
    ];

    $updated = $BookingsSummaryModel->update($id, $data);
    if ($updated === false) {
        return redirect()->back()->with('error', 'Check-in failed. Please try again.');
    }

    // Update Student details
    $student = $StudentModel->where('username', $username)->first();
    if (!$student) {
        return redirect()->back()->with('error', 'No matching student record found.');
    }

    $updateData = [
        'room_status' => 'CHECKEDIN',
        'room_no' => $booking['room_no'],
        'no_of_beds' => $booking['no_of_beds'],
        'amount_due' => $booking['amount_due'],
        'school_session' => $booking['school_session'],
        'checkedin_by' => $booking['checkedin_by'],
        'booking_id' => $booking['booking_id'],
        'room_no_id' => $booking['room_no_id'],
        'booking_date' => $booking['booking_date'],
        'checkedin_time' => $booking['checkedin_time'],
        'bed_space' => $booking['bed_space'],
        'room_type' => $booking['room_type'],
        'floor' => $booking['floor'],
        'currency' => $booking['currency'],
        'full_room' => $booking['full_room'],
        'pay_status' => $booking['status'],
        'room_expiration_date' => $booking['room_expiration_date'],
        'price' => $booking['price'],
        'payment_type' => $booking['payment_type'],
    ];

    $detailUpdated = $StudentModel->update($student['id'], $updateData);
    if ($detailUpdated === false) {
        return redirect()->back()->with('error', 'Failed to update student room details.');
    }

    return redirect()->back()->with('success', 'Checked in successfully.');
}


    // public function Studentcheckin($id)
    // {
    //     $BookingsSummaryModel = new BookingsSummaryModel();
    //     $StudentModel = new StudentModel();

    //     $HostelSessionModel = new HostelSessionModel();
    
    //     $sessions = $HostelSessionModel->where('session_status', 'ACTIVE')->findAll();
    //     $Allsessions = $HostelSessionModel->findAll();

    //     // Retrieve the booking by its ID
    //     $booking = $BookingsSummaryModel->find($id);
    //     $firstname = session()->get('firstname');
    //     $lastname = session()->get('lastname');

    //     // Check if the booking exists
    //     if (!$booking) {
    //         return redirect()->back()->with('error', 'Booking not found');
    //     }
    //     // Extract the username from the booking
    //     $username = $booking['username']; // Ensure 'username' is a valid field in your model

    //     // Update the booking record
    //     $data = [
    //         'room_status' => 'CHECKEDIN',
    //         'checkedin_time' => date('Y-m-d H:i:s'),
    //         'checkedin_by' => $firstname . ' ' . $lastname,
    //     ];

    //     $updated = $BookingsSummaryModel->update($id, $data);

    //     // Check if the record was updated successfully
    //     if ($updated === false) {
    //         return redirect()->back()->with('error', 'Check-in failed please try again');
    //     }

    //     // Find the matching record in the StudentModel by username
    //     $matchingRecord = $StudentModel->where('username', $username)->first();

    //     if (!$matchingRecord) {
    //         return redirect()->back()->with('error', 'No matching record found in details table');
    //     }

    //     $updateData = [
    //         'room_status' => 'CHECKEDIN',
    //         'room_no' => $booking['room_no'], // Assuming room_no is available in booking
    //         'no_of_beds' => $booking['no_of_beds'],
    //         'amount_due' => $booking['amount_due'], // Assuming no_of_beds is available in booking
    //         'school_session' => $booking['school_session'],
    //         'checkedin_by' => $booking['checkedin_by'],
    //         'booking_id' => $booking['booking_id'],
    //         'room_no_id' => $booking['room_no_id'],
    //         'booking_date' => $booking['booking_date'],
    //         'checkedin_time' => $booking['checkedin_time'],
    //         'bed_space' => $booking['bed_space'],
    //         'room_type' => $booking['room_type'],
    //         'floor' => $booking['floor'],
    //         'currency' => $booking['currency'],
    //         'full_room' => $booking['full_room'],
    //         'pay_status' => $booking['status'],
    //         'room_expiration_date' => $booking['room_expiration_date'],
    //         'price' => $booking['price'],
    //         'payment_type' => $booking['payment_type'],
    //     ];

    //     // echo '<pre>';
    //     // print_r($updateData);
    //     // die;

    //     // Update the matching record
    //     $detailUpdated = $StudentModel->update($matchingRecord['id'], $updateData);

    //     if ($detailUpdated === false) {
    //         return redirect()->back()->with('error', 'Failed to update room status in details table');
    //     }

    //     // Redirect back with success message
    //     return redirect()->back()->with('success', 'Checked-in successfully');
    // }

    public function PaymentVerify($id)
    {
        $BookingsSummaryModel = new BookingsSummaryModel();
        $StudentModel = new StudentModel();
        // Retrieve the booking by its ID
        $booking = $BookingsSummaryModel->find($id);

        // Check if the booking exists
        if (!$booking) {
            return redirect()->back()->with('error', 'Booking not found');
        }
        // Extract the username from the booking
        $username = $booking['username']; // Ensure 'username' is a valid field in your model

        // Find the matching record in the StudentModel by username
        $matchingRecord = $StudentModel->where('username', $username)->first();

        if (!$matchingRecord) {
            return redirect()->back()->with('error', 'No matching record found in details table');
        }

        $updateData = [
            'room_no' => $booking['room_no'], // Assuming room_no is available in booking
            'no_of_beds' => $booking['no_of_beds'],
            'amount_due' => $booking['amount_due'], // Assuming no_of_beds is available in booking
            'school_session' => $booking['school_session'],
            'booking_id' => $booking['booking_id'],
            'booking_date' => $booking['booking_date'],
            'selected_bunk' => $booking['selected_bunk'],
            'pay_status' => $booking['status'],
            'bed_space' => $booking['bed_space'],
            'room_type' => $booking['room_type'],
            'verified_payment' => 'Verified',
            'floor' => $booking['floor'],
            'room_expiration_date' => $booking['room_expiration_date'],

        ];
        // echo '<pre>';
        // print_r($updateData);
        // die;
        // Update the matching record
        $detailUpdated = $StudentModel->update($matchingRecord['id'], $updateData);

        if ($detailUpdated === false) {
            return redirect()->back()->with('error', 'Payment verification was unsuccessfully');
        }
        // Redirect back with success message
        return redirect()->back()->with('success', 'Payment verified successfully');
    }

    public function BackendPayments($id)
    {
        $BookingsSummaryModel = new BookingsSummaryModel();
        // Retrieve the booking by its ID
        $booking = $BookingsSummaryModel->find($id);
        // Check if the booking exists
        if (!$booking) {
            return redirect()->back()->with('error', 'Booking not found');
        }
        // Generate a random order number (e.g., between 100000 and 999999)
        $ordernumber = 'ORD-' . mt_rand(100000, 999999); // Prefixing with 'ORD-' for clarity
        // Prepare the data for update
        $updateData = [
            'payment_id' => $ordernumber,
            'status' => 'PAID',
            'payment_status' => 'PAID',
            'gateway_response' => 'Backend Approved',
            'pmt_paymentchannel' => 'Backend Payment',
            'payment_date' => $booking['payment_date'],
            'pmt_transactionref' => $ordernumber,
            'bank_name' => 'IDDOCARE BANK',
            'ordernumber' => $ordernumber,
        ];

        // Update the matching record by the booking ID
        $detailUpdated = $BookingsSummaryModel->update($id, $updateData);

        if ($detailUpdated === false) {
            return redirect()->back()->with('error', 'Payment verification was unsuccessful');
        }

        // Send activation email with token
        $sesapi = new SesApi;
        // Construct activation link with token
        $htmlMessage = view(MODULE_BOOKING_VIEWS . "/email/paymentcomfirmed", [
            'firstname' => $booking['student_name'],
            'TransId' => $ordernumber,
            'roomno' => $booking['room_no'],
            'floor' => $booking['floor'],
            'selected_bunk' => $booking['selected_bunk'],
            'roomtype' => $booking['room_type'],
            'bookingid' => $booking['booking_id'],
            'paymentId' => $ordernumber,
            'paymentMethod' => 'Iddocare Transactions',
            'amount' => $booking['amount_due'],
            'date' => $booking['payment_date'],
            'expirationdate' => date('Y-m-d', strtotime('+1 year')),

        ]);

        $sesapi->send(
            $booking['email'],
            'Payment Received',
            $htmlMessage,
            'support@iddocare.com'
        );
        //    ============================================
        // second mail 
        $secondHtmlMessage = view(MODULE_BOOKING_VIEWS . "/email/welcomemessage", [
            'firstname' => $booking['student_name'],
        ]);

        $sesapi->send(
            $booking['email'],
            'Welcome to Iddocare!',
            $secondHtmlMessage,
            'support@iddocare.com'
        );

        // Redirect back with success message
        return redirect()->back()->with('success', 'Payment verified successfully');
    }

    public function resetPaidStatus()
    {
        $BookingsSummaryModel = new BookingsSummaryModel();

        // Update all bookings where status is PAID to PENDING
        $updated = $BookingsSummaryModel->where('status', 'PAID')->set(['status' => 'PENDING'])->update();
        log_message('notice', 'Admin reset all PAID booking statuses to PENDING at ' . date('Y-m-d H:i:s'));

        if ($updated === false) {
            return redirect()->back()->with('error', 'Failed to reset booking statuses.');
        }

        return redirect()->back()->with('success', 'All PAID bookings have been reset to PENDING.');
    }

    public function Code()
    {
        $StudentModel = new StudentModel();
        $paymentModel = new StudentPaymentCodeModel();

        // Fetch all payment codes
        $codes = $paymentModel
            ->orderBy('created_at', 'DESC')
            ->findAll();

        // Attach student details to each code
        foreach ($codes as $key => $code) {
            $studentData = $StudentModel
                ->select('username, first_name, last_name, kyc_status') // You can add more fields if needed
                ->where('student_id', $code['student_id'])
                ->first();

            // Merge student data into code data
            $codes[$key]['username'] = $studentData['username'] ?? '';
            $codes[$key]['first_name'] = $studentData['first_name'] ?? '';
            $codes[$key]['last_name'] = $studentData['last_name'] ?? '';
            $codes[$key]['kyc_status'] = $studentData['kyc_status'] ?? '';
        }


        // Add all necessary data to viewBag
        $this->viewBag = [
            'codes' => $codes,
            'title' => 'Code Generation',
            'pagetitle' => 'All Profiles are made here',
        ];

        // echo "<pre>";
        // print_r($this->viewBag);
        // die;

        // Fetch all modules
        $module = new ModuleLinksModel();
        $this->viewBag['Modules'] = [
            'Modulelinks' => $module->findAll(),
        ];
        // Set active menu item
        $this->viewBag['activeMenuItem'] = 'paymentscode';

        return view(MODULE_ADMIN_VIEWS . '\pages\profile\paymentcodeconfrimation_view', $this->viewBag);
    }

    public function Codepayment($id)
    {
        // Retrieve the payment record by its ID
        $paymentModel = new StudentPaymentCodeModel();
        $PAY = $paymentModel->find($id);

        // Check if the payment record exists
        if (!$PAY) {
            return redirect()->back()->with('error', 'Payment record not found');
        }

        // Retrieve the student data using the student_id from the payment record
        $StudentModel = new StudentModel();
        $user = $StudentModel->where('student_id', $PAY['student_id'])->first();

        // Check if the student exists
        if (!$user) {
            return redirect()->back()->with('error', 'Student not found');
        }

        // Extract the necessary fields from the payment record
        $price = $PAY['price'];
        $expiration_date = $PAY['expiration_date'];
        $total_amount = $PAY['total_amount'];
        $room_type = $PAY['room_type'];
        $no_of_bedspace = $PAY['no_of_bedspace'];
        $school_session = $PAY['school_session'];
        $username = $PAY['username'];
        $status = $PAY['status'];
        $code = $PAY['code'];

        // Toggle the visibility
        $newStatus = ($PAY['status'] == 'PAID') ? 'PENDING' : 'PAID';

        // Update the status in the database
        $data = [
            'status' => $newStatus,
        ];

        // Update the payment record
        $updated = $paymentModel->update($PAY['id'], $data);

        // Check if the record was updated successfully
        $sesapi = new SesApi;

        if ($updated === false) {
            return redirect()->back()->with('error', 'Failed to update status');
        } else {
            if ($newStatus == 'PAID') {
                // Send confirmation email
                $link = base_url('/bookings/rooms/selectroom/next-session');

                $htmlMessage = "
            <html>
            <head>
                <style>
                    body {
                        font-family: Arial, sans-serif;
                        background-color: #f9f9f9;
                        color: #333;
                        padding: 20px;
                    }
                    .container {
                        background-color: #ffffff;
                        border-radius: 8px;
                        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
                        max-width: 600px;
                        margin: auto;
                        padding: 30px;
                    }
                    .header {
                        background-color: #007bff;
                        color: #ffffff;
                        padding: 15px;
                        border-radius: 8px 8px 0 0;
                        text-align: center;
                        font-size: 20px;
                        font-weight: bold;
                    }
                    .content {
                        padding: 20px;
                        line-height: 1.6;
                    }
                    .button {
                        display: inline-block;
                        background-color: #007bff;
                        color: #ffffff;
                        text-decoration: none;
                        padding: 10px 20px;
                        border-radius: 4px;
                        margin-top: 20px;
                        font-weight: bold;
                    }
                    .footer {
                        margin-top: 30px;
                        font-size: 12px;
                        color: #888;
                        text-align: center;
                    }
                </style>
            </head>
            <body>
                <div class='container'>
    <div class='header'>
        Hurray 🎊 your payment has been confirmed!
    </div>
    <div class='content'>
        <p>Dear {$user['first_name']} {$user['last_name']},</p>
        <p>We’re excited to inform you that Your payment for a bed space at XXIV Rooms by Iddocare has been confirmed.</p>
        <p>Please click the button below to proceed with booking your room, ensure that your account is logged in before clicking link.</p>
        <p><a href='{$link}' class='button' target='_blank'>Go to booking</a></p>
        <p>If you have any questions or need assistance, feel free to reach out to us.</p>
        <p>Best regards,<br>The Iddocare Team</p>
    </div>
    <div class='footer'>
        &copy; <?= date('Y') ?> Iddocare. All rights reserved.
</div>
</div>

</body>

</html>
";

                $isSent = $sesapi->send(
                    $user['email'],
                    'Hurray 🎊: Your payment has been confirmed!',
                    $htmlMessage,
                    'support@iddocare.com'
                );

                if ($isSent) {
                    // Log the successful email sending
                    log_message('info', 'Email successfully sent to ' . $user['email']);
                } else {
                    // Log the failed email sending
                    log_message('error', 'Email failed to send to ' . $user['email']);
                }

                // Automatically create room selection record
                $this->autoRoomSelection($PAY['student_id'], $school_session, $room_type, $no_of_bedspace, $price, $total_amount);
            }
        }

        return redirect()->back()->with('success', 'Status changed successfully');
    }

    private function autoRoomSelection($student_id, $school_session, $room_type, $no_of_bedspace, $price, $total_amount)
    {
        $BookingsSummaryModel = new BookingsSummaryModel();
        $Bookingsdetails = new BookingsDetailsModel();
        $StudentModel = new StudentModel();

        // Fetch student data
        $user = $StudentModel->where('student_id', $student_id)->first();

        if (!$user) {
            // Log the error if student not found
            return redirect()->back()->with('error', 'Student not found for auto room selection');
            log_message('error', 'Student not found for auto room selection');
            return;
        }

        // Generate booking ID and other details
        $uuid = $this->_get_new_uuid();
        // Generate current year and month in YY-MM format
        $booking_id = $this->generate_bks_id();
        $issued_date = date('Y-m-d');
        $room_expiration_date = date('Y-m-d', strtotime('+1 year', strtotime($issued_date)));
        $firstname = $user['first_name'];
        $lastname = $user['last_name'];
        $email = $user['email'];
        $location = $user['address'] ?? '';

        // Check if the user already has a booking for the selected session
        $existingSession = $BookingsSummaryModel->where('username', $user['username'])
            ->where('school_session', $school_session)
            ->first();

        if ($existingSession) {
            // Log the error if the user already has a booking for this session
            return redirect()->back()->with('error', 'User already has a booking for this session');
            // You can also log this information for debugging
            log_message('info', 'User already has a booking for this session');
            return;
        }
        // Generate a random order number (e.g., between 100000 and 999999)
        $ordernumber = 'ORD-' . mt_rand(100000, 999999); // Prefixing with 'ORD-' for clarity
        // Create new booking record
        $data = [
            'uuid' => $uuid,
            'school_session' => $school_session,
            'location_code' => $location,
            'username' => $user['username'],
            'student_name' => $firstname . ' ' . $lastname,
            'booking_id' => $booking_id,
            'student_id' => $student_id,
            'email' => $email,
            'payment_status' => 'PAID',
            'status' => 'PAID',
            'ordernumber' => $ordernumber,
            'payment_id' => $ordernumber,
            'gateway_response' => 'Backend Approved',
            'pmt_paymentchannel' => 'Backend Payment',
            'payment_date' => $issued_date,
            'pmt_transactionref' => $ordernumber,
            'bank_name' => 'IDDOCARE BANK',
            'booking_date' => $issued_date,
            'bed_space' => $no_of_bedspace,
            'room_no' => 'Auto-Generated', // You can set a default or auto-generated room number
            'selected_bunk' => 'Auto-Generated', // You can set a default or auto-generated bunk
            'price' => $price,
            'no_of_beds' => $no_of_bedspace,
            'room_type' => $room_type,
            'room_expiration_date' => $room_expiration_date,
            'full_room' => isset($no_of_bedspace) && $no_of_bedspace >= 2 ? 'YES' : '',
            'amount_due' => $total_amount,
        ];

        $insert_id = $BookingsSummaryModel->insert($data);

        if ($insert_id > 0) {
            // Insert booking details for each bed space
            for ($i = 0; $i < $no_of_bedspace; $i++) {
                $Bookingsdetail = [
                    'uuid' => $uuid,
                    'booking_id' => $booking_id,
                    'school_session' => $school_session,
                    'location_code' => $location,
                    'username' => $user['username'],
                    'student_name' => $firstname . ' ' . $lastname,
                    'booking_id' => $booking_id,
                    'student_id' => $student_id,

                    'payment_status' => 'PAID',
                    'status' => 'PAID',
                    'booking_date' => $issued_date,
                    'bed_space' => $no_of_bedspace,
                    'selected_bunk' => 'Auto-Generated', // You can set a default or auto-generated bunk
                    'room_no' => 'Auto-Generated', // You can set a default or auto-generated room number
                    'price' => $price,
                    'no_of_beds' => $no_of_bedspace,
                    'room_type' => $room_type,
                    'full_room' => isset($no_of_bedspace) && $no_of_bedspace >= 2 ? 'YES' : '',
                    'amount_due' => $total_amount,
                    'total' => $total_amount,
                ];

                $Bookingsdetails->insert($Bookingsdetail);
            }

            log_message('info', 'Room selection completed successfully for student ID: ' . $student_id);
        } else {
            log_message('error', 'Failed to create room selection for student ID: ' . $student_id);
        }
    }

    public function generate_bks_id()
    {
        // Generate current year and month in YY-MM format
        $currentYearMonth = date('y-m');
        // Generate a random alphanumeric string
        $randomString = strtoupper(bin2hex(random_bytes(5))); // Generates 10 characters
        // Construct the ID
        return "BKS-$currentYearMonth-$randomString";
    }

    function _get_new_b_uuid($lenght = 40)
    {
        // uniqid gives 13 chars, but you could adjust it to your needs.
        if (function_exists("random_bytes")) {
            $bytes = random_bytes(ceil($lenght / 2));
        } elseif (function_exists("openssl_random_pseudo_bytes")) {
            $bytes = openssl_random_pseudo_bytes(ceil($lenght / 2));
            // } else {
            // throw new Exception("no cryptographically secure random function available");
        }
        return substr(bin2hex($bytes), 0, $lenght);
    }
}
