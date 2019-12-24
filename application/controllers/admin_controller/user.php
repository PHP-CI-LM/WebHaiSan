<?php
defined('BASEPATH') or exit('No direct script access allowed');

class user extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        if ($this->session->tempdata('admin') == null) {
            redirect(base_url().'admin/login.html', 'auto');
        } else {
            $this->load->model('User_Model');
            $data = $this->User_Model->getAllUser();
            $this->load->view('admin\user', ['data' => $data]);
            //var_dump($data);
        }
    }
}
