<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_Model extends CI_Model {

    public function createNewAccount($AccountID, $customername, $sex, $phone, $address) {
        $this->db->query("
            CALL sp_addCustomer('". $AccountID ."', '". $customername ."', 
                '". $sex ."', '". $phone ."', '". $address ."');
        ");
    }
}