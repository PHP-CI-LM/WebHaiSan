<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_Model extends CI_Model {

    public function getProductOfId($idProduct, $limit = 0) {
        $this->db->trans_start();
        $this->db->query("UPDATE products SET count_view=count_view+1 WHERE id_product=".$idProduct);
        $str = "SELECT p.id_product, p.name_product, p.price, p.descript, p.importDate, p.count_view, p.image_link As DuongDan, c.name_category, p.discount, p.count_buy, o.name_origin, p.size, u.name_unit
                FROM products As p, categories As c, units As u, origins As o
                WHERE p.id_category = c.id_category And p.id_origin = o.id And p.id_unit = u.id_unit And p.id_product = " . $idProduct;
        if ($limit !== 0) $str = $str." LIMIT ".$limit;
        $query = $this->db->query($str);
        $this->db->trans_complete();
        return $query->row();
    }

    public function getSimilarProductWithoutId($idProduct, $limit = 0) {
        $this->db->trans_start();
        $this->db->query("SELECT id_category FROM products As p WHERE id_product = " . $idProduct . " Into @id_category");
        $query = "SELECT DISTINCT p.id_product, p.name_product, p.price, p.descript, p.importDate, p.count_view, p.image_link As DuongDan, c.name_category, p.discount, p.count_buy, o.name_origin, p.size, u.name_unit
                FROM products As p, categories As c, units As u, origins As o 
                WHERE p.id_category = c.id_category And p.id_category = @id_category And p.id_origin = o.id And p.id_unit = u.id_unit And p.id_product != " . $idProduct . " ORDER BY p.count_buy DESC";
        if ($limit !== 0) $query = $query." LIMIT ".$limit;
        $result = $this->db->query($query);
        $this->db->trans_complete();
        return $result->result_array();
    }

    public function getProductOfCategory($idCategory, $limit = 0) {
        $str = "SELECT p.id_product, p.name_product, p.price, p.descript, p.importDate, p.count_view, p.image_link As DuongDan, c.name_category, p.discount, p.count_buy, o.name_origin, p.size, u.name_unit
        FROM products As p, categories As c, units As u, origins As o
        WHERE p.id_category = c.id_category And p.id_origin = o.id And p.id_unit = u.id_unit And p.id_category = " . $idCategory;
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