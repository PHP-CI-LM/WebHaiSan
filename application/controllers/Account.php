<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Account extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        //Check if user is login
        if ($this->session->tempdata('user') !== null) {
            $id_account = $this->session->tempdata('user');
            $this->load->model('Account_Model');
            $this->load->model('Customer_Model');
            $accountData = $this->Account_Model->getAccount($id_account);
            $customerData = $this->Customer_Model->getCustomer($id_account);
            // var_dump(array_merge($accountData[0], $customerData[0]));
            $this->load->view('AccountInfo', [
                'data' => array_merge($accountData[0], $customerData[0])
            ]);
        }
        else {
            redirect(base_url(), 'auto');
        }
    }

    public function login()
    {
        if ($this->session->tempdata("user") !== null) {
            redirect(base_url(), "auto");
        } else {
            $this->form_validation->set_rules('username', 'Username', 'required|max_length[20]');
            $this->form_validation->set_rules('password', 'Password', 'required');
            if ($this->input->post('username') === null) {
                $this->load->view('Login');
            } else if ($this->form_validation->run() === false) {
                $this->load->view('Login');
            } else {
                $newPassword = md5($this->input->post('password'));
                $this->load->model('Account_Model');
                $result = $this->Account_Model->login(
                    $this->input->post("username"),
                    $newPassword
                );
                if ($result != -1) {
                    $this->session->set_tempdata("user", $result, 3600); //Phiên đăng nhập 60 phút
                    redirect($_SERVER['HTTP_REFERER'], "auto");
                } else {
                    $this->load->view('Login', ["error" => "Sai tên đăng nhập hoặc mật khẩu!"]);
                }
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url(), "auto");
    }

    public function signup()
    {
        if ($this->session->tempdata("user") !== null) {
            redirect(base_url(), "auto");
        } else {
            $this->form_validation->set_rules('username', 'Username', 'required|max_length[30]');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('customername', 'CustomerName', 'required');
            $this->form_validation->set_rules('address', 'Address', 'required');
            $this->form_validation->set_rules('phone', 'Phone', 'required|max_length[12]');
            $this->form_validation->set_rules('confirm', 'ConfirmPassword', 'required');
            $this->form_validation->set_message('required', 'Trường {field} không được để trống');
            $this->form_validation->set_message('max_length', 'Trường {field} không được quá {param} ký tự');
            if ($this->input->post('username') === null) {
                $this->load->view('Signup');
            } else if ($this->form_validation->run() === false) {
                $this->load->view('Signup');
            } else {
                $newPassword = md5($this->input->post('password'));
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
                redirect(base_url() . "dang-nhap.html", "auto");
            }
        }
    }
}
