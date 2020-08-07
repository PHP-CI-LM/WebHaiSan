<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Catalog extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index($page_num, $name)
    {
        return false;
    }

    public function fastDeliveryProducts($page_num)
    {
        validateSession();
        $limit_per_page = 8;
        $start = 0;
        $this->load->model("Product_Model"); //Gọi lớp model để lấy dữ liệu

        $count = sizeof($this->Product_Model->getFastDeiveryProducts());
        // Paginate page
        $paging_links = generatePagingLinks($count, $limit_per_page);
        $data = $this->Product_Model->getFastDeiveryProducts($limit_per_page, $start);
        if ($page_num != -1) {
            $start = ($page_num - 1) * $limit_per_page;
        }
        
        $this->load->view("Catalog", [
            "name" => "Hàng giao liền trong ngày",
            "products" => $data,
            "paging_links"  => $paging_links
        ]);
    }

    public function hotProducts($page_num)
    {
        validateSession();
        $limit_per_page = 8;
        $start = 0;
        $this->load->model("Product_Model"); //Gọi lớp model để lấy dữ liệu

        $data = $this->Product_Model->getProductsSelling($limit_per_page, $start);
        $count = $this->Product_Model->getTotal();
        // Paginate page
        $paging_links = generatePagingLinks($count, $limit_per_page);
        if ($page_num != -1) {
            $start = ($page_num - 1) * $limit_per_page;
        }
        
        $this->load->view("Catalog", [
            "name" => "Hàng bán chạy",
            "products" => $data,
            "paging_links"  => $paging_links
        ]);
    }
}
