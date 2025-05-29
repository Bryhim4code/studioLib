<?php


namespace App\Controllers\Admin_Auth;

use App\Libraries\SesApi;
use CodeIgniter\Session\Session;
use App\Models\AuthModel;
use App\Controllers\BaseController;

class SignInController extends BaseController
{

    function __construct()
    {
        helper(['url', 'form']);
        $session = \Config\Services::session();
    }

    public function index(): string
    {

        $this->viewBag = [

            'title' => 'Sign In',
            'header' => 'Iddocare Portal'
        ];
        return view('admin_auth/auth_page', $this->viewBag);
    }

    public function TwofcAuth(): string
    {
        return view('admin_auth/2fc_auth_view');
    }

    public function authenticate()
    {
        $session = \Config\Services::session();
        $request = service('request');
        $email = $request->getPost('email');
        $password = $request->getPost('password');

        $authModel = new AuthModel();
        $user = $authModel->where('email', $email)->first();

        if ($user) {
            $hashedPasswordFromDatabase = $user['password']; // Retrieve password from the database (not hashed)
            if ($user['status'] === 'ACTIVE') {

                if (password_verify($password, $hashedPasswordFromDatabase)) {
                    // if (true) {
                    // Password matches (not recommended)
                    // Set user data to session
                    $session = session();
                    $userData = [
                        'loggedUserId' => $user['id'],
                        'email' => $user['email'],
                        'firstname' => $user['first_name'],
                        'lastname' => $user['last_name'],
                        'phone' => $user['phone'],
                        'role' => $user['role'],
                        'address' => $user['address'],
                        'username' => $user['username'],
                        'logged_in' => true, // Set a flag indicating the user is logged in
                    ];
                    // echo '<pre>';
                    // print_r($userData);
                    // die;z

                    $session->set($userData);

                    // Your login success logic here
                    return redirect()->to('admin/dashboard')->with('success', 'Logged in successfully');
                } else {
                    // Password does not match
                    $session->setFlashdata('error', 'Invalid email or password');
                }
            } else {
                // User's account is not active
                $session->setFlashdata('error', 'Your account is not active. Please check your email to activate or contact support.');
            }
        } else {
            // User not found
            $session->setFlashdata('error', 'Invalid email or password');
        }

        // Redirect back to the login page with the error message
        return redirect()->to('/admin-panel');
    }

    public function forgotPassword()
    {
        $this->viewBag = [

            'title' => 'Reset Your Password',
            'header' => 'Category and update'
        ];
        return view('admin_auth/forgot_password_view',   $this->viewBag);
    }

    public function sendResetLink()
    {
        $request = service('request');
        $email = $request->getPost('email');

        $authModel = new AuthModel();
        $user = $authModel->where('email', $email)->first();

        if ($user) {
            $token = bin2hex(random_bytes(32));
            $user['reset_token'] = $token;
            $user['reset_timestamp'] = date('H:i:s'); // Store as readable date and time
            $user['reset_attempts'] = 0; // Reset attempts counter
            $authModel->update($user['id'], $user);

            $resetLink = base_url('admin-panel/reset-password?token=' . $token . '&user_id=' . $user['id']); // Include user ID in the reset link

            $sesapi = new SesApi();
            $htmlMessage = view("admin_auth/email/reset_password_mail", [
                'firstname' => $user['first_name'],
                'lastname' => $user['last_name'],
                'username' => $user['username'],
                'resetLink' => $resetLink,
            ]);
            
            $sesapi->send(
                $user['email'],
                'Password Reset Request',
                $htmlMessage,
                'support@iddocare.com'
            );

            return redirect()->to('/admin-panel')->with('success', 'Password reset link sent to your email.');
        }

        return redirect()->to('admin-panel/')->with('error', 'Email address not found.');
    }

    public function AddNewPassword(): string
    {
        $request = service('request');
        $this->viewBag = [

            'token' => $request->getGet('token'),
            'userId'  => $request->getGet('user_id'),
            'title' => 'Reset Your Password',
            'header' => 'Category and update'
        ];
        return view('admin_auth/reset_password_view', $this->viewBag);
    }

    public function resetPassword()
    {
        $request = service('request');
        $token = $request->getGet('token');
        $userId = $request->getGet('user_id');

        // Check if the token and user ID exist in the database
        $authModel = new AuthModel();
        $user = $authModel->where('reset_token', $token)
            ->where('id', $userId)
            ->first();

        if ($user) {
            // Check if the token is still valid based on timestamp
            $currentTime = time();
            $resetTimestamp = strtotime($user['reset_timestamp']); // Convert to Unix timestamp
            $timeDifference = $currentTime - $resetTimestamp;
            $expirationTime = 600; // 10 minutes in seconds

            if ($timeDifference <= $expirationTime && $user['reset_attempts'] < 3) {
                return view('admin_auth/reset_password_view', ['token' => $token, 'user_id' => $userId]);
            } else {
                return redirect()->to('/admin-panel')->with('error', 'The password reset link has expired or exceeded the number of attempts.');
            }
        }

        return redirect()->to('/admin-panel')->with('error', 'Invalid reset token or user ID.');
    }

    public function updatePassword()
    {
        $request = service('request');
        $password = $request->getPost('password');
        $token = $request->getPost('token');
        $userId = $request->getPost('user_id');

        // Check if the token and user ID exist in the database
        $authModel = new AuthModel();
        $user = $authModel->where('reset_token', $token)
            ->where('id', $userId)
            ->first();

        if ($user) {
            // Update the user's password and reset token
            $user['password'] = password_hash($password, PASSWORD_DEFAULT);
            $user['reset_token'] = null;
            $user['reset_attempts'] = 0; // Reset attempts counter



            $authModel->update($user['id'], $user);

            return redirect()->to('/admin-panel')->with('success', 'Password updated successfully.');
        }

        return redirect()->to('/admin-panel')->with('error', 'Invalid or expired reset token or user ID.');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/admin-panel');
    }
}
