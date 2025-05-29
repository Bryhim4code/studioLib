<?php


namespace Modules\Administration\Controllers;

use Modules\Administration\Libraries\SesApi;
use Modules\Administration\Models\HostelSessionModel;
use Modules\Administration\Models\ModuleLinksModel;
use Modules\Administration\Models\BookingsSummaryModel;
use Modules\Administration\Models\StudentModel;
use Modules\Bookings\Models\BedspaceModel;
use Modules\Bookings\Models\BookingsDetailsModel;
use Modules\Profile\Models\StudentPaymentCodeModel;

use function Modules\Bookings\Controllers\_get_new_uuid;
use function Modules\Bookings\Controllers\generate_bks_id;

// class AdminDashboardController extends  \App\Controllers\BaseController
class BookingDashboardController extends  AdminBaseController
{

    public function index()
    {  // Fetch visitor data
        $BookingsSummaryModel = new BookingsSummaryModel();
        // $BookingsDetailsModel = new BookingsDetailsModel();
        // $AuthModel = new AuthModel();

        $username = session()->get('username');
        $this->viewBag = [
            'noOfBedsBooked' => $BookingsSummaryModel
                ->selectSum('no_of_beds')
                ->where('status', 'paid')
                ->first(),
            'Bookings' => $BookingsSummaryModel->orderBy('booking_date', 'DESC')->find(),
            'StudentsIN' => $BookingsSummaryModel->where('room_status', 'CHECKEDIN')->orderBy('booking_date', 'desc')->find(),
            'title' => 'Booking Summary ',
            'pagetitle' => 'All Profile are made here'
        ];

        $module = new ModuleLinksModel();
        // Set active menu item
        $this->viewBag['Modules'] = [
            'Modulelinks' => $module->findAll(),
        ];

        $activeMenuItem = 'bookings'; // Set active menu item
        $this->viewBag['activeMenuItem'] = $activeMenuItem;
        return view(MODULE_ADMIN_VIEWS . '/pages/profile/bookingdetails', $this->viewBag);
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

        // Retrieve the booking by its ID
        $booking = $BookingsSummaryModel->find($id);
        $firstname = session()->get('firstname');
        $lastname = session()->get('lastname');

        // Check if the booking exists
        if (!$booking) {
            return redirect()->back()->with('error', 'Booking not found');
        }
        // Extract the username from the booking
        $username = $booking['username']; // Ensure 'username' is a valid field in your model

        // Update the booking record
        $data = [
            'room_status' => 'CHECKEDIN',
            'checkedin_time' => date('Y-m-d H:i:s'),
            'checkedin_by' => $firstname . ' ' . $lastname,
        ];

        $updated = $BookingsSummaryModel->update($id, $data);

        // Check if the record was updated successfully
        if ($updated === false) {
            return redirect()->back()->with('error', 'Check-in failed please try again');
        }

        // Find the matching record in the StudentModel by username
        $matchingRecord = $StudentModel->where('username', $username)->first();

        if (!$matchingRecord) {
            return redirect()->back()->with('error', 'No matching record found in details table');
        }

        $updateData = [
            'room_status' => 'CHECKEDIN',
            'room_no' => $booking['room_no'], // Assuming room_no is available in booking
            'no_of_beds' => $booking['no_of_beds'],
            'amount_due' => $booking['amount_due'], // Assuming no_of_beds is available in booking
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

        // echo '<pre>';
        // print_r($updateData);
        // die;

        // Update the matching record
        $detailUpdated = $StudentModel->update($matchingRecord['id'], $updateData);

        if ($detailUpdated === false) {
            return redirect()->back()->with('error', 'Failed to update room status in details table');
        }

        // Redirect back with success message
        return redirect()->back()->with('success', 'Checked-in successfully');
    }

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

    // public function Code()
    //     {
    //         $StudentModel = new StudentModel();
    //         // Fetch all payment codes for the student
    //         $paymentModel = new StudentPaymentCodeModel();
    //         $codes = $paymentModel
    //             ->orderBy('created_at', 'DESC')
    //             ->findAll();

    //         //     echo "<pre>";
    //         // print_r($codes);
    //         // die;
    //         // Fetch student details
    //         $studentData = $StudentModel->where('student_id', $codes[0]['student_id'])->first();
    //         echo "<pre>";
    //         print_r($studentData);
    //         die;

    //         // Add all necessary data to viewBag
    //         $this->viewBag = [
    //             // 'studentData' => $studentData,
    //             'codes' => $codes,
    //             'title' => 'Code Generation',
    //             'pagetitle' => 'All Profiles are made here',
    //         ];

    //         $module = new ModuleLinksModel();
    //         $this->viewBag['Modules'] = [
    //             'Modulelinks' => $module->findAll(),
    //         ];
    //         $this->viewBag['activeMenuItem'] = 'student/details';

    //         // Return the view with the gene
    //         return view(MODULE_ADMIN_VIEWS . '\pages\profile\paymentcodeconfrimation_view', $this->viewBag);
    //     }


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
        // Retrieve the property by its ID
        $StudentModel = new StudentModel();
        $paymentModel = new StudentPaymentCodeModel();
        $PAY = $paymentModel->find($id);

        $user = $StudentModel->where('student_id', $PAY['student_id'])->first();
        // Check if the student exists
        if (!$user) {
            return redirect()->back()->with('error', 'user not found');
        }
        // Extract the username from the student data   
        $email = $user['email'];
        $firstname = $user['first_name'];
        $lastname = $user['last_name'];

        $username = session()->get('username');

        // Check if the property exists
        if (!$PAY) {
            return redirect()->back()->with('error', 'user not found');
        }

        // Toggle the visibility
        $newStatus = ($PAY['status'] == 'PAID') ? 'PENDING' : 'PAID';

        // Update the status in the database
        $data = [
            'status' => $newStatus,
        ];

        // Update the property record
        $updated = $paymentModel->update($PAY['id'], $data);

        // Check if the record was updated successfully
        $sesapi = new SesApi;


        if ($updated === false) {
            return redirect()->back()->with('error', 'Failed to update status');
        } else {
            if ($newStatus == 'PAID') {
                $link = base_url('/bookings/rooms/selectroom');

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
        Hurray🎊 your Payment has been confirmed!
    </div>
    <div class='content'>
        <p>Dear {$firstname} {$lastname},</p>
        <p>We’re excited to inform you that your PAYMENT has been CONFIRMED by Iddocare (XXIV ROOMS).</p>
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
                    $email,
                    'Hurray 🎊: Your payment has been confirmed!',
                    $htmlMessage,
                    'support@iddocare.com'
                );

                if ($isSent) {
                    log_message('info', 'Email successfully sent to ' . $email);
                } else {
                    log_message('error', 'Email failed to send to ' . $email);
                }
            }
        }

