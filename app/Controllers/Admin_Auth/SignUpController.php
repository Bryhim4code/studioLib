<?php


namespace App\Controllers\Admin_Auth;

use CodeIgniter\Session\Session;
use App\Models\AuthModel;
use App\Models\StudentModel;
use App\Controllers\BaseController;
use function App\Controllers\usernameAttach;

class SignUpController extends BaseController
{


    function __construct()
    {
        helper(['url', 'form']);
        $session = \Config\Services::session();
    }


    public function index(): string
    {
        $this->viewBag = [

            'title' => 'Sign Up',
            'header' => 'Category and update'
        ];
        return view('admin_auth/sign_up_view', $this->viewBag);
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
        // $existingStudent = $studentModel->where('email', $post['email'])->orWhere('username', $post['username'])->first();
        $existingStudent = $studentModel->where('email', $post['email'])->orWhere('username', $postdata['username'])->first();

        if ($existingStudent) {
            // Email or password already exist in the student table, return with an error message
            return redirect()->back()->with('error', 'This email or password has already been used. Please enter different credentials.');
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
            'email' => [
                'rules' => 'is_unique[students.email]',
                'errors' => [
                    'is_unique' => 'This email has already been used. Please enter a different email.',
                ]
            ],
            'username' => [
                'rules' => 'is_unique[students.username]',
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

            return redirect()->back()->with('succes', 'Account creation was successful. A mail has been sent to you to very and activate account.');;
        } else {
            // $this->util->toast(ERROR, "Oops!! Something went wrong, please try again");
            return redirect()->back()->with('error', 'An Error occured, Please try again.');;
        }
    }
}
