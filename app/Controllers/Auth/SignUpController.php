<?php


namespace App\Controllers\Auth;

use CodeIgniter\Session\Session;
use App\Models\UserModel;
use App\Controllers\BaseController;
use App\Libraries\SesApi;
use App\Models\AdminModel;
use Config\Services;


use function App\Controllers\generate_student_id;
use function App\Controllers\generateRandomString;
use function App\Controllers\usernameAttach;

class SignUpController extends BaseController
{

    protected $emailMan;

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
        return view('pages/auth/sign_up',  $this->viewBag);
    }


    public function RegisterStudents()
    {
        // Generate unique identifiers
        $studentId = generate_student_id();
        $customerId = generateRandomString();
        $Attach = usernameAttach();
        $token = bin2hex(random_bytes(16)); // Generate a random token

        // Instantiate UserModel
        $SModel = new UserModel();


        // ========= capt validation here
        $request = Services::request();
        $recaptchaResponse = $request->getPost('g-recaptcha-response');
        $secretKey = 'CAP_SECRET_KEYS'; // Replace with your secret key

        $client = Services::curlrequest();
        $response = $client->request('POST', 'https://www.google.com/recaptcha/api/siteverify', [
            'form_params' => [
                'secret' => $secretKey,
                'response' => $recaptchaResponse,
            ],
        ]);

        $result = json_decode($response->getBody(), true);

        // Get form data

        $post = $this->request->getPost();
        // check for success before inserting
        if ($result['success']) {
            $postdata = [
                'student_id' => $studentId,
                'customerId' => $customerId,
                'first_name' => $post['first_name'],
                'last_name' => $post['last_name'],
                'username' => $post['first_name'] . '' . $Attach,
                'email' => $post['email'],
                'password' => password_hash($post['password'], PASSWORD_DEFAULT),
                'activation_token' => $token, // Store the token in the database
                'status' => 'inactive', // Set initial status to inactive
            ];

            $AdminModel = new AdminModel();
            $existingUser = $AdminModel->where('email', $post['email'])->orWhere('username', $postdata['username'])->first();

            if ($existingUser) {
                // Email or password already exist in the student table, return with an error message
                return redirect()->back()->with('error', 'This email or username has already been used. Please enter different credentials.');
            }

            $validation = $this->validate([
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

            // Insert user data into the database
            $insert = $SModel->insert($postdata);

            if ($insert === false) {
                return redirect()->back()->with('error', 'Oops! Something went wrong during registration. Please try again later.');
            } else {

                // Send activation email with token
                $sesapi = new SesApi;
                $activationLink = site_url("activate-account/{$token}"); // Construct activation link with token
                $htmlMessage = view("auth/email/welcome_message", [
                    'firstname' => $postdata['first_name'],
                    'lastname' => $postdata['last_name'],
                    'activationLink' => $activationLink, // Pass activation link to email view
                ]);
                $sesapi->send(
                    $post['email'],
                    'Welcome to Iddocare!',
                    $htmlMessage,
                    'support@iddocare.com'
                );
                return redirect()->to('/')->with('success', 'Registration was successful. Please check your email to activate your account.');
            }
        } else {
            // reCAPTCHA verification failed
            // Handle error
            return redirect()->back()->with('errors', 'Invalid reCAPTCHA response try again');
        }
    }

    public function activateAccount($token)
    {
        $SModel = new UserModel();

        // Find user by token
        $user = $SModel->where('activation_token', $token)->first();

        // Check if user exists and token is valid
        if (!$user) {
            return redirect()->to('/')->with('error', 'Invalid activation token.');
        }

        // Update user's account status to "active" and remove activation token
        $data = [
            'status' => 'ACTIVE',
            'activation_token' => null,
        ];
        $SModel->update($user['id'], $data);

        // Redirect to a suitable page (e.g., dashboard) with a success message
        return redirect()->to('/')->with('success', 'Your account has been activated successfully.');
    }
}
