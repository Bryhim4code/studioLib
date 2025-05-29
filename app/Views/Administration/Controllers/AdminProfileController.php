<?php


namespace Modules\Administration\Controllers;

use App\Models\Commonmodel;
use Modules\Administration\Libraries\AdminDbScripts;
use Modules\Administration\Models\AuthModel;
use Modules\Administration\Models\ModuleLinksModel;

// class AdminDashboardController extends  \App\Controllers\BaseController
class AdminProfileController extends  AdminBaseController
{

    public function index()
    {
        $AuthModel = new AuthModel();
        $this->viewBag = [
            'AdminData' => $AuthModel->where('username', session('username'))->first(),
            // 'relationData' => $Model->where('username', session('username'))->findAll(),
            'title' => 'Admin Profile',
            'pagetitle' => 'All Profile are made here'
        ];
        $module = new ModuleLinksModel();
        // Set active menu item
        $this->viewBag['Modules'] = [
            'Modulelinks' => $module->findAll(),
        ];
        $activeMenuItem = 'profile'; // Set active menu item
        $this->viewBag['activeMenuItem'] = $activeMenuItem;
        return view(MODULE_ADMIN_VIEWS . '/pages/profile/profiledash_view', $this->viewBag);
    }
    public function ProfileSettings()
    {
        $AuthModel = new AuthModel();
        // $CountryModel = new CountryModel();
        $this->viewBag = [
            'AdminData' => $AuthModel->where('username', session('username'))->first(),
            // 'CountryList' => $CountryModel->findAll(),
            'title' => 'Profile',
            'pagetitle' => 'All Profile are made here'
        ];
        $module = new ModuleLinksModel();
        // Set active menu item
        $this->viewBag['Modules'] = [
            'Modulelinks' => $module->findAll(),
        ];

        $activeMenuItem = 'profile'; // Set active menu item
        $this->viewBag['activeMenuItem'] = $activeMenuItem;
        return view(MODULE_ADMIN_VIEWS . '\pages\profile\profile_settings', $this->viewBag);
    }

    public function DetailsUpdate($id)
    {
        $AuthModel = new AuthModel();
        $post = $this->request->getPost();
        // Handle File Upload if a file is uploaded
        $file = $this->request->getFile('file');
        $filePath = ''; // Initialize file path variable

        // Check if a file is uploaded
        if ($file) {
            // Check if the file is valid
            if ($file->isValid()) {
                // Move the uploaded file to a directory
                $filePath = 'uploads/profile/image';
                if (!is_dir($filePath)) {
                    mkdir($filePath, 0777, true);
                }
                $newFileName = $file->getRandomName();
                if ($file->move($filePath, $newFileName)) {
                    // File uploaded successfully
                    $filePath .= $newFileName; // Update file path
                } else {
                    // File upload failed
                    log_message('error', 'Failed to upload file.');
                    return redirect()->back()->with('error', 'Failed to upload file.');
                }
            } else {
                // File is uploaded but it's invalid
                log_message('warning', 'Uploaded file is invalid.');
                // Still allow the form to submit, just set filePath to empty string
            }
        }
        // Prepare data for insertion
        $data = [
            'first_name' => $post['firstname'],
            'last_name' => $post['lastname'],
            'phone' => $post['phone'],
            'address' => $post['address'],

        ];
        // Update photo field only if filePath is not empty
        if (!empty($newFileName)) {
            $data['photo'] = $newFileName;
        }
        // echo '<pre>';
        // print_r($data);
        // die;
        // Update data in the database
        $updateResult = $AuthModel->update($id, $data);

        if ($updateResult) {
            return redirect()->back()->with('success', 'Details update was successful');
        } else {
            return redirect()->back()->with('error', 'Request was unsuccessful');
        }
    }

    public function passwordUpdate($id)
    {
        $AuthModel = new AuthModel();
        $post = $this->request->getPost();

        // Retrieve the current user's data
        $user = $AuthModel->find($id);

        // Verify if the current password matches the provided password
        if (!password_verify($post['currentpassword'], $user['password'])) {
            return redirect()->back()->with('error', 'Current password is incorrect');
        }

        // Prepare data for insertion
        $data = [
            'password' => password_hash($post['newpassword'], PASSWORD_DEFAULT),
        ];

        // Update the password in the database
        $updateResult = $AuthModel->update($id, $data);

        if ($updateResult) {
            return redirect()->back()->with('success', 'Password update was successful');
        } else {
            return redirect()->back()->with('error', 'Request was unsuccessful');
        }
    }
}
