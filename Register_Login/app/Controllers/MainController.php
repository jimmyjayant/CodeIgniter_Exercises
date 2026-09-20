<?php
namespace App\Controllers;
use App\Models\UserModel;

class MainController extends BaseController
{

    protected $userModel;

    // To access the validation_show_error() function in the view to show validation error of a particular field
    protected $helpers = ['form'];

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        return view('index');
    }

    public function register()
    {
        return view('register');
    }

    public function login()
    {
        return view('login');
    }

    public function addUser()
    {
        if(!$this->request->is('post'))
        {
            return redirect()->back()->with('error', 'Request Method is not POST!');
        }

        $validationRules = [
            'firstname' => [
                'rules' => 'required|min_length[3]|max_length[100]',
                'errors' => [
                    'required' => 'First Name is required',
                    'min_length' => 'First Name must be 3 characters atleast',
                    'max_length' => 'First Name must be 100 characters max'
                ]
            ],

            'middlename' => [
                'rules' => 'permit_empty|min_length[3]|max_length[100]',
                'errors' => [
                    'min_length' => 'Middle Name must be 3 characters atleast',
                    'max_length' => 'Middle Name must be 100 characters max'
                ]
            ],

            'lastname' => [
                'rules' => 'permit_empty|min_length[3]|max_length[100]',
                'errors' => [
                    'min_length' => 'Last Name must be 3 characters atleast',
                    'max_length' => 'Last Name must be 100 characters max'
                ]
            ],

            'gender' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Gender is required'
                ]
            ],

            'mobilenumber' => [
                'rules' => 'required|numeric|exact_length[10]',
                'errors' => [
                    'required' => 'Mobile Number is required',
                    'numeric' => 'Mobile Number must only contain digits',
                    'exact_length' => 'Mobile Number must contain exactly 10 digits',
                ]
            ],

            'address' => [
                'rules' => 'required|min_length[10]|max_length[500]',
                'errors' => [
                    'required' => 'Address is required',
                    'min_length' => 'Address must be 10 characters atleast',
                    'max_length' => 'Address must be 500 characters max'
                ]
            ],

            'email' => [
                'rules' => 'required|valid_email|is_unique[user.email]',
                'errors' => [
                    'required' => 'Email is required',
                    'valid_email' => 'Please provide valid email',
                    'is_unique' => 'Please provide unique email'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[6]|max_length[12]',
                'errors' => [
                    'required' => 'Password is required',
                    'min_length' => 'Password must be 6 characters minimum',
                    'max_length' => 'Password must be 12 characters maximum'
                ]
            ]
        ];

        if(!$this->validate($validationRules))
        {
            // return view('register', ['validationError' => $this->validator]);
            // return redirect()->back()->withInput()->with('validationError', $this->validator);
            return redirect()->back()->withInput();
        }

        // Validation Passed
        $data = [
            'firstname' => $this->request->getPost('firstname'),
            'middlename' => $this->request->getPost('middlename'),
            'lastname' => $this->request->getPost('lastname'),
            'gender' => $this->request->getPost('gender'),
            'mobilenumber' => $this->request->getPost('mobilenumber'),
            'address' => $this->request->getPost('address'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash(
                $this->request->getPost('password'),
                PASSWORD_DEFAULT
            ),
            'login_status' => 'logout',
        ];

        // print_r($data);

        try
        {
            $InsertOK = $this->userModel->insert($data);

            if(!$InsertOK)
            {
                throw new \Exception("Error registering user. Please try again later!");
            }

            return redirect()->to('/login')->with('success', 'User registered successfully!');
        }
        catch(\Exception $e)
        {
            log_message('error', $e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function getUser()
    {
        if(!$this->request->is('post'))
        {
            return redirect()->back()->with('error', 'Request Method is not POST!');
        }

        $validationRules = [
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Email is required',
                    'valid_email' => 'Please provide valid email'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[6]|max_length[12]',
                'errors' => [
                    'required' => 'Password is required',
                    'min_length' => 'Password must be 6 characters minimum',
                    'max_length' => 'Password must be 12 characters maximum'
                ]
            ]
        ];

        if(!$this->validate($validationRules))
        {
            return redirect()->back()->withInput();
        }

        $data = [
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password')
        ];

        try
        {
            $foundData = $this->userModel->where('email', $data['email'])->find();
            // print_r($foundData); // print an array of associative arrays
            // exit();
            if(!$foundData)
            {
                throw new \Exception("Wrong Email!");
            }

            foreach($foundData as $array)
            {
                if(array_key_exists('password', $array))
                {
                    $passwordMatched = password_verify($data['password'], $array['password']);

                    if($passwordMatched == false)
                    {
                        throw new \Exception('Wrong Password!');
                    }

                    $user = $array['firstname'];

                    // Change login_status field of the logged in user to 'login' from 'logout'
                    // And also set unique token of the logged in user
                    $token = bin2hex(random_bytes(32));

                    $UpdateLoginStatus = $this->userModel->update(
                        $array['id'], 
                        [
                        'login_status' => 'login',
                        'token' => $token
                        ]
                    );

                    if($UpdateLoginStatus == false)
                    {
                        throw new \Exception('Unable to login to your account!');
                    }

                    // Set username of logged in user as session data
                    session()->set([
                        'username' => $user,
                        'loggedIn' => true,
                        'token' => $token
                    ]);

                    return view('login_success', ['user' => $user]);
                }
            }            
        }
        catch(\Exception $e)
        {
            log_message('error', $e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function logOutUser()
    {
        // Change login_status field of the logged out user to 'logout' from 'login'
        try
        {
            $tokenOfLoggedInUser = session()->get('token');

            if(!$tokenOfLoggedInUser)
            {
                throw new \Exception('Error logging out. Please try again later!');   
            }

            $foundData = $this->userModel->where('token', $tokenOfLoggedInUser)->find();

            // print_r($foundData); // print an array of associative arrays
            // exit();

            if(!$foundData)
            {
                throw new \Exception('Error logging out. Logged in user data not found!'); 
            }

            foreach($foundData as $array)
            {
                if(array_key_exists('token', $array))
                {
                    // Update login_status of logged out user to 'logout' and empty the token field
                    $UpdateLoginStatus = $this->userModel->update(
                        $array['id'], 
                        [
                        'login_status' => 'logout',
                        'token' => ''
                        ]
                    );

                    if($UpdateLoginStatus == false)
                    {
                        throw new \Exception('Unable to logout from your account!');
                    }

                    // Removes all session data and destroys the session.
                    // session()->destroy();
                    session()->remove(['username', 'loggedIn', 'token']);

                    // session()->setFlashdata('success', 'User Logged out successfully!');
                    return redirect()->to('/login')->with('success', 'User Logged out successfully!');
                }
            }
        }
        catch(\Exception $e)
        {
            log_message('error', $e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
?>
