<?php

class Pages extends Controller
{
    private $adminModel;
    public function __construct()
    {
        $this->adminModel = $this->model('Admin');
    }

    public function index()
    {
        $data = [
            'title' => 'Dhayby | Home'
        ];
        $this->view('pages/index', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'Dhayby | About us'
        ];
        $this->view('pages/about', $data);
    }

    public function contact()
    {
        $data = [
            'title' => 'Dhayby | Contact us'
        ];
        $this->view('pages/contact', $data);
    }

    public function gallery($idc)
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
        $this->view('pages/gallery', $data);
    }


}


?>