        return redirect()->back()->with('success', ' status changed successfully');
    }

    public function RoomSelection()
    {

        $BookingsSummaryModel = new BookingsSummaryModel();
        $Bookingsdetails = new BookingsDetailsModel();
        $bedspaceModel = new BedspaceModel();
        $hostelSessionModel = new HostelSessionModel();
        $StudentModel = new StudentModel();



        $hostelSession = $hostelSessionModel->where('session_status', 'ACTIVE')->findAll();
        // echo '<pre>';
        // print_r($hostelSession);
        // die;
        $this->viewBag = [
            'hostelSession' => $hostelSession,
            'title' => 'Rooms Selection',
            'pagetitle' => 'Room Selection with Prices'
        ];

        // Fetch data from the database
        $roomDetails = $bedspaceModel->getRoomDetails();

        // Fetch all bookings from the BookingsSummaryModel
        $BookingsSummaryModel = new BookingsSummaryModel();
        $Bookings = $BookingsSummaryModel->findAll();
        $this->viewBag['bookings'] = $Bookings;
        // echo '<pre>';
        // print_r($roomDetails);
        // die;

        $this->viewBag['roomData'] = $roomDetails;
        $activeMenuItem = 'bookingdash'; // Set active menu item
        $this->viewBag['activeMenuItem'] = $activeMenuItem;


        $post = $this->request->getPost();
        if ($post) {

            $room_type = isset($post['room_type']) ? $post['room_type'] : '';
            $no_of_beds = isset($post['no_of_beds']) ? $post['no_of_beds'] : '';
            $room_no = isset($post['room_no']) ? $post['room_no'] : '';
            $paying_session = isset($post['session_year']) ? $post['session_year'] : '';


            if ($paying_session == '') {
                // User already has a booking for this session
                return redirect()->to('bookings/rooms/selectroom')->with('error', 'Payment sessions cannot be empty.');
            }


            // Check if the user already has a booking for the selected session
            // Sroom_typeanitize input data
            $full_room = isset($no_of_beds) && $no_of_beds >= 2 ? 'YES' : '';

            $uuid = _get_new_uuid();
            // Generate a unique booking ID
            $booking_id = generate_bks_id();
            $issued_date = date('Y-m-d');

            // Calculate expiration date
            $room_expiration_date = date('Y-m-d', strtotime('+1 year', strtotime($issued_date)));
            $firstname = session()->get('firstname');
            $lastname = session()->get('lastname');
            $student_id = session()->get('student_id');
            $username = session()->get('username');
            $email = session()->get('email');
            $location = session()->get('address') ?? '';


            $existingSession = $BookingsSummaryModel->where('username', $username)
                ->where('school_session', $paying_session)
                ->first();

            // Check if the user already has a booking for the selected session
            if ($existingSession) {
                // User already has a booking for this session
                return redirect()->back()->with('error', 'You already have a session booked for this period.');
            }

            // Check if the user already has a booking for the selected session
            $data = [
                'uuid'  =>  $uuid,
                'school_session'  => $paying_session,
                'location_code'  => $location,
                'username'  => $username,
                'student_name'  =>  $firstname . ' ' . $lastname,
                'booking_id'  => $booking_id,
                'student_id'  => $student_id,
                'email'  => $email,
                'payment_status'  => 'PENDING',
                'booking_date'  => $issued_date,
                'bed_space'  =>  $post['bed_space'],
                'room_no'  => $room_no,
                'selected_bunk'  =>  $post['selected_bunk'],
                'price'  => $post['price'],
                'no_of_beds'  => $no_of_beds,
                'room_type'  => $room_type,
                'room_expiration_date'  => $room_expiration_date,
                'full_room'  => $full_room,
                'amount_due' => $post['amount_due'],
            ];

            // echo '<pre>';
            // print_r($data);
            // die;
            $validation = $this->validate([
                'school_session' => [
                    'rules' => 'is_unique[bookings_summary.school_session]',
                    'rules' => 'is_unique[bookings_summary.username]',
                    'rules' => 'is_unique[bookings_summary.room_no]',
                    'errors' => [
                        'is_unique' => 'This email has already been used. Please enter a different email.',
                    ]
                ],
            ]);

            if (!$validation) {
                // Store validation errors in session
                session()->setFlashdata('validation_errors', $this->validator->getErrors());
                // Redirect back
                return redirect()->back()->with('error', 'You already have a session booked. You can only rebook after your session expires.'); // withInput() keeps the form input data
            }

            // echo '<pre>';
            // print_r($data);
            // die;

            // Check if the booking ID already exists in the database
            $insert_id = $BookingsSummaryModel->insert($data);

            if ($insert_id > 0) {
                // Assuming you want to insert data into another table for each bed picked
                for ($i = 0; $i < $no_of_beds; $i++) {
                    $Bookingsdetail = [
                        // Modify this array based on the data you want to insert into the other table
                        'uuid' => $uuid,
                        'booking_id' => $booking_id,
                        'school_session'  => $paying_session,
                        'location_code'  => $location,
                        'username'  => $username,
                        'student_name'  =>  $firstname . ' ' . $lastname,
                        'booking_id'  => $booking_id,
                        'student_id'  => $student_id,
                        'payment_status'  => 'PAID',
                        'booking_date'  => $issued_date,
                        'bed_space'  =>  $post['bed_space'],
                        'selected_bunk'  =>  $post['selected_bunk'],
                        'room_no'  => $room_no,
                        'price'  => $post['price'],
                        'no_of_beds'  => $no_of_beds,
                        'room_type'  => $room_type,
                        'full_room'  => $full_room,
                        'amount_due' => $post['amount_due'],
                        'total' => $post['amount_due'],
                        // Add more columns as needed...
                    ];

                    // Insert data into another table
                    $Bookingsdetails->insert($Bookingsdetail);
                }

                return redirect()->back()->with('success', 'Your booking has been confirmed. <br> You can now proceed to making payment');;
            } else {
                return redirect()->back()->with('error', 'Your booking request was unsuccessfull');
            }
        }
    }
}
