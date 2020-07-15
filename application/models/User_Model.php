<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User_Model extends CI_Model
{
    public function GetAllUser()
    {
        $this->db->select("CustomerID, CustomerName, Email, Case Sex When '0' Then 'Nam' Else 'Nữ' End As Sex, Phone, Address");
        $this->db->from('accounts');
        $this->db->join('customers', 'accounts.AccountID = customers.CustomerID');
        $query = $this->db->get();

        return $query->result_array();
    }
}
