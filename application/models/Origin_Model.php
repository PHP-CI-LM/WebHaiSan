<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Origin_Model extends CI_Model {
    public function getAllOrigin()
    {
        $str="SELECT *from origins";
        $query=$this->db->query($str);
        return $query->result_array();
    }

}