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
            $this->load->view('admin/order_detail');
        }
    }
    public function filter_order_detail(){
       if ($this->session->tempdata('admin') != null) {
            $order_id = $this->input->get('order_id');
            $product_id = $this->input->get('product_id');
            $this->load->model('Order_Detail_Model');
            $data=[];
            if(!((empty($order_id) && empty($product_id)))){
                $result = $this->Order_Detail_Model->get_order_detail($order_id,$product_id);
                $data['data']=$result;
               
            }
            $this->load->view('admin/order_detail',$data);
            
        }
    }
}
