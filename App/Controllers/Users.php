<?php
    class Users{
        public function __construct(){

        }

        public function login(){
            //Check for post
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                // process form
            } else {
                // initiate data
            $data = [
                'email' => '',
                'password' => '',
                'email_err' => '',
                'password_err' => '',
            ];

            // Load view
            $this->views('users/login', $data);
            }
        }
    }


?>