<?php

namespace Modules\Administration\Controllers;


use Modules\Administration\Models\StudentModel;
use Modules\Administration\Libraries\SesApi;
use Modules\Administration\Models\AuthModel;
use Modules\Administration\Models\BookingsSummaryModel;
use Modules\Administration\Models\BookingsDetailsModel;
use Modules\Administration\Models\ModuleLinksModel;

use function App\Controllers\generate_student_id;

// class AdminDashboardController extends  \App\Controllers\BaseController
class CreateUsersController extends  AdminBaseController
{

    public function index()
    {  // Fetch visitor data

        $username = session()->get('username');
        $this->viewBag = [
            'title' => 'Create Users ',
            'pagetitle' => 'All Profile are made here'
        ];
        $module = new ModuleLinksModel();
        // Set active menu item
        $this->viewBag['Modules'] = [
            'Modulelinks' => $module->findAll(),
        ];

        $activeMenuItem = 'userList'; // Set active menu item

        $this->viewBag['activeMenuItem'] = $activeMenuItem;
        return view(MODULE_ADMIN_VIEWS . '/pages/profile/create_users_view', $this->viewBag);
    }

    public function userDetails($id)
    {  // Fetch visitor data
        $AuthModel = new AuthModel();

        // Retrieve the current user's data
        $user = $AuthModel->find($id);

        $this->viewBag = [
            'mode' => 'edit',
            'UserInfo' => $user,
            'Id' =>  $id,
            'title' => 'Create Users ',
            'pagetitle' => 'All Profile are made here'
        ];


        $activeMenuItem = 'userList'; // Set active menu item
        $this->viewBag['activeMenuItem'] = $activeMenuItem;
        return view(MODULE_ADMIN_VIEWS . '/pages/profile/create_users_view', $this->viewBag);
    }

    public function userlist()
    {  // Fetch visitor data

        $AuthModel = new AuthModel();

        $username = session()->get('username');
        $this->viewBag = [
            'Userlist' => $AuthModel->orderBy('created_at', 'desc')->findAll(),
            'title' => 'User list ',
            'pagetitle' => 'All Profile are made here'
        ];
        $module = new ModuleLinksModel();
        // Set active menu item
        $this->viewBag['Modules'] = [
            'Modulelinks' => $module->findAll(),
        ];

        $activeMenuItem = 'userList'; // Set active menu item
        $this->viewBag['activeMenuItem'] = $activeMenuItem;
        return view(MODULE_ADMIN_VIEWS . '/pages/profile/users_list_list', $this->viewBag);
    }

    public function Register()
    {
        $Attach = usernameAttach();
        $authModel = new AuthModel();

        $post = $this->request->getPost();
        $postdata = [
            'first_name' => $post['first_name'],
            'last_name' => $post['last_name'],
            'username' => $post['first_name'] . '' . $Attach,
            'email' => $post['email'],
            'password' => password_hash($post['password'], PASSWORD_DEFAULT)
        ];
        // echo '<pre>';
        // print_r($postdata);
        // die;
        // Check if email or password already exist in the student table
        $studentModel = new StudentModel();
        $existingStudent = $studentModel->where('email', $post['email'])->orWhere('username', $postdata['username'])->first();

        if ($existingStudent) {
            // Email or password already exist in the student table, return with an error message
            return redirect()->back()->with('error', 'This email has already been used. Please enter different credentials.');
        }

        $validation = $this->validate([
            'email' => [
                'rules' => 'is_unique[users.email]',
                'errors' => [
                    'is_unique' => 'This email has already been used. Please enter a different email.',
                ]
            ],
            'username' => [
                'rules' => 'is_unique[users.username]',
                'errors' => [
                    'is_unique' => 'This username has already been taken. Please choose a different username.',
                ]
            ],
        ]);

        if (!$validation) {
            // Store validation errors in session
            session()->setFlashdata('validation_errors', $this->validator->getErrors());

            // Redirect back
            return redirect()->back()->with('error', 'This email has already been used. Please enter a different email.'); // withInput() keeps the form input data
        }

        $insert = $authModel->insert($postdata);
        if ($insert) {

            return redirect()->to('admin/user-list')->with('succes', 'Account creation was successful.');;
        } else {
            // $this->util->toast(ERROR, "Oops!! Something went wrong, please try again");
            return redirect()->back()->with('error', 'An Error occured, Please try again.');;
        }
    }

    // ================================
    public function ActivateUser($id)
    {
        // Retrieve the booking by its ID
        $authModel = new AuthModel();
        $authstatus = $authModel->find($id);

        // Check if the booking exists
        if (!$authstatus) {
            return redirect()->back()->with('error', 'User not found');
        }
        // Update the booking record
        $data = [
            'status' => 'ACTIVE',
        ];

        $detailUpdated = $authModel->update($id, $data);

        // Check if the record was updated successfully
        if ($detailUpdated === false) {
            return redirect()->back()->with('error', 'User Activation failed please try again');
        } else {
            // Redirect back with success message
            return redirect()->back()->with('success', 'User Activated successfully');
        }
    }
    public function DeactivateUser($id)
    {
        // Retrieve the user by its ID
        $authModel = new AuthModel();
        $authstatus = $authModel->find($id);

        // Check if the user exists
        if (!$authstatus) {
            return redirect()->back()->with('error', 'User not found');
        }

        // Update the user record
        $data = [
            'status' => 'INACTIVE',
        ];

        $detailUpdated = $authModel->update($id, $data);

        // Check if the record was updated successfully
        if ($detailUpdated === false) {
            return redirect()->back()->with('error', 'User deactivation failed, please try again');
        } else {
            // Redirect back with success message
            return redirect()->back()->with('success', 'User deactivated successfully');
        }
    }

    // ============================

    public function passwordnewUpdate($id)
    {
        $AuthModel = new AuthModel();
        $post = $this->request->getPost();

        // Prepare data for insertion
        $data = [
            'first_name' => $post['first_name'],
            'last_name' => $post['last_name'],
            'email' => $post['email'],
            'password' => password_hash($post['password'], PASSWORD_DEFAULT),
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