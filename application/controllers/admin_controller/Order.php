<?php
defined('BASEPATH') or exit('No direct script access allowed');

class order extends CI_Controller
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
            $this->load->model('Order_Model');
            $this->load->model('Customer_Model');
            $this->load->model('Order_Stage_Model');
            $orders = $this->Order_Model->getAllOrder();
            for ($i = 0; $i < sizeof($orders); $i++) {
                $stage = $this->Order_Stage_Model->getStage($orders[$i]['Status']);
                if (false != $stage) {
                    $orders[$i]['StatusCode'] = $stage[0]['id'];
                    $orders[$i]['Status'] = $stage[0]['name'];
                }
                $orders[$i]['DiaChi'] = $orders[$i]['Ward'] . ', ' . $orders[$i]['District'] . ', ' . $orders[$i]['Province'];
            }
            $this->load->view('admin/order', ['data' => $orders]);
        }
    }
    public function switch_stage(){
        if($this->session->tempdata('admin')!=NULL){
            $id_order = $this->input->post('id_order');
            $number_stage = $this->input->post('new_stage');
            if (isset($id_order) && isset($number_stage)){
                $this->load->model('Order_Stage_Model');
                $array_stage = $this->Order_Stage_Model->get_all_stage();
                if (sizeof($array_stage)==0){
                    return sendResponse(0,'stage order of system is empty');
                }
                else {
                    $intersect = array_search($number_stage, array_column($array_stage,'id'));
                    if (empty($intersect)){
                        return sendResponse(0,'there is no stage in list stage of system');
                    }
                    else {
                        $this->load->model('Order_Model');
                        $result = $this->Order_Model->state_transitions($id_order,  $number_stage);
                        if($result){
                            return sendResponse(1,'change successfull order stage',[$number_stage]);
                        }
                        else{
                            return sendResponse(0,'change unsuccess order stage');
                        }
                    }
                }
            }else {
                return sendResponse(0,'id_order or stage is empty');
            }
        }
    }

    public function filter_order()
    {
        // if($this->session->tempdata('admin')!=NULL){
            $id_order = $this->input->post('idOrder');
            $from_date = $this->input->post('fromDate');
            $to_date = $this->input->post('toDate');
            $status = $this->input->post('status');
            $this->load->model('Order_Model');
            $this->load->model('Order_Stage_Model');
            $result = [];
            $result = $this->Order_Model->filter_order($id_order,$from_date,$to_date,$status);
            $this->load->model('Order_Stage_Model');
            $listStage = $this->Order_Stage_Model->get_all_stage();
            $result = ['data'=>$result,'arguments'=>['id_order'=>$id_order,'from_date'=>$from_date,'to_date'=>$to_date,'status'=>$status],'list_stage'=>$listStage];
            $this->load->view('admin/order', $result);
        // }
    }
}
