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
        validateSession();
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
        validateSession();
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

    public function edit(){
        validateSession();
        if ($this->session->tempdata('user') == null) {
            redirect(base_url(), 'auto');
        }else if(null != $this->input->post('data') && null != $this->input->post('oid')){
            header('Content-Type: application/json');
            $data = (array) json_decode($this->input->post("data"));
            if (
                isset($data["name"]) && isset($data["phone"]) && isset($data["address"]) &&
                isset($data["ward"]) && isset($data["district"]) && isset($data["province"]) &&
                isset($data["shipper"]) && isset($data["price"]) && isset($data["products"])
            ){
                $data = $this->cleanInput($data);
                $this->load->model('Order_Model');
                $this->load->model('Order_Detail_Model');
                $data["AccountID"] = $this->session->tempdata("user");
                $update_order = $this->Order_Model->updateOrder($this->input->post('oid'), $data);
                if ($update_order) {
                    $products = json_decode(json_encode($data['products']), true);
                    $update_order_detail = false;
                    foreach ($products as $product) {
                        $update_order_detail = $this->Order_Detail_Model->updateOrderDetail($this->input->post('oid'), $product);
                        if ($update_order_detail == false) break;
                    }
                    if($update_order_detail){
                        sendResponse(1, 'Update order successfully!');
                        return;
                    }else{
                        sendResponse(0, 'Update oder detail unsuccess!');
                        return;
                    }
                }
                else{
                    sendResponse(0, 'Update oder unsuccess!');
                    return;
                }
            }
            else{
                sendResponse(0,'most variable can not data');
            }
        }
        else{
            $accountID = $this->session->tempdata('user');
            $oid = $this->input->get("oid");
            $order = [];
            if (is_numeric($oid) && strlen($oid) > 8) {
                //Split id and order date from order id
                $id = substr($oid, 8, strlen($oid) - 8);
                $date = substr($oid, 0, 2) . "/" . substr($oid, 2, 2) . "/" . substr($oid, 4, 4);
                $this->load->model("Order_Model");
                $this->load->model("Customer_Model");
                $this->load->model("Order_Detail_Model");
                $this->load->model("Product_Model");
                $order = $this->Order_Model->getOrder($id, $date);
                if (sizeof($order) > 0) {
                    //Get list products of order if id is valid
                    $order = $order[0];
                    $order = array_merge($order, $this->Customer_Model->getCustomer($order['AccountID'])[0]);
                    $details = $this->Order_Detail_Model->getDetailOrder($id);
                    $products = array();
                    foreach ($details as $item) {
                        $product = (array) $this->Product_Model->getProductOfId($item["id"], 1);
                        $product["price"] = $item["price"];
                        $product["count"] = $item["amount"];
                        array_push($products, $product);
                    }
                    $order['detail'] = $details;
                    $order['products'] = $products;
                    $this->load->view('EditOrder', [
                        'oid'   => $id,
                        'info'  => $order
                    ]);
                } else {
                    redirect(base_url());
                }
            } else {
                redirect(base_url());
            }
        }
    }

    public function delete()
    {
        validateSession();
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
                if (true == $this->Order_Model->isCancel($id)) {
                    $result['status'] = true;
                    $row_affect = $this->Order_Model->cancelOrder($id);
                    if (0 < $row_affect) {
                        $result['message'] = 'Đã huỷ ' . $row_affect . 'dòng';
                    }
                } else {
                    $result['message'] = 'Đơn hàng không thể hủy';
                }
            } else {
                $result['message'] = 'Thông tin đơn hàng không hợp lệ';
            }
        } else {
            $result['message'] = 'Yêu cầu không hợp lệ';
        }
        echo json_encode($result);
    }

    private function cleanInput($array)
    {
        $result = array();
        foreach ($array as $key => $value) {
            if ($key != 'products') {
                $tempValue = $this->security->xss_clean($value);
                $result[$key] = $tempValue;
            } else {
                $result[$key] = $value;
            }
        }
        return $result;
    }
}
