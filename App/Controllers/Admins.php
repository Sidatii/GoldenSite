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
        if(isset($_SESSION['user_id'])){
            redirect('admins/products/1');
          }
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
        redirect('admins/products/1');
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
        $this->view('pages/index', $data);
    }

    public function addProduct(){

        $categories = $this->adminModel->getCategories();
        $data = [
            'category' => $categories
        ];

        $this->view('admins/addProduct', $data);
    }

    public function addCategory(){

        $data = [
            
        ];

        $this->view('admins/addCategory', $data);
    }

    public function insertProduct(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST);
            $data = $_POST;
            $data['img'] = $_FILES["productImage"]["name"];

            if ($this->adminModel->addProduct($data)) {
                move_uploaded_file($_FILES["productImage"]["tmp_name"], "./images/" . $data['img']);
                flash('prd_added', 'Your product has been added successfully');
                header("location:" . URLROOT . '/admins/products/1');
                exit();
            }
        }         
    }

    public function insertCategory(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $_POST = filter_input_array(INPUT_POST);
            $data = $_POST;

            if ($this->adminModel->addCategory($data['CatName'])) {
                flash('cat_added', 'Your category has been added successfully');
                header("location:" . URLROOT . '/admins/categories');
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
        ];

        $this->view('Admins/products', $data);

    }
    public function filter($idc){
        $categories = $this->adminModel->filter($idc);
        $data = [
            'categories' => $categories
        ];

        $this->view('admins/products', $data);
    }

    public function deleteProduct($id){
        if($this->adminModel->delete($id)){
            flash('product_deleted', 'Your product has been deleted successfully.');
            $this->products(1);
        }

    }

    public function deleteCategory($id){
        if($this->adminModel->deleteCategory($id)){
            flash('cat_deleted', 'Your category has been deleted successfully.');
            header("location:" . URLROOT . '/admins/categories');
        }
    }

    public function updateProductPage($id){
        $categories = $this->adminModel->getCategories();
        $productInfos = $this->adminModel->showProductInfos($id);
 
        $data = [
            'categories' => $categories,
            'prdinfo' => $productInfos,
            'id' => $id
        ];
        
        $this->view('admins/updateProduct', $data);

    }

    public function updateCategoryPage($idc){
        $categories = $this->adminModel->getCategory($idc);
 
        $data = [
            'categories' => $categories,
            'idc' => $idc
        ];
        
        $this->view('admins/updateCategory', $data);

    }



    public function updateProduct($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // here we process the form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST);
            $data = $_POST;
            $data['id'] = $id; 
            $data['img'] = $_FILES["productImage"]["name"];  
            

            if($this->adminModel->update($data['productName'], $data['productDiscription'], $data['productQuantity'], $data['productPrice'], $data['IDC'], $data['img'], $data['id'])){
                flash('prd_updated', 'Your product has been updated successfully.');
                $this->products(1);
            }
        }
    }

    public function updateCategory($idc)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // here we process the form
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST);
            $data = $_POST;
            $data['idc'] = $idc;
            

            if($this->adminModel->updateCategory($data['CatName'], $idc)){
                flash('cat_updated', 'Your category has been updated successfully.');
                redirect('admins/categories');
            }
        }
    }

    public function categories(){

        $res = $this->adminModel->getCategories();
        $data = [
            'categories' => $res
        ];
        $this->view('admins/categories', $data);
    }

}
?>