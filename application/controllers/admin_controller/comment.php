<?php
defined('BASEPATH') or exit('No direct script access allowed');

class comment extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if ($this->session->tempdata('admin') == null) {
            redirect(base_url() . 'admin/login.html', 'auto');
        } else {
            $this->load->view('admin/comment');
        }
    }
}