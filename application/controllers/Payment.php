<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Payment extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if (get_cookie("countProduct") != null) {
            //Get info of list product in cookie
            $count = get_cookie("countProduct");
            $cookieName = "product";
            $products = array();
            $data = array();
            $this->load->model('Product_Model');
            for ($i = 1; $count > 0; $i++) {
                $product = get_cookie($cookieName . $i);
                if ($product !== null) {
                    $id = explode(":", explode("-", get_cookie($cookieName . $i))[0])[1];
                    $slg =  explode(":", explode("-", get_cookie($cookieName . $i))[1])[1];
                    $product = (array) $this->Product_Model->getProductOfId($id, 1);
                    if ($product != null) {
                        $product["cookie_name"] = $cookieName . $i;
                        $product["count"] = $slg;
                        array_push($products, $product);
                    }
                    $count--;
                }
            }
            //Get info of customer
            if ($this->session->tempdata('user') != null) {
                $id_customer = $this->session->tempdata('user');
                $this->load->model('Customer_Model');
                $data = (array) $this->Customer_Model->getInfoCustomer($id_customer);
            }
            $this->load->view('Payment', [
                "products" => $products,
                "info" => $data,
            ]);
        } else $this->load->view('Payment');
    }

    public function confirm()
    {
        $status = false;
        if ($this->input->post("data") !== null) {
            $data = (array)json_decode($this->input->post("data"));
            if (
                isset($data["name"]) && isset($data["phone"]) && isset($data["address"]) &&
                isset($data["ward"]) && isset($data["district"]) && isset($data["province"]) &&
                isset($data["shipper"]) && isset($data["price"])
            ) {
                $data = $this->cleanInput($data);
                $this->load->model('Order_Model');
                $this->load->model('Order_Detail_Model');
                $this->load->model("Product_Model");
                //Check if user is login then add user id to data array
                if ($this->session->tempdata("user") !== null) {
                    $data["AccountID"] = $this->session->tempdata("user");
                }
                //Get current date then add them to data array
                $data["OrderDate"] = date("d/m/Y");
                //Save order information from data array to database
                $id = $this->Order_Model->saveOrder($data);
                // Check result of transaction, if success then continue else break
                if ($id == false) {
                    $status = false;
                } else {
                    //Get order detail from cookie
                    $products = $this->getProducts();
                    //Add price of product into product array and update count_buy of product in database
                    foreach ($products as $key => $product) {
                        $price = $this->Product_Model->getPrice($product["id"]);
                        $discount = $this->Product_Model->getDiscount($product["id"]);
                        $products[$key]["price"] = (int) (($price * (100 - $discount)) / 100);
                        //Update count_buy in table products of database
                        $this->Product_Model->updateCountBuy($product["id"], $product["amount"]);
                    }
                    //Save detail of order to database
                    $id = $this->Order_Detail_Model->saveOrderDetail($id, $products);
                    //Check if the transaction is error or none, then notify result
                    if ($id == false) {
                        $status = false;
                    }
                    else {
                        $status = true;
                    }
                }
            } else {
                $status = false;
            }
        }
        //Set content type in header and echo result
        header("Content-Type: Application/Json");
        echo json_encode(array("status" => $status));
    }

    private function cleanInput($array)
    {
        $result = array();
        foreach ($array as $key => $value) {
            $tempValue = $this->security->xss_clean($value);
            $result[$key] = $tempValue;
        }
        return $result;
    }

    private function getProducts()
    {
        $count = get_cookie("countProduct");
        $cookieName = "product";
        $products = array();
        for ($i = 1; $count > 0; $i++) {
            $product = get_cookie($cookieName . $i);
            if ($product !== null) {
                $product = array();
                $product["id"] = explode(":", explode("-", get_cookie($cookieName . $i))[0])[1];
                $product["amount"] =  explode(":", explode("-", get_cookie($cookieName . $i))[1])[1];
                array_push($products, $product);
                $count--;
            }
        }
        if (sizeof($products) == 0) return null;
        return $products;
    }
}
