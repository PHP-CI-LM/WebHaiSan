<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account_Model extends CI_Model {

    public function userLogin($username, $password) {
        $this->db->where('UserName', $username);
        $this->db->where('Password', $password);
        $this->db->where('id_permission', 2);
        $this->db->select('AccountID');
        $query = $this->db->get('accounts');
        return $query->result_array();
    }

    public function loginAdmin($username, $password) {
        $query = "SELECT UserName FROM accounts WHERE UserName = '" . $username . "' && password = '" . $password . "' && id_permission = 1;";
        $result = $this->db->query($query);
        if (sizeof($result->result_array()) === 0) return false;
        return $result->result_array()[0]["UserName"]; 
    }

    public function getAccount($accountID, $havePass = false) {
        $this->db->where('AccountID', $accountID);
        $this->db->select('UserName');
        $this->db->select('Email');
        if (true == $havePass) {
            $this->db->select('Password');
        }
        $query = $this->db->get('accounts');
        return $query->result_array();
    }

    public function updateAccount($id, $username, $email, $password)
    {
        $this->db->set('UserName', "'". $username ."'", false);
        $this->db->set('Email', "'". $email ."'", false);
        $this->db->set('Password', "'". $password ."'", false);
        $this->db->where('AccountID', $id);
        $this->db->update('accounts');
        return $this->db->affected_rows();
    }

    public function createNewAccount($username, $email, $password, $id_permission = 2) {
        $this->db->trans_start();
        $this->db->query(
            "INSERT INTO accounts(UserName, Email, Password, id_permission) VALUES('" . $username . "', '" . $email . "', '" . $password . "', $id_permission);"
        );
        $result = $this->db->query(
            "SELECT AccountID FROM accounts WHERE UserName = '" . $username ."';"
        );
        $this->db->trans_complete();
        $row = $result->row();
        return $row->AccountID;
    }
}