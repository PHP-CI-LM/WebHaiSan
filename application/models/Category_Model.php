<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_Model extends CI_Model {

    public function addCategory($nameCategory)
    {
        $data = [
            'name_category' => $nameCategory
        ];
        $this->db->trans_start();
        $this->db->insert('categories', $data);
        $query = $this->db->get_where('categories', $data);
        $this->db->trans_complete();
        return $query->result_array();
    }

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

    /**
     * @return bool:true can add new Category
     * @return bool:false cannot add new Category
     */
    public function validateCategory($nameCategory)
    {
        $this->db->where('name_category', $nameCategory);
        $this->db->select('id_category');
        $query = $this->db->get('categories');
        return 0 == $query->num_rows();
    }
}