<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Comment extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function add()
    {
        header('Content-Type: application/json');
        // Check if request is valid
        if (
            $this->input->post('product-id') == null || $this->input->post('content') == null &&
            $this->session->tempdata("user") == null
        ) {
            echo json_encode(['status' => false]);
        }

        $idProduct = $this->security->xss_clean($this->input->post('product-id'));
        $idAccount = $this->session->tempdata("user");
        $content = $this->security->xss_clean($this->input->post('content'));
        $time = date("Y-m-d h:i:s");
        $idReply = -1;
        if ($this->input->get('reply-id') !== null) {
            $idReply = $this->security->xss_clean($this->input->post('reply-id'));
        }
        
        // Load model and save data
        $this->load->model('Comment_Model');
        $this->Comment_Model->addComment($idProduct, $idAccount, $content, $time, $idReply);

        // Get info of account comment
        $this->load->model('Account_Model');
        $this->load->model('Customer_Model');
        $name = $this->Customer_Model->getCustomer($idAccount)[0]['CustomerName'];
        $avatar = $this->Account_Model->getAccount($idAccount)[0]['avatar'];

        // Analys time comment
        $time = diff_time($time);

        // Return result
        echo json_encode([
            'status'        => true,
            'name'          => $name,
            'avatar'        => $avatar,
            'time'          => $time,
            'content'       => $content
        ]);
    }
}
