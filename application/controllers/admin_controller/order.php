<?php
defined('BASEPATH') or exit('No direct script access allowed');

class order extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $this->load->model('Order_Model');
        $data = $this->Order_Model->getAllOrder();
        $this->load->view('admin\order',['data'=>$data]);
        // var_dump($data);

    }
    
}