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
        $idFilterType = substr($name, strlen($name) - 5, 5); //Tách id của kiểu fillter từ chuỗi
        $data = null; //Dữ liệu gửi về view
        $this->load->model("Product_Model"); //Gọi lớp model để lấy dữ liệu

        if ($idFilterType === "00002") {
            $count = $this->Product_Model->getTotal();
            // Paginate page
            $limit_per_page = 8;
            $paging_links = generatePagingLinks($count, $limit_per_page);
            $start = 0;
            if ($page_num != -1) {
                $start = ($page_num - 1) * $limit_per_page;
            }
            $data = $this->Product_Model->getProductsSelling($limit_per_page, $start);
            $this->load->view("Catalog", [
                "name" => "Hàng bán chạy",
                "products" => $data,
                "paging_links"  => $paging_links
            ]);
        } else {
            $this->load->model("errors/html/error_404");
        }
    }
}
