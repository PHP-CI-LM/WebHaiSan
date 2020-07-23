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
        if ($this->session->tempdata('admin') == null) {
            redirect(base_url().'ci-admin/login.html', 'auto');
        } else {
            $this->load->model('Order_Model');
            $this->load->model('Customer_Model');
            $this->load->model('Order_Stage_Model');
            $orders = $this->Order_Model->getAllOrder();
            for ($i = 0; $i < sizeof($orders); $i++) {
                $stage = $this->Order_Stage_Model->getStage($orders[$i]['Status']);
                if (false != $stage) {
                    $orders[$i]['statusCode'] = $stage[0]['id'];
                    $orders[$i]['Status'] = $stage[0]['name'];
                }
                if (null != $orders[$i]['AccountID']) {
                    $customer = $this->Customer_Model->getCustomer($orders[$i]['AccountID']);
                    if (false != $customer) {
                        $orders[$i]['Customer'] = $customer[0]['CustomerName'];
                    }
                    $orders[$i]['DiaChi'] = $orders[$i]['Ward'].', '.$orders[$i]['District'].', '.$orders[$i]['Province'];
                }
            }
            $this->load->view('admin/order', ['data' => $orders]);
        }
    }
}
