<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_Model extends CI_Model {

    public function createNewAccount($AccountID, $customername, $sex, $phone, $address)
    {
        // Updating...
    }

    public function updateCustomer($customerID, $customername, $sex, $phone, $address)
    {
        $this->db->set('CustomerName', $customername);
        $this->db->set('Sex', $sex);
        $this->db->set('Phone', $phone);
        $this->db->set('Address', $address);
        $this->db->where('CustomerID', $customerID);
        $this->db->update('customers');
        return 0 < $this->db->affected_rows();
    }

    public function updateCustomerAvatar($customerID, $url)
    {
        $this->db->set('Avatar', $url);
        $this->db->where('CustomerID', $customerID);
        $this->db->update('customers');
        return 0 < $this->db->affected_rows();
    }

    public function getCustomer($accountID) {
        $query = $this->db->query(
            "SELECT CustomerID, CustomerName, Sex, Phone, Address, Avatar FROM customers WHERE CustomerID = " . $accountID . ";"
        );
        return $query->result_array();
    }

    public function getInfoCustomer($id_customer) {
        $result = $this->db->query("
            SELECT CustomerID, CustomerName, Sex, Phone, Address, Avatar 
            FROM customers WHERE CustomerID = ". $id_customer
        );
        return $result->row();
    }
}