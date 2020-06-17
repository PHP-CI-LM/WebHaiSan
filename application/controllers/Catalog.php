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
            $this->load->library('pagination');
            $limit_per_page = 8;
            $uri = explode('/', current_url());
            $suffix = '/' . $uri[sizeof($uri) - 1];
            $config = $this->generateConfigPagination($count, $limit_per_page, '', $suffix);
            $this->pagination->initialize($config);
            $paging_links = $this->pagination->create_links();
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

    /**
     * Generate configration for paginate method of products page
     * 
     * @param int $total_rows
     * @param int $limit_per_page
     * 
     * @return array
     */
    private function generateConfigPagination($total_rows, $limit_per_page = 10, $prefix, $suffix)
    {
        $config['total_rows'] = $total_rows;
        $config['base_url'] = base_url('catalog');
        $config['per_page'] = $limit_per_page;
        $config['uri_segment'] = 2;
        $config['use_page_numbers'] = TRUE;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';
        $config['num_links'] = 5;
        $config['prefix'] = $prefix;
        $config['suffix'] = $suffix;
        $config['use_page_numbers'] = true;
        $config['full_tag_open'] = '<div class="pagination">';
        $config['full_tag_close'] = '</div>';
        $config['cur_tag_open'] = '<a href="javascript:void(0)" class="active_link">';
        $config['cur_tag_close'] = '</a>';
        $config['next_tag_open'] = '<span class="next_link">';
        $config['next_tag_close'] = '</span>';
        $config['prev_tag_open'] = '<span class="prev_link">';
        $config['prev_tag_close'] = '</span>';
        $config['last_tag_open'] = '<span class="last_link">';
        $config['last_tag_close'] = '</span>';
        $config['attributes'] = [
            'class'     => 'page_link'
        ];
        return $config;
    }
}
