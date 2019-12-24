<?php
defined('BASEPATH') or exit('No direct script access allowed');

class product extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        if ($this->session->tempdata('admin') == null) {
            redirect(base_url().'admin/login.html', 'auto');
        } else {
            $this->load->model('Product_Model');
            //$data = $this->Product_Model->getAllProduct();
            $this->load->model('Category_Model');
            $data_category = $this->Category_Model->getAllCategory();
            $data2 = $this->Product_Model->GetTotal();
            $this->data['data2'] = $data2;
            //echo $data2;
            // $this->load->view('admin\product', ["data" => $data,"data_category" => $data_category,"data2" => $data2,"list" => $list]);
            $this->load->library('pagination');
            $config = array();
            $config['data2'] = $data2;
            $config['base_url'] = public_url('admin/product.html');
            $config['per_page'] = 10;
            $config['uri_segment'] = 4;
            $config['next_link'] = 'Trang kế tiếp';
            $config['prev_link'] = 'Trang trước';
            $this->pagination->initialize($config);
            $input = array();
            $segment = $this->uri->segment(4);
            $segment = intval($segment);

            $input['limit'] = array($config['per_page'], $segment);
            //Kiểm tra có lọc hay không
            $id = $this->input->get('id');
            $input['where'] = array();
            if ($id > 0) {
                $input['where']['id'] = $id;
            }
            // Lấy danh sách sp
            $data = $this->Product_Model->getAllProduct($input);
            //$this->data['data']=$data;    
            $this->load->view('admin\product', ["data" => $data, "data_category" => $data_category, "data2" => $data2]);
            //var_dump($data);
        }
    }
    public function loadviewform($id = null)
    {
        if ($this->session->tempdata('admin') == null) {
            redirect(base_url().'admin/login.html', 'auto');
        } else {
            $data_product = array();
            if ($id !== null) {
                $this->load->model('Product_Model');
                $id = $this->security->xss_clean($id);
                $data_product = $this->Product_Model->getProductOfId($id);
            }

            $this->load->model('Category_Model');
            $this->load->model('Unit_Model');
            $this->load->model('Origin_Model');

            $data_category = $this->Category_Model->getAllCategory();
            $data_unit = $this->Unit_Model->getAllUnit();
            $data_origin = $this->Origin_Model->getAllOrigin();


            //var_dump((array)$data_product);
            if ($id === null) {
                $this->load->view('admin\formaddProduct', [
                    "data_category" => $data_category,
                    "data_unit" => $data_unit,
                    "data_origin" => $data_origin
                ]);
            } else {
                $this->load->view('admin\formeditProduct', [
                    "data_category" => $data_category,
                    "data_unit" => $data_unit,
                    "data_origin" => $data_origin,
                    "data_product" => (array) $data_product
                ]);
            }
        }
    }
    public function addProduct()
    {
        if ($this->session->tempdata('admin') == null) {
            redirect(base_url().'admin/login.html', 'auto');
        } else {
            $name_product = $this->security->xss_clean($this->input->post('name'));
            $id_origin = $this->security->xss_clean($this->input->post('origin'));
            $image_link = $this->input->post('linkanh');
            $price = $this->security->xss_clean($this->input->post('price'));
            $discount = $this->security->xss_clean($this->input->post('discount'));
            $id_category = $this->security->xss_clean($this->input->post('cat'));
            $size = $this->security->xss_clean($this->input->post('size'));
            $id_unit = $this->security->xss_clean($this->input->post('unit'));
            $descript = $this->security->xss_clean($this->input->post('content'));
            echo $name_product . "<br>";
            echo $id_origin . "<br>";
            echo $image_link . "<br>";
            echo  $price . "<br>";
            echo  $size . "<br>";
            echo $id_unit . "<br>";
            echo $descript . "<br>";


            if (
                $name_product !== null && $id_origin !== null &&  $image_link !== null && $price !== null &&
                $discount !== null &&  $id_category !== null && $size !== null && $id_unit !== null
            ) {

                $importDate = date("Y-m-d");
                $price = str_replace(",", "", $price);
                $this->load->model('Product_Model');
                $data = $this->Product_Model->SaveProduct($name_product, $price, $descript, $importDate, $image_link, $id_category, $discount, $id_origin, $size, $id_unit);
                redirect(base_url() . "admin/product.html", "auto");
            }
        }
    }
    public function UpdateProduct($id_product)
    {
        if ($this->session->tempdata('admin') == null) {
            redirect(base_url().'admin/login.html', 'auto');
        } else {
            $id_product = $this->security->xss_clean($id_product);
            $name_product = $this->security->xss_clean($this->input->post('name'));
            $id_origin = $this->security->xss_clean($this->input->post('origin'));
            $image_link = $this->input->post('linkanh');
            $price = $this->security->xss_clean($this->input->post('price'));
            $discount = $this->security->xss_clean($this->input->post('discount'));
            $id_category = $this->security->xss_clean($this->input->post('cat'));
            $size = $this->security->xss_clean($this->input->post('size'));
            $id_unit = $this->security->xss_clean($this->input->post('unit'));
            $descript = $this->security->xss_clean($this->input->post('content'));
            if (
                $id_product !== null &&
                $name_product !== null && $id_origin !== null &&  $image_link !== null && $price !== null &&
                $discount !== null &&  $id_category !== null && $size !== null && $id_unit !== null
            ) {

                $price = str_replace(",", "", $price);
                $this->load->model('Product_Model');
                $data = $this->Product_Model->UpdateProduct($id_product, $name_product, $price, $descript, $image_link, $id_category, $discount, $id_origin, $size, $id_unit);
                redirect(base_url() . "admin/product.html", "auto");
            }
        }
    }
    public function DeleteProduct()
    {
        $result = ["status" => false];
        if ($this->session->tempdata('admin') != null) {
            $id_product = $this->security->xss_clean($this->input->post('id'));
            if ($id_product !== null && strlen($id_product) > 0) {

                //$price = str_replace(",", "", $price);
                $this->load->model('Product_Model');
                $this->Product_Model->DeleteProduct($id_product);
                $result["status"] = true;
            }
        }
        echo json_encode($result);
    }
    public function FillProduct()
    {
        if ($this->session->tempdata('admin') != null) {
            $id_product = $this->security->xss_clean($this->input->post('id'));
            $name_product = $this->security->xss_clean($this->input->post('name'));
            $id_category = $this->security->xss_clean($this->input->post('theloai'));
            $this->load->model('Product_Model');
            $str = $this->Product_Model->FindProduct($id_product, $name_product, $id_category);
            echo json_encode($result = [
                "status"    => true,
                "data"      => [
                    "id_product"    => $id_product,
                    "name_product"  => $name_product,
                    "id_category"   => $id_category,
                    "products"      => $str
                ]
            ]);
            // var_dump($str);
        }
    }
}
