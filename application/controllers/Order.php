<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if ($this->input->get("oid") !== null) {
            $oid = $this->security->xss_clean($this->input->get("oid"));
            //Split id and order date from order id
            $id = substr($oid, 8, strlen($oid) - 8);
            $date = substr($oid, 0, 2) . "/" . substr($oid, 2, 2) . "/" . substr($oid, 4, 4);
            //Load model to get data from database            
            $this->load->model("Order_Model");
            $this->load->model("Order_Detail_Model");
            $this->load->model("Product_Model");
            //Get info of id
            $order = $this->Order_Model->getOrder($id, $date);
            if (sizeof($order) > 0) {
                //Get list products of order if id is valid
                $details = $this->Order_Detail_Model->getDetailOrder($id);
                $products = array();
                foreach ($details as $item) {
                    $product = (array) $this->Product_Model->getProductOfId($item["id"], 1);
                    $product["price"] = $item["price"];
                    $product["count"] = $item["amount"];
                    array_push($products, $product);
                }
                $this->load->view("CheckOrder", [
                    "status" => true,
                    "oid" => $oid,
                    "products" => $products
                ]);
            } else {
                $this->load->view("CheckOrder", ["status" => false]);
            }
        } else $this->load->view("CheckOrder", ["status" => false]);
    }
}