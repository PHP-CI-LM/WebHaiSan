<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Comment extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    // Function check comment before write comment to database, return true is allow write and else
    public function filter_comment($comment)
    {
        $this->load->model('Filter_Comment');
        $array_filter = $this->Filter_Comment->get_filter_comment();
        $array = [];
        foreach ($array_filter as $row) {
            array_push($array, $row['key_word']);
        }
        $slipt_array = explode(' ', $comment);
        $intersect = array_intersect($slipt_array, $array);
        if (empty($intersect)) {
            return true;
        }

        return false;
    }

    // function get all comment and subcomment for id_product, return json. in data json contain id, id_account, id_product, comment_time, content, id_reply, subComment of comment. subCommant contain list comments
    public function getListcomment($id_product = 1)
    {
        $this->load->model('Product_Model');
        $name_procduct = $this->Product_Model->getProductName($id_product);
        $this->load->model('Comment_Model');
        //print_r($name_procduct[0]['name_product']);
        // $listSubComment = $this->Comment_Model->getListSubComment(1, $id_product);
        // print_r($listSubComment);
        $fullCommetForProduceId = array();
        $listComment = $this->Comment_Model->getListCommentForProcduct($id_product);
        foreach ($listComment as $row) {
            $listSubComment = $this->Comment_Model->getListSubComment($row['id'], $id_product);
            $row['subComments'] = $listSubComment;

            array_push($fullCommetForProduceId, $row);
        }
        $fullCommetForProduceId['name_product'] = $name_procduct[0]['name_product'];
        print_r(json_encode($fullCommetForProduceId));
    }

    public function add()
    {
        header('Content-Type: application/json');
        $result = [];
        $time = date('Y-m-d h:i:s');

        // Check if user is login
        if ($this->session->tempdata('user') !== null) {
            // Check if request is valid
            if (!($this->input->post('product-id') == null || $this->input->post('content') == null)) {
                // Checking xss cross exploit in data request to server
                $idProduct = $this->security->xss_clean($this->input->post('product-id'));
                $idAccount = $this->session->tempdata('user');
                $content = $this->security->xss_clean($this->input->post('content'));
                $idReply = 'null';
                if ($this->input->post('reply-id') !== null) {
                    $idReply = $this->security->xss_clean($this->input->post('reply-id'));
                    if (-1 == $idReply) {
                        $idReply = 'null';
                    }
                }

                // Filter comment before saving into database
                if (true === $this->filter_comment($this->input->post('content'))) {
                    // Load model and save data
                    $this->load->model('Comment_Model');
                    $this->Comment_Model->addComment($idProduct, $idAccount, $content, $time, $idReply);
                    $result = $this->generateNotifyResult(true, CREATE_SUCCESS);
                } else {
                    $result = $this->generateNotifyResult(false, CONTENT_RESTRICTED);
                }
            } else {
                $result = $this->generateNotifyResult(false, INPUT_REQUIRED);
            }
        } else {
            $result = $this->generateNotifyResult(false, USER_REQUIRED);
        }

        // Return result
        echo json_encode($result);
    }

    /**
     * Generate notify result 
     * 
     * @param bool $status
     * @param string $message
     * @param array $data
     * 
     * @return string
     */
    private function generateNotifyResult($status, $message, $data = [])
    {
        return [
            'status'    => $status,
            'message'   => $message,
            'data'      => $data
        ];
    }
}
