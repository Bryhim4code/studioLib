<?php


namespace Modules\Administration\Controllers;

use App\Models\Commonmodel;
use Modules\Administration\Libraries\AdminDbScripts;
use Modules\Administration\Models\StudentModel;
use Modules\Administration\Models\BookingsSummaryModel;
use Modules\Profile\Models\NextOfKinModel;
use Modules\Administration\Models\ModuleLinksModel;
use App\Libraries\SesApi;

class ResidentProfileController extends  AdminBaseController
{

    public function index()
    {
        $StudentModel = new StudentModel();
        $this->viewBag = [
            'Residentslist' => $StudentModel->where('status', 'ACTIVE')->orderBy('updated_at', 'DESC')->findAll(),
        ];
        $module = new ModuleLinksModel();
        // Set active menu item
        $this->viewBag['Modules'] = [
            'Modulelinks' => $module->findAll(),
        ];
        $activeMenuItem = 'residentslist'; // Set active menu item
        $this->viewBag['activeMenuItem'] = $activeMenuItem;
        return view(MODULE_ADMIN_VIEWS . '/pages/profile/residents', $this->viewBag);
    }


    public function Profiledetails($id)
    {
        $StudentModel = new StudentModel();
        $BookingsSummaryModel = new BookingsSummaryModel();
        $Model = new NextOfKinModel();  

        // Get the currently student's username from the session
        $stuData = $StudentModel->where('id', $id)->first();

        $username = $stuData['username'];

        // Fetch next of kin details
        $relationData = $Model->where('username', $username)->findAll();

        $bookingDetails = $BookingsSummaryModel->select('selected_bunk,booking_date,room_expiration_date, status, no_of_beds, amount_due, room_no, room_type, floor')
            ->where('username', $username)
            ->findAll();

        // Add all necessary data to viewBag
        $this->viewBag = [
            'bookingDetails' => $bookingDetails, // Add booking details to the view
            'relationData' => $relationData, // Add booking details to the view
            'Residentsdata' =>  $stuData,
            'title' => 'Profile',
            'pagetitle' => 'All Profile are made here'
        ];

        // echo '<pre>';
        // print_r($this->viewBag);
        // die;

        $module = new ModuleLinksModel();
        // Set active menu item
        $this->viewBag['Modules'] = [
            'Modulelinks' => $module->findAll(),
        ];

        $activeMenuItem = 'residentslist'; // Set active menu item
        $this->viewBag['activeMenuItem'] = $activeMenuItem;
        return view(MODULE_ADMIN_VIEWS . '\pages\profile\view_resident', $this->viewBag);
    }

    public function AproveKYC($id)
    {
        // Retrieve the property by its ID

        $StudentModel = new StudentModel();
        $users = $StudentModel->find($id);
        $firstname = $users['first_name'];
        $lastname = $users['last_name'];


        // Check if the property exists
        if (!$users) {
            return redirect()->back()->with('error', 'user not found');
        }

        // Toggle the visibility
        $newStatus = ($users['kyc_status'] == 'DENIED') ? 'APPROVED' : 'DENIED';

        // Update the property record
        $data = [
            'kyc_status' => $newStatus,
        ];

        $updated = $StudentModel->update($users['id'], $data);
        $sesapi = new SesApi;


        if ($updated === false) {
            return redirect()->back()->with('error', 'Failed to update KYC status');
        } else {
            if ($newStatus == 'APPROVED') {
                $link = base_url('/profile/student/code-generation');

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
        Congratulation 🎊 your registration has been approved!
    </div>
    <div class='content'>
        <p>Dear {$firstname} {$lastname},</p>
        <p>We’re excited to inform you that your registration has been successfully approved by XXIV ROOMS by Iddocare.</p>
        <p>Please click the button below to proceed with generating your payment codes.</p>
        <p><a href='{$link}' class='button' target='_blank'>Generate Payment Codes</a></p>
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
                    $users['email'],
                    'Hurray 🎊 Your registration has been approved!',
                    $htmlMessage,
                    'support@iddocare.com'
                );

                if ($isSent) {
                    log_message('info', 'Email successfully sent to ' . $users['email']);
                } else {
                    log_message('error', 'Email failed to send to ' . $users['email']);
                }
            }

            return redirect()->back()->with('success', 'KYC status changed successfully');
        }
    }

   
}
