<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index($uri_product) {
        $this->load->model('Product_Model');
        $id_product = (int)substr($uri_product, strlen($uri_product) - 5, 5);
        $product = (array)($this->Product_Model->getProductOfId($id_product));
        $similarProducts = $this->Product_Model->getSimilarProductWithoutId($id_product, 5);
        // var_dump($similarProducts);
        $this->load->view("Product", [
            "product" => $product,
            "similarProducts" => $similarProducts
        ]);
    }
}