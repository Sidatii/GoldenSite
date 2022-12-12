<?php
class Admins extends Controller
{
     private $adminModel;
    public function __construct(){
        $this->adminModel = $this->model('Admin');
    }
    public function login()
    {
        // Check for POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Init data
            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_err' => '',
                'password_err' => '',
            ];

            // Validate Email
            if (empty($data['email'])) {
                $data['email_err'] = 'Please enter email';
            } else{
                // Check email
                if($this->adminModel->findAdminByEmail($data['email'])){
                    $data['email_err'] = 'Email is already taken';
                }
            }

            // Validate Password
            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter password';
            }
            if (strlen($data['password']) < 6 ) {
                $data['password_err'] = 'Password must be at least 6 characters';
            }

            // Make sure errors are empty
            if (empty($data['email_err']) && empty($data['password_err'])) {
                // Validated
                die('SUCCESS');
            } else {
                // Load view with errors
                $this->view('admins/login', $data);
            }


        } else {
            // Init data
            $data = [
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => '',
            ];

            // Load view
            $this->view('admins/login', $data);
        }
    }
}
    ?>