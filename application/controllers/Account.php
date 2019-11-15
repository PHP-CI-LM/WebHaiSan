<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function login() {
        $this->load->view('Login');
    }

    public function signup() {
        $this->form_validation->set_rules('username', 'Username', 'required|max_length[20]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('customername', 'CustomerName', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required|max_length[12]');
        $this->form_validation->set_rules('confirm', 'ConfirmPassword', 'required');
        $this->form_validation->set_message('required', 'Trường {field} không được để trống');
        $this->form_validation->set_message('max_length', 'Trường {field} không được quá {param} ký tự');
        if ($this->input->post('username') === null) {
            $this->load->view('Signup');
        }
        else if ($this->form_validation->run() === false){
            $this->load->view('Signup');
        }
        else {
            $newPassword = str_replace("=", "_", $this->encryption->encrypt($this->input->post('password')));
            $this->load->model('Account_Model');
            $this->load->model('Customer_Model');
            $AccountID = $this->Account_Model->createNewAccount(
                $this->input->post('username'),
                $newPassword
            );
            $this->Customer_Model->createNewAccount(
                $AccountID,
                $this->input->post('customername'),
                $this->input->post('sex'),
                $this->input->post('phone'),
                $this->input->post('address')
            );
            redirect(base_url()."login.html", "auto");
        }
    }
}