<?php

class Admin{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function findAdminByEmail($email){
        $this->db->query('SELECT * from admins where email = :email');
        $this->db->bind(':email', $email);

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