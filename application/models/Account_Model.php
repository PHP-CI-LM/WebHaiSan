<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account_Model extends CI_Model {

    public function login($username, $password) {
        $query = $this->db->query("
            SELECT fc_login('". $username . "', '" . $password . "') As id;
        ");
        $result = $query->row();
        return $result->id;
    }

    public function loginAdmin($username, $password) {
        $query = "SELECT UserName FROM accounts WHERE UserName = '" . $username . "' && password = '" . $password . "' && id_permission = 1;";
        $result = $this->db->query($query);
        if (sizeof($result->result_array()) === 0) return false;
        return $result->result_array()[0]["UserName"]; 
    }

    public function getAccount($accountID) {
        $query = $this->db->query(
            "SELECT UserName, avatar FROM accounts WHERE AccountID=" . $accountID . ";"
        );
        return $query->result_array();
    }

    public function createNewAccount($username, $password) {
        $this->db->trans_start();
        $this->db->query(
            "CALL sp_addAccount(@id, '". $username ."', '".  $password ."', 2);"
        );
        $result = $this->db->query("SELECT @id As AccountID");
        $this->db->trans_complete();
        $row = $result->row();
        return $row->AccountID;
    }
}