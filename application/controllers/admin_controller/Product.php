<?php
defined('BASEPATH') or exit('No direct script access allowed');

class product extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index($page_num = 1)
    {
        if ($this->session->tempdata('admin') == null || 1 > $page_num) {
            redirect(base_url() . 'ci-admin/login.html', 'auto');
        } else {
            $this->load->model('Product_Model');
            //$data = $this->Product_Model->getAllProducts();
            $this->load->model('Category_Model');
            $data_category = $this->Category_Model->getAllCategory();
            $count = $this->Product_Model->getTotal();

            // Paginate page
            $this->load->library('pagination');
            $limit_per_page = 8;
            $config = $this->generateConfigPagination($count, $limit_per_page);
            $this->pagination->initialize($config);
            $paging_links = $this->pagination->create_links();

            // Lấy danh sách sp
            $start = ($page_num - 1) * $limit_per_page;
            $data = $this->Product_Model->getAllProducts($limit_per_page, $start);
            $this->load->view('admin/product', [
                "data"          => $data,
                "data_category" => $data_category,
                "nums_row"      => $count,
                "paging_links"  => $paging_links
            ]);
        }
    }

    public function loadviewform($id = null)
    {
        if ($this->session->tempdata('admin') == null) {
            redirect(base_url() . 'ci-admin/login.html', 'auto');
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
                $this->load->view('admin/formaddProduct', [
                    "data_category" => $data_category,
                    "data_unit" => $data_unit,
                    "data_origin" => $data_origin
                ]);
            } else {
                $this->load->view('admin/formeditProduct', [
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
            redirect(base_url() . 'ci-admin/login.html', 'auto');
        } else {
            $name_product = $this->security->xss_clean($this->input->post('name'));
            $id_origin = $this->security->xss_clean($this->input->post('origin'));
            $new_origin = $this->security->xss_clean($this->input->post('new_origin'));
            $price = $this->security->xss_clean($this->input->post('price'));
            $discount = $this->security->xss_clean($this->input->post('discount'));
            $isDeliveredInDay = $this->security->xss_clean($this->input->post('isDeliveredInDay'));
            $id_category = $this->security->xss_clean($this->input->post('cat'));
            $new_category = $this->security->xss_clean($this->input->post('new_category'));
            $size = $this->security->xss_clean($this->input->post('size'));
            $id_unit = $this->security->xss_clean($this->input->post('unit'));
            $descript = $this->security->xss_clean($this->input->post('content'));

            if (
                $name_product !== null && $id_origin !== null && $price !== null &&
                $discount !== null && $isDeliveredInDay !== null &&  $id_category !== null && $size !== null && $id_unit !== null
            ) {
                // Validate new category
                if (-1 == $id_category) {
                    $this->load->model('Category_Model');
                    if (true === $this->Category_Model->validateCategory($new_category)) {
                        $result = $this->Category_Model->addCategory($new_category);
                        $id_category = $result[0]["id_category"];
                    }
                }

                // Validate new origin
                if (-1 == $id_origin) {
                    $this->load->model('Origin_Model');
                    if (true === $this->Origin_Model->validateOrigin($new_origin)) {
                        $result = $this->Origin_Model->addOrigin($new_origin);
                        $id_origin = $result[0]["id"];
                    }
                }

                //Validate variable isDeliveredInDay
                if (0 != $isDeliveredInDay && 1 != $isDeliveredInDay) {
                    if (0 > $isDeliveredInDay) {
                        $isDeliveredInDay = 0;
                    } else {
                        $isDeliveredInDay = 1;
                    }
                }

                $importDate = getTimestamp();
                $price = str_replace(",", "", $price);
                $image_link = $this->uploadImageOfProduct();
                if (false !== $image_link) {
                    $this->load->model('Product_Model');
                    $data = $this->Product_Model->SaveProduct($name_product, $price, $descript, $importDate, $image_link, $id_category, $discount, $id_origin, $size, $id_unit, $isDeliveredInDay);
                    redirect(base_url() . "ci-admin/product.html", "auto");
                } else {
                    sendResponse(0, "Upload image fail!");
                }
            }
        }
    }

    public function UpdateProduct($id_product)
    {
        if ($this->session->tempdata('admin') == null) {
            redirect(base_url() . 'ci-admin/login.html', 'auto');
        } else {
            $id_product = $this->security->xss_clean($id_product);
            $name_product = $this->security->xss_clean($this->input->post('name'));
            $id_origin = $this->security->xss_clean($this->input->post('origin'));
            $image_link = $this->input->post('linkanh');
            $price = $this->security->xss_clean($this->input->post('price'));
            $discount = $this->security->xss_clean($this->input->post('discount'));
            $isDeliveredInDay = $this->security->xss_clean($this->input->post('isDeliveredInDay'));
            $id_category = $this->security->xss_clean($this->input->post('cat'));
            $size = $this->security->xss_clean($this->input->post('size'));
            $id_unit = $this->security->xss_clean($this->input->post('unit'));
            $descript = $this->security->xss_clean($this->input->post('content'));
            if (
                $id_product !== null &&
                $name_product !== null && $id_origin !== null &&  $image_link !== null && $price !== null &&
                $discount !== null && $isDeliveredInDay !== null &&  $id_category !== null && $size !== null && $id_unit !== null
            ) {
                $price = str_replace(",", "", $price);
                //Validate variable isDeliveredInDay
                if (0 != $isDeliveredInDay && 1 != $isDeliveredInDay) {
                    if (0 > $isDeliveredInDay) {
                        $isDeliveredInDay = 0;
                    } else {
                        $isDeliveredInDay = 1;
                    }
                }
                $this->load->model('Product_Model');
                $data = $this->Product_Model->UpdateProduct($id_product, $name_product, $price, $descript, $image_link, $id_category, $discount, $id_origin, $size, $id_unit, $isDeliveredInDay);
                redirect(base_url() . "ci-admin/product.html", "auto");
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
        }
    }

    /**
     * Generate configration for paginate method of products page
     * 
     * @param int $total_rows
     * @param int $limit_per_page
     * 
     * @return array
     */
    private function generateConfigPagination($total_rows, $limit_per_page = 10)
    {
        $config['total_rows'] = $total_rows;
        $config['base_url'] = base_url('ci-admin');
        $config['per_page'] = $limit_per_page;
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';
        $config['num_links'] = 2;
        $config['prefix'] = 'product_';
        $config['suffix'] = '.html';
        $config['use_page_numbers'] = true;
        $config['full_tag_open'] = '<div class="pagination">';
        $config['full_tag_close'] = '</div>';
        $config['cur_tag_open'] = '<a href="javascript:void(0)" class="active_link">';
        $config['cur_tag_close'] = '</a>';
        $config['next_tag_open'] = '<span class="next_link">';
        $config['next_tag_close'] = '</span>';
        $config['prev_tag_open'] = '<span class="prev_link">';
        $config['prev_tag_close'] = '</span>';
        $config['last_tag_open'] = '<span class="last_link">';
        $config['last_tag_close'] = '</span>';
        $config['attributes'] = [
            'class'     => 'page_link'
        ];
        return $config;
    }

    /**
     * Upload image of product
     * 
     * @return string|bool
     * 
     */
    private function uploadImageOfProduct()
    {
        // Load library to upload thumbnail of product
        $config['upload_path'] = './images';
        $config['allowed_types'] = '*';
        $config['max_size'] = '20480';
        $config['override'] = false;
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('img')) {
            $fullPath = $this->upload->data()['full_path'];
            $this->resizeImage($fullPath, 500, 500);
            return $this->upload->data()['file_name'];
        } else {
            return false;
        }
    }

    private function resizeImage($path, $width, $height)
    {
        $config['image_library'] = 'gd2';
        $config['source_image'] = $path;
        $config['maintain_ratio'] = FALSE;
        $config['width']         = $width;
        $config['height']       = $height;
        $this->load->library('image_lib');
        $this->image_lib->initialize($config);
        $this->image_lib->clear();
        return $this->image_lib->resize();
    }
}
