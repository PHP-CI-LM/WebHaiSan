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
        $this->load->model('User_Model');
        $data = $this->User_Model->getAllUser();
        $this->load->view('admin\user',['data'=>$data]);
        //var_dump($data);

    }
}