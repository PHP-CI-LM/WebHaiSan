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
            $oid = $this->input->get("oid");
            if (is_numeric($oid) && strlen($oid) > 8) {
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
                        $product["stage"] = $order[0]["Status"];
                        array_push($products, $product);
                    }
                    $this->load->view("CheckOrder", [
                        "status" => true,
                        "stage" => "CheckOrder",
                        "oid" => $oid,
                        "products" => $products
                    ]);
                } else {
                    $this->load->view("CheckOrder", [
                        "status" => false,
                        "stage" => "CheckOrder",
                        "oid" => $oid
                    ]);
                }
            } else $this->load->view("CheckOrder", [
                "status" => false,
                "stage" => "CheckOrder",
                "oid" => $oid
            ]);
        } else $this->load->view("CheckOrder", [
            "status" => false,
            "stage" => "CheckOrder",
            "oid" => null
        ]);
    }

    public function history()
    {
        // Check user login
        if ($this->session->tempdata('user') == null) {
            redirect(base_url(), 'auto');
        } else {
            $accountID = $this->session->tempdata('user');
            $this->load->model('Order_Model');
            $orders = $this->Order_Model->getOrdersOfUser($accountID);
            $this->load->view("History", [
                'orders'    => $orders
            ]);
        }
    }
}
