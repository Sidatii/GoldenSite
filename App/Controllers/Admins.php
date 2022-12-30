<?php
class Admins extends Controller
{
    private $adminModel;
    public function __construct()
    {
        
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
            }

            // Validate Password
            if (empty($data['password'])) {
                $data['password_err'] = 'Please enter password';
            }


            // Make sure errors are empty
            if (empty($data['email_err']) && empty($data['password_err'])) {
                // Validated
                //check and set logged in user
                $loggedInAdmin = $this->adminModel->login($data['email'], $data['password']);

                if ($loggedInAdmin) {
                    $this->createAdminSession($loggedInAdmin);
                } else {
                    $data['password_err'] = 'Incorrect password';

                    $this->view('admins/login', $data);
                }


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

    public function createAdminSession($admin)
    {
        $_SESSION['user_id'] = $admin->AdminID;
        $_SESSION['admin_email'] = $admin->Email;

        $this->view('Pages/gallery');

    }

    public function logout()
    {
        $data = [
            'email' => '',
            'password' => '',
            'email_err' => '',
            'password_err' => '',
        ];

        unset($_SESSION['user_id']);
        unset($_SESSION['admin_email']);
        session_destroy();
        $this->view('admins/login', $data);
    }

    public function addProduct(){

        $categories = $this->adminModel->getCategories();
        $data = [
            'category' => $categories
        ];

        $this->view('admins/addProduct', $data);

    }

    public function insertProduct(){
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
            $n=$_POST['productName'];
            $disc=$_POST['productDiscription'];
            $img=$_FILES["productImage"]["name"];
            $tmp=$_FILES["productImage"]["tmp_name"];
            $folder = "./images/" . $img;
            $price=$_POST['productPrice'];
            $q=$_POST['productQuantity'];
            $idc=$_POST['IDC'];
            move_uploaded_file($tmp, $folder);

        $insert = $this->adminModel->addProduct($n, $disc, $q, $price, $idc, $img);
            if($insert==true){
                
                header("location:".URLROOT.'/admins/products'."");
                exit();
            }
        }
    }

    public function products($idc)
    {
        $categories = $this->adminModel->getCategories();

        if($idc == '1'){
            $products = $this->adminModel->showProducts();
        } else{
            $products = $this->adminModel->filter($idc);
        }
        
        $data = [
            'products' => $products,
            'category' => $categories,
            'idc' => $idc
        ];

        $this->view('Admins/products', $data);

    }

    public function categories()
    {
        $data = [
            'title' => 'Dhayby | categories'
        ];
        $this->view('admins/categories', $data);
    }

    public function filter($idc){
        $categories = $this->adminModel->filter($idc);
        $data = [
            'categories' => $categories
        ];

        $this->view('admins/products', $data);
    }
}
    ?>