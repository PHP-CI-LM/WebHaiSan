<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if ($this->input->get("oid") !== null) {
            $oid = $this->input->get("oid");
            if (is_numeric($oid) && strlen($oid) > 8) {
                //Split id and order date from order id
                $id = substr($oid, 8, strlen($oid) - 8);
                $date = substr($oid, 0, 2) . "/" . substr($oid, 2, 2) . "/" . substr($oid, 4, 4);
                //Load model to get data from database            
                $this->load->model("Order_Model");
                $this->load->model("Order_Detail_Model");
                $this->load->model("Product_Model");
                //Get info of id
                $order = $this->Order_Model->getOrder($id, $date);
                if (sizeof($order) > 0) {
                    //Get list products of order if id is valid
                    $details = $this->Order_Detail_Model->getDetailOrder($id);
                    $products = array();
                    foreach ($details as $item) {
                        $product = (array) $this->Product_Model->getProductOfId($item["id"], 1);
                        $product["price"] = $item["price"];
                        $product["count"] = $item["amount"];
                        array_push($products, $product);
                    }
                    $this->load->view("CheckOrder", [
                        "status" => true,
                        "stage" => "CheckOrder",
                        "oid" => $oid,
                        "products" => $products
                    ]);
                } else {
                    $this->load->view("CheckOrder", [
                        "status" => false,
                        "stage" => "CheckOrder",
                        "oid" => $oid
                    ]);
                }
            } else $this->load->view("CheckOrder", [
                "status" => false,
                "stage" => "CheckOrder",
                "oid" => $oid
            ]);
        } else $this->load->view("CheckOrder", [
            "status" => false,
            "stage" => "CheckOrder",
            "oid" => null
        ]);
    }

    public function history()
    {
        // Check user login
        if ($this->session->tempdata('user') == null) {
            redirect(base_url(), 'auto');
        } else {
            $accountID = $this->session->tempdata('user');
            $this->load->model('Order_Model');
            $this->load->model('Order_Stage_Model');
            $orders = $this->Order_Model->getOrdersOfUser($accountID);
            for ($i = 0; $i < sizeof($orders); $i++) {
                $stage = $this->Order_Stage_Model->getStage($orders[$i]['Status']);
                if (false != $stage) {
                    $orders[$i]['statusCode'] = $stage[0]['id'];
                    $orders[$i]['Status'] = $stage[0]['name'];
                }
            }
            $this->load->view("History", [
                'orders'    => $orders
            ]);
        }
    }

    public function delete()
    {
        header('Content-Type: application/json');
        $result = [];
        $result['status'] = false;
        if ($this->input->get("oid") !== null) {
            $oid = $this->input->get("oid");
            if (is_numeric($oid) && strlen($oid) > 8) {
                //Split id and order date from order id
                $id = substr($oid, 8, strlen($oid) - 8);
                $date = substr($oid, 0, 2) . "/" . substr($oid, 2, 2) . "/" . substr($oid, 4, 4);
                // Load model
                $this->load->model('Order_Model');
                $this->load->model('Order_Detail_Model');
                // Delete order_detail and order
                if (true == $this->Order_Model->isDelete($id)) {
                    $result['status'] = true;
                    $this->Order_Detail_Model->deleteOrderDetail($id);
                    $row_affect = $this->Order_Model->deleteOrder($id);
                    if (0 < $row_affect) {
                        $result['message'] = 'Đã xóa '. $row_affect .'dòng';
                    }
                } else {
                    $result['message'] = 'Đơn hàng không thể xóa';
                }
            } else {
                $result['message'] = 'Thông tin đơn hàng không hợp lệ';
            }
        } else {
            $result['message'] = 'Yêu cầu không hợp lệ';
        }
        echo json_encode($result);
    }
}
