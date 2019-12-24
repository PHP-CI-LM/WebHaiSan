<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Unit_Model extends CI_Model {
    public function getAllUnit()
    {
        $str="SELECT *from units";
        $query=$this->db->query($str);
        return $query->result_array();
    }

}