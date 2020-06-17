<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index($type, $page_num)
    {
        $this->load->model("Product_Model");
        switch ($type) {
            case 1:
            case 3:
            case 7:
            case 4:
            case 8:
                $count = $this->Product_Model->getTotal($type);
                // Paginate page
                $limit_per_page = 8;
                $paging_links = generatePagingLinks($count, $limit_per_page, false);
                $start = 0;
                if ($page_num != -1) {
                    $start = ($page_num - 1) * $limit_per_page;
                }
                $result = $this->Product_Model->getProductOfCategory($type, $limit_per_page, $start);
                $this->load->view("Category", [
                    "products"          => $result,
                    "paging_links"   => $paging_links
                ]);
                break;
            default:
                redirect('home');
        }
    }
}
