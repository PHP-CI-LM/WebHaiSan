<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Account extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // Load facebook oauth library
        $this->load->library('facebook');
        // $this->load->library('google');

        // Load user model
        $this->load->model('user');
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
                'data' => array_merge($accountData[0], $customerData[0]),
            ]);
        } else {
            redirect(base_url(), 'auto');
        }
    }

    public function login()
    {
        // Generate oauth url
        $fbAccountData = $this->fb_authenticate();

        if ($this->session->tempdata('user') !== null) {
            redirect(base_url(), 'auto');
        } else {
            $this->form_validation->set_rules('username', 'Username', 'required|max_length[20]');
            $this->form_validation->set_rules('password', 'Password', 'required');
            if ($this->input->post('username') === null) {
                $this->load->view('Login', [
                    'data' => [
                        'fb' => $fbAccountData,
                    ],
                ]);
            } elseif ($this->form_validation->run() === false) {
                $this->load->view('Login', [
                    'data' => [
                        'fb' => $fbAccountData,
                    ],
                ]);
            } else {
                $newPassword = md5($this->input->post('password'));
                $this->load->model('Account_Model');
                $result = $this->Account_Model->login(
                    $this->input->post('username'),
                    $newPassword
                );
                if (0 < sizeof($result)) {
                    $this->session->set_tempdata('user', $result[0]['AccountID'], 3600); //Phiên đăng nhập 60 phút
                    $backUrl = urldecode($this->input->get('backUrl'));
                    if ($backUrl === null) {
                        $backUrl = base_url();
                    }
                    redirect($backUrl, 'auto');
                } else {
                    $this->load->view('Login', [
                        'error' => 'Sai tên đăng nhập hoặc mật khẩu!',
                        'data' => [
                            'fb' => $fbAccountData,
                        ],
                    ]);
                }
            }
        }
    }

    public function updateInfomation($customerID)
    {
        header("Content-Type: Application/Json");
        // Check invalid input
        if (
            null == $this->input->post('customerName') || null == $this->input->post('sex') || 
            null == $this->input->post('address') || null == $this->input->post('phone')
        ) {
            $this->sendResponse(0, 'Input not valid!', []);
            return;
        }

        // Get data update in pre-processing
        $customerName = $this->security->xss_clean($this->input->post('customerName'));
        $sex = $this->security->xss_clean($this->input->post('sex'));
        $address = $this->security->xss_clean($this->input->post('address'));
        $phone = $this->security->xss_clean($this->input->post('phone'));

        // Loading model and saving data
        $this->load->model('Customer_Model');
        $result = $this->Customer_Model->updateCustomer($customerID, $customerName, $sex, $phone, $address);
        if (true == $result) {
            // Update success
            $this->sendResponse(1, 'Update successfully!');
            return;
        } else {
            // Update failed
            $this->sendResponse(0, 'Update fail!');
            return;
        }
    }

    public function uploadAvatar($customerID)
    {
        header("Content-Type: Application/Json");
        $result = false;

        // Load library to upload thumbnail of product
        $config['upload_path'] = 'static/image/avatar';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '10240';
        $config['override'] = false;
        $this->load->library('upload', $config);
        // Start upload 
        if ($this->upload->do_upload('avatar')) {
            $result = $this->upload->data()['file_name'];
        }

        // Update avatar url in database
        $this->load->model('Customer_Model');
        $this->Customer_Model->updateCustomerAvatar($customerID, $result);

        // Return url of avatar
        $result = base_url().'static/image/avatar/'.$result;
        $this->sendResponse(1, 'Upload avatar successfully!', [
            'url'   => $result
        ]);
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url(), 'auto');
    }

    public function signup()
    {
        if ($this->session->tempdata('user') !== null) {
            redirect(base_url(), 'auto');
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
            } elseif ($this->form_validation->run() === false) {
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
                redirect(base_url() . 'dang-nhap.html', 'auto');
            }
        }
    }

    private function fb_logout()
    {
        // Remove local Facebook session
        $this->facebook->destroy_session();
        // Remove user data from session
        $this->session->unset_userdata('userData');
        // Redirect to login page
        redirect('user_authentication');
    }

    private function fb_authenticate()
    {
        $userData = array();

        // Authenticate user with facebook
        if ($this->facebook->is_authenticated()) {
            // Get user info from facebook
            $fbUser = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email,link,gender,picture');

            // Preparing data for database insertion
            $userData['oauth_provider'] = 'facebook';
            $userData['oauth_uid'] = !empty($fbUser['id']) ? $fbUser['id'] : '';
            $userData['first_name'] = !empty($fbUser['first_name']) ? $fbUser['first_name'] : '';
            $userData['last_name'] = !empty($fbUser['last_name']) ? $fbUser['last_name'] : '';
            $userData['email'] = !empty($fbUser['email']) ? $fbUser['email'] : '';
            $userData['gender'] = !empty($fbUser['gender']) ? $fbUser['gender'] : '';
            $userData['picture'] = !empty($fbUser['picture']['data']['url']) ? $fbUser['picture']['data']['url'] : '';
            $userData['link'] = !empty($fbUser['link']) ? $fbUser['link'] : 'https://www.facebook.com/';

            // Insert or update user data to the database
            $userID = $this->user->checkUser($userData);

            // Check user data insert or update status
            if (!empty($userID)) {
                $data['userData'] = $userData;

                // Store the user profile info into session
                $this->session->set_userdata('userData', $userData);
            } else {
                $data['userData'] = array();
            }

            // Facebook logout URL
            $data['logoutURL'] = $this->facebook->logout_url();
        } else {
            // Facebook authentication url
            $data['authURL'] = $this->facebook->login_url();
        }

        return $data;
    }

    // get user name of accout
    public function getUserName($id_account)
    { }

    private function sendResponse(int $status, $message, $data = []) {
        $statusText = false;
        if (1 == $status) {
            $statusText = true;
        }
        $result = json_encode([
            'status'    => $statusText,
            'message'   => $message,
            'data'      => $data
        ]);
        echo $result;
    }
}
