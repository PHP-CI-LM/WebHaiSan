<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_Model extends CI_Model {


    public function getAllOrder()
    {
        $query = $this->db->get('orders');
        return $query->result_array();
    }

    public function getOrder($id, $orderDate)
    {
        $this->db->where('OrderID', $id);
        $this->db->where('OrderDate', $orderDate);
        $query = $this->db->get('orders');
        return $query->result_array();
    }

    public function getOrdersOfUser($id)
    {
        $this->db->where('AccountID', $id);
        $result = $this->db->get('orders');
        return $result->result_array();
    }

    public function saveOrder($data = array())
    {
        if ($data == null || sizeof($data) == 0) return false;
        else {
            $this->db->trans_start();
            $queryString = "Insert Into orders(Receiver, Ward, District, Province, Price, Status, OrderDate, AccountID, Note) " .
                            "Values('". $data['name'] . "', '" . $data["ward"] . "', '" . $data["district"] . "', '" . $data["province"] . "', " . 
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
    public function updateOrder($orderID, $data = array())
    {
        if ($data == null || sizeof($data) == 0) return false;
        else {
            $this->db->set('Ward', $data['ward']);
            $this->db->set('District', $data['district']);
            $this->db->set('Province', $data['province']);
            $this->db->set('Price', $data['price']);
            $this->db->set('Status', 1);
            $this->db->set('Note', $data['note']);
            $this->db->where('OrderID', $orderID);
            $this->db->where('AccountID', $data['AccountID']);
            $this->db->update('orders');
            return true;
        }
    }
    public function isCancel($orderID)
    {
        $this->db->where('OrderID', $orderID);
        $this->db->where('Status', '1');
        $this->db->from('orders');
        return ($this->db->count_all_results() == 1);
    }
    public function cancelOrder($orderID)
    {
        $this->db->set('Status', 4);
        $this->db->where('OrderID', $orderID);
        $this->db->update('orders');
        return $this->db->affected_rows();
    }
    public function state_transitions($id_order,$state_new){
        $this->db->set('Status', $state_new);
        $this->db->where('OrderID', $id_order);
        $this->db->update('orders');
        return $this->db->affected_rows();
    }
    public function filter_order($id_order,$from_date,$to_date,$stage)
    {
        
        if(!empty($id_order)){
            $this->db->where('OrderID', $id_order);
        }
        if(!empty($from_date)){
            $this->db->where('OrderDate >=', $from_date);
        }
        if(!empty($to_date)){
            $this->db->where('OrderDate <=', $to_date);
        }
        if(!empty($stage)){
            $this->db->where('Status', $stage);
        }
        $query = $this->db->get('orders');
        return $query->result_array();
    }
}