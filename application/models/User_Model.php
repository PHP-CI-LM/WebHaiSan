<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Model extends CI_Model {

    public function GetAllUser() {
        $str ="select CustomerID,CustomerName,Case Sex When '1' Then 'Nam' Else 'Nữ' End As Sex,Phone,Address from customers";
        $query=$this->db->query($str);
        return $query->result_array();
    }
}