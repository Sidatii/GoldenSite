<?php

class Admin{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }


    public function login($email, $password){
        $this->db->query('SELECT * FROM admins WHERE email = :email');
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        $entered_pass = $row->Password;
        if($password == $entered_pass){
            return $row;
        } else{
            return false;
        }
    }
    public function findAdminByEmail($email){

        $this->db->query('SELECT * FROM admins WHERE Email = :Email');

        $this->db->bind(':Email', $email);

        $row = $this->db->single();

        // Check row
        if($this->db->rowCount() > 0){
            return true;
        } else{
            return false;
        }
    }

    public function showProducts(){
        $this->db->query('SELECT * 
                        FROM Products
                        ');

        $results = $this->db->resultSet();

        return $results;
    }
}
?>