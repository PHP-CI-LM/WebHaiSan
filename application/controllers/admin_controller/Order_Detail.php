<?php
defined('BASEPATH') or exit('No direct script access allowed');

class order_detail extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        if ($this->session->tempdata('admin') == null) {
            redirect(base_url() . 'ci-admin/login.html', 'auto');
        } else {
            $this->load->model('Order_Detail_Model');
            $this->load->model('Product_Model');
            $products = $this->Product_Model->getAllProducts(-1, 0, ['id_product', 'name_product']);
            $result = $this->Order_Detail_Model->get_order_detail();
            $this->load->view('admin/order_detail', ['data' => $result, 'products'  => $products]);
        }
    }

    public function filter_order_detail()
    {
       if ($this->session->tempdata('admin') != null) {
            $order_id = $this->input->post_get('order_id');
            $product_id = $this->input->post_get('product_id');
            $this->load->model('Order_Detail_Model');
            $this->load->model('Product_Model');
            $data=[];
            $data['data']  = $this->Order_Detail_Model->get_order_detail($order_id,$product_id);
            $data['arguments'] = [
                'id_order' => $order_id,
                'id_product' => $product_id
            ];
            $data['products'] = $this->Product_Model->getAllProducts(-1, 0, ['id_product', 'name_product']);
            $this->load->view('admin/order_detail', $data);
        }
    }
}
