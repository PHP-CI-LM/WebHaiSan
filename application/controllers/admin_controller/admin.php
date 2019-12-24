<?php
class Admin extends CI_Controller{
    public function loadview()
    {
        $this->load->helper('url');
        $this->load->view('admin\admin');
    }
    public function loadviewUser(){
        $this->load->view('admin\user');
    }
    public function loadviewCatalog()
    {
        $this->load->view('admin\Catalog');
        
    }
    public function loadvieworder()
    {
        $this->load->view('admin\order');
    }
    public function loadviewproduct()
    {
        $this->load->view('admin\product');
    }
    public function loadviewform()
    {
        $this->load->view('admin\formadd_product');
    }
}
