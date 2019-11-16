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

    public function createNewAccount($username, $password) {
        $this->db->trans_start();
        $this->db->query("
            CALL sp_addAccount(@id, '". $username ."', 
                '".  $password ."', 1);
            ");
        $result = $this->db->query("SELECT @id As AccountID");
        $this->db->trans_complete();
        $row = $result->row();
        return $row->AccountID;
    }
}