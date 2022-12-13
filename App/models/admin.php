<?php

class Admin{
    private $db;

    public function __construct(){
        $this->db = new Database;
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
}
?>