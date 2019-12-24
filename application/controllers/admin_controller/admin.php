<?php
class Admin extends CI_Controller
{

    public function index()
    {
        if ($this->session->tempdata('admin') == null) {
            $this->load->view('admin/login');
        } else {
            redirect(base_url() . 'admin/product.html', 'auto');
        }
    }

    public function login()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|max_length[20]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_message('required', 'Trường {field} không được để trống');
        $this->form_validation->set_message('max_length', 'Trường {field} không được quá {param} ký tự');
        if ($this->form_validation->run() == false) {
            $this->load->view('admin/login');
        } else {
            $username = $this->input->post("username");
            $password = md5($this->input->post("password"));
            $this->load->model("Account_Model");
            $user = $this->Account_Model->loginAdmin($username, $password);
            if ($user != false) {
                $this->session->set_tempdata("admin", $user, 3600);
                redirect(base_url() . 'admin/product.html', 'auto');
            }
            $this->load->view('admin/login');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url().'admin/login.html', "auto");
    }
    // public function loadview()
    // {
    //     $this->load->helper('url');
    //     $this->load->view('admin\admin');
    // }
    // public function loadviewUser(){
    //     $this->load->view('admin\user');
    // }
    // public function loadviewCatalog()
    // {
    //     $this->load->view('admin\Catalog');

    // }
    // public function loadvieworder()
    // {
    //     $this->load->view('admin\order');
    // }
    // public function loadviewproduct()
    // {
    //     $this->load->view('admin\product');
    // }
    // public function loadviewform()
    // {
    //     $this->load->view('admin\formadd_product');
    // }
}
