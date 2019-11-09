<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index($name) {
        $idCategory = substr($name, strlen($name) - 5, 5);
        $this->load->model("Product_Model");
        $result = $this->Product_Model->getProductOfCategory("type".$idCategory);
        // var_dump($result);
        $this->load->view("ViewFilterCat", ["products" => $result]);
    }

}