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

    public function updateOrderDetail($idOrder = null, $data = array())
    {
        if ($idOrder == null || $data == null || sizeof($data) == 0) return false;
        else {
            foreach ($data as $product) {
                $this->db->set('ProductID', $product['id_product']);
                $this->db->set('Price', $product['price']);
                $this->db->set('Amount', $product['amount']);
                $this->db->where('OrderID', $idOrder);
                $this->db->update('orders_detail');
            }
            return true;
        }
    }

    public function deleteOrderDetail($orderID)
    {
        $this->db->delete('orders_detail', array('OrderID' => $orderID));
        return $this->db->affected_rows();
    }
    public function get_order_detail($order_id='',$product_id=''){
       
        if(!empty($order_id)){
            $this->db->where('orders.OrderID', $order_id);
        }   
        if(!empty($product_id)){
            $this->db->where('ProductID', $product_id);
        }
        $this->db->from('orders_detail');
        $this->db->join('orders', 'orders.orderID = orders_detail.OrderID');
        $this->db->join('products', 'orders_detail.ProductID = products.id_product');
        $this->db->select('orders_detail.OrderID,orders.receiver,orders_detail.Price,orders_detail.Amount,products.name_product');
        $query = $this->db->get();
        return $query->result_array();
    }
}
