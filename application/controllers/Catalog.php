<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Catalog extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index($name) {
        $idFilterType = substr($name, strlen($name) - 5, 5); //Tách id của kiểu fillter từ chuỗi
        $data = null; //Dữ liệu gửi về view
        $this->load->model("Product_Model"); //Gọi lớp model để lấy dữ liệu
        if ($idFilterType === "00001") {
            $data = $this->Product_Model->getProductsNew();
            $this->load->view("Catalog", ["name" => "Hàng mới về", "products" => $data]);
        }
        else if ($idFilterType === "00002") {
            $data = $this->Product_Model->getProductsSelling();
            $this->load->view("Catalog", ["name" => "Hàng bán chạy", "products" => $data]);
        }
        else { 
            $this->load->model("errors/html/error_404");
        }
    }

    public function detail($name) {
        echo $name;
    }
}