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
        $this->db->query('SELECT p.ID, p.ProductName, p.Discription, p.Quantity, p.Price, p.img, c.CatName FROM produits p INNER JOIN category c ON p.IDC=c.IDC');

        // $this->db->bind(':id', $id);

        $results = $this->db->resultSet();

        return $results;
    }

    public function filter($idc){
        $this->db->query('SELECT * FROM produits WHERE IDC=:idc');

        $this->db->bind(':idc', $idc);

        $results = $this->db->resultSet();

        return $results;
    }

    public function getCategories() {
        $this->db->query('SELECT * FROM category');
        $results = $this->db->resultSet();
        return $results;
    }

    public function addProduct(array $product){
        extract($product);
        $this->db->query('INSERT INTO `produits` (`ProductName`, `Discription`, `Quantity`, `Price`, `IDC`, `img`) VALUES (:n, :disc, :q, :price, :idc, :img)');

        $this->db->bind(':n', $productName);
        $this->db->bind(':disc', $productDiscription);
        $this->db->bind(':q', $productQuantity);
        $this->db->bind(':price', $productPrice);
        $this->db->bind(':idc', $IDC);
        $this->db->bind(':img', $img);

        $this->db->execute();
        return true;
    }

    public function delete($id){
        $this->db->query("DELETE FROM produits WHERE `produits`.`ID` = $id");

        if($this->db->execute()){
            return true;
        }else{
            flash('product_deleted', 'Your product has been deleted');
        }
    }

    public function showProductInfos($id){
        $this->db->query('SELECT * FROM `produits` WHERE ID=:id');
        $this->db->bind(':id', $id);
        $result = $this->db->resultSet();
        return $result;
    }

    public function update($name, $disc, $qty, $price, $idc, $img, $id){
        $this->db->query('UPDATE `produits` SET `ProductName`= :name ,`Discription`= :disc,`Quantity`=:qty,`Price`=:price,`IDC`=:idc,`img`=:img WHERE `ID`=:id');

        $this->db->bind(':name', $name);
        $this->db->bind(':disc', $disc);
        $this->db->bind(':qty', $qty);
        $this->db->bind(':price', $price);
        $this->db->bind(':idc', $idc);
        $this->db->bind(':img', $img);
        $this->db->bind(':id', $id);

        $this->db->execute();
        return true;


    }

}
?>