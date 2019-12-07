<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_Model extends CI_Model {

    public function saveOrder($data = array()) {
        if ($data == null || sizeof($data) == 0) return false;
        else {
            $this->db->trans_start();
            $queryString = "Insert Into orders(Ward, District, Province, Price, Status, OrderDate, AccountID, Note) " .
                            "Values('" . $data["ward"] . "', '" . $data["district"] . "', '" . $data["province"] . "', " . 
                            $data["price"] . ", 1, '" . $data["OrderDate"] . "'";
            if (isset($data["AccountID"]) == true) {
                $queryString .= ", " . $data["AccountID"];
            }
            else {
                $queryString .= ", null";
            }
            if (isset($data["note"]) == true) {
                $queryString .= ", '" . $data["note"] . "'";
            } 
            else {
                $queryString .= ", null";
            }
            $queryString .= ");";
            $this->db->query($queryString);
            $result = $this->db->query(
                "Select OrderID As id From orders Order By OrderID DESC LIMIT 1;"
            );
            $this->db->trans_complete();
            return $result->row()->id;
        }
    }
}