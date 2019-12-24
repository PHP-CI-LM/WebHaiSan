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

    public function getOrder($id, $orderDate) {
        $query = $this->db->query(
            "SELECT * FROM orders WHERE OrderID = ".$id." And OrderDate = '".$orderDate."';"
        );
        return $query->result_array();
    }

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