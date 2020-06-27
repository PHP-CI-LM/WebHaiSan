<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_Model extends CI_Model {

    public function addCategory($nameCategory)
    {
        $this->load->helper('lang_helper');
        $data = [
            'name_category' => $nameCategory,
            'thumbnail'     => 'default_cat.png',
            'url'           => vn_to_str(strtolower($nameCategory)). '.html'
        ];
        $this->db->trans_start();
        $this->db->insert('categories', $data);
        $query = $this->db->get_where('categories', $data);
        $this->db->trans_complete();
        return $query->result_array();
    }

    public function getCategory($id_category = -1) {
        if ($id_category == -1) return false;
        $this->db->where('id_category', $id_category);
        $result = $this->db->get('categories');
        return $result->result_array();
    }

    public function getCategories() {
        $query = $query=$this->db->get('categories');
        return $query->result_array();
    }

    public function getAllCategory()
    {
        $query=$this->db->get('categories');
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