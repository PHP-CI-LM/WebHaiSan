<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_Model extends CI_Model {

    public function getCategories() {
        $query = $this->db->query(
            "SELECT id_category, name_category FROM categories;"
        );
        return $query->result_array();
    }

    public function getAllCategory()
    {
        $str="SELECT *from categories";
        $query=$this->db->query($str);
        return $query->result_array();
    }
}