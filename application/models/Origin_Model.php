<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Origin_Model extends CI_Model {

    public function addOrigin($nameOrigin)
    {
        $data = [
            'name_origin' => $nameOrigin
        ];
        $this->db->trans_start();
        $this->db->insert('origins', $data);
        $query = $this->db->get_where('origins', $data);
        $this->db->trans_complete();
        return $query->result_array();
    }

    public function getAllOrigin()
    {
        $str="SELECT *from origins";
        $query=$this->db->query($str);
        return $query->result_array();
    }

    /**
     * @return bool:true can add new Category
     * @return bool:false cannot add new Category
     */
    public function validateOrigin($nameOrigin)
    {
        $this->db->where('name_origin', $nameOrigin);
        $this->db->select('id');
        $query = $this->db->get('origins');
        return 0 == $query->num_rows();
    }

}