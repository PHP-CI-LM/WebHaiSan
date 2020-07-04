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
            redirect(base_url() . 'ci-admin/login.html', 'auto');
        } else {
            $this->load->model('Product_Model', 'product');
            $this->load->model('Comment_Model', 'comment');
            $data = $this->comment->getAllComments();
            $paging_links = '';
            $products = $this->product->getAllProducts();
            $this->load->view('admin/comment', [
                'data'          => $data,
                'paging_links'  => $paging_links,
                'products'      => $products
            ]);
        }
    }

    public function filter()
    {
        if ($this->session->tempdata('admin') == null) {
            redirect(base_url() . 'ci-admin/login.html', 'auto');
        } else {
            $data = [];
            $this->load->model('Filter_Comment');
            $data = $this->Filter_Comment->get_filter_comment();
            $paging_links = '';
            $this->load->view('admin/commentFilter', [
                'data'          => $data,
                'paging_links'  => $paging_links
            ]);
        }
    }

    /*
    * Add new filter comment item
    * @return string
    */
    public function addFilter()
    {
        header('Content-Type: application/json');
        $result = [];
        $result['status'] = false;
        $result['data'] = [];
        if ($this->input->get("t") !== null) {
            $filter = $this->input->get("t");
            // Load model
            $this->load->model('Filter_Comment');
            // Check filter exit before add to database
            if (false == $this->Filter_Comment->isExist(null, $filter)) {
                $result['status'] = true;
                $row_affect = $this->Filter_Comment->addFilter($filter);
                if (0 < $row_affect) {
                    $data = $this->Filter_Comment->getFilter(null, $filter);
                    $result['data'] = $data;
                    $result['message'] = 'Đã thêm ' . $row_affect . ' dòng';
                } else {
                    $result['status'] = false;
                    $result['message'] = 'Thêm không thành công, vui lòng thử lại';
                }
            } else {
                $result['message'] = 'Filter đã tồn tại';
            }
        } else {
            $result['message'] = 'Yêu cầu không hợp lệ';
        }
        echo json_encode($result);
    }

     /*
    * Remove filter comment item
    * @return string
    */
    public function removeFilter()
    {
        header('Content-Type: application/json');
        $result = [];
        $result['status'] = false;
        $result['data'] = [];
        if ($this->input->get("id") !== null) {
            $idFilter = $this->input->get("id");
            // Load model
            $this->load->model('Filter_Comment');
            // Check filter exit before add to database
            if (false == $this->Filter_Comment->isExist($idFilter)) {
                $result['status'] = true;
                $row_affect = $this->Filter_Comment->removeFilter($idFilter);
                if (0 < $row_affect) {
                    $result['message'] = 'Đã xóa ' . $row_affect . ' dòng';
                } else {
                    $result['status'] = false;
                    $result['message'] = 'Xóa không thành công, vui lòng thử lại';
                }
            } else {
                $result['message'] = 'Filter đã tồn tại';
            }
        } else {
            $result['message'] = 'Yêu cầu không hợp lệ';
        }
        echo json_encode($result);
    }
}
