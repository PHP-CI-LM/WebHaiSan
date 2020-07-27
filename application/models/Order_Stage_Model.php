<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_Stage_Model extends CI_Model {

    public function getStage($id_order)
    {
        $this->db->where('id', $id_order);
        $result = $this->db->get('orders_stage')->result_array();
        if (0 < sizeof($result)) {
            return $result;
        } else {
            return false;
        }
    }
    public function get_all_stage(){
        $this->db->select('id');
        $result = $this->db->get('orders_stage')->result_array();
        if(0<sizeof($result)){
            return $result;
        }
        else{
            return false;
        }
    }
}