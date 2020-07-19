<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_Model extends CI_Model {


    public function getAllOrder()
    {
        $str = "select orders.OrderID,products.name_product,products.image_link,concat(Ward,', ',District,', ',Province) as DiaChi,OrderDate,orders_detail.Price,".
        "Case orders.Status When '1' Then 'Đang xử lý' Else 'Đã giao hàng' End As Status".
        ", Amount from orders join orders_detail join products
        where orders.OrderID=orders_detail.OrderID and products.id_product=orders_detail.ProductID";
        $query = $this->db->query($str);
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
}