<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cart extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        validateSession();
        if (get_cookie("countProduct") != null) {
            $count = get_cookie("countProduct");
            $cookieName = "product";
            $products = array();
            $this->load->model('Product_Model');
            for ($i = 1; $count > 0; $i++) {
                $product = get_cookie($cookieName . $i);
                if ($product !== null) {
                    $id = explode(":", explode("-", get_cookie($cookieName . $i))[0])[1];
                    $slg =  explode(":", explode("-", get_cookie($cookieName . $i))[1])[1];
                    $product = (array) $this->Product_Model->getProductOfId($id, 1);
                    if ($product != null) {
                        $product["cookie_name"] = $cookieName.$i;
                        $product["count"] = $slg;
                        array_push($products, $product);
                    }
                    $count--;
                }
            }
            // var_dump($products);
            $this->load->view('Cart', ["carts" => $products]);
        } else {
            $this->load->view('Cart');
        }
    }
}
