<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_Model extends CI_Model {

    public function getProductOfCategory($idCategory, $limit = 0) {
        $str = "SELECT p.id_product, p.name_product, p.price, p.descript, p.importDate, p.count_view, p.image_link As DuongDan, c.name_category, p.discount, p.count_buy 
                From product As p, category As c 
                Where p.id_category = c.id_category And p.id_category = " . $idCategory;
        if ($limit !== 0) $str = $str." LIMIT ".$limit;
        $query = $this->db->query($str);
        return $query->result_array();
    }

    public function getProductsSelling($limit = 0) {
        $str = "SELECT * FROM selling_products";
        if ($limit !== 0) $str = $str." LIMIT ".$limit;
        $query = $this->db->query($str);
        return $query->result_array();
    }

    public function getProductsNew($limit = 0) {
        $str = "SELECT * FROM new_products";
        if ($limit !== 0) $str = $str." LIMIT ".$limit;
        $query = $this->db->query($str);
        return $query->result_array();
    }
}