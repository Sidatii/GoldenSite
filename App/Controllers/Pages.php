<?php

class Pages extends Controller
{
    public function __construct()
    {
        
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

    public function gallery()
    {
        $data = [
            'title' => 'Dhayby | gallery'
        ];
        $this->view('pages/gallery', $data);
    }


}


?>