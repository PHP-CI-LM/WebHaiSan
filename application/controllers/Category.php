<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index($type) {
        $this->load->model("Product_Model");
        switch ($type) {
            case 1: case 3: case 5: case 4:
                $result = $this->Product_Model->getProductOfCategory($type);
                // var_dump($result);
                $this->load->view("ViewFilterCat", ["products" => $result]);
                break;
            default:
                redirect('home');
                
        }
    }

}