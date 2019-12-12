<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order_Detail_Model extends CI_Model
{

    public function getDetailOrder($id) {
        $query = $this->db->query(
            "SELECT ProductID as id, Price as price, Amount as amount FROM orders_detail WHERE OrderID = ".$id.";"
        );
        return $query->result_array();
    }

    public function saveOrderDetail($idOrder = null, $data = array())
    {
        if ($idOrder == null || $data == null || sizeof($data) == 0) return false;
        else {
            $this->db->trans_start();
            foreach ($data as $product) {
                $this->db->query(
                    "INSERT INTO orders_detail(OrderID, ProductID, Price, Amount) " .
                    "VALUES(" . $idOrder . ", " . $product["id"] . ", " . $product["price"] . ", " . $product["amount"] . ");"
                );
            }
            $this->db->trans_complete();
            return $idOrder;
        }
    }
}
