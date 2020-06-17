<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Product_Model extends CI_Model
{
    public function getPrice($idProduct)
    {
        $query = $this->db->query(
            'SELECT price FROM products WHERE id_product = '.$idProduct.';'
        );

        return $query->row()->price;
    }

    public function getDiscount($idProduct)
    {
        $query = $this->db->query(
            'SELECT discount FROM products WHERE id_product = '.$idProduct.';'
        );

        return $query->row()->discount;
    }

    public function updateCountBuy($idProduct, $extraValue)
    {
        $query = $this->db->query(
            'UPDATE products SET count_buy = (count_buy + '.$extraValue.')'.
                ' WHERE id_product = '.$idProduct.';'
        );
    }

    public function getProductOfId($idProduct, $limit = 0)
    {
        $this->db->trans_start();
        $this->db->query('UPDATE products SET count_view=count_view+1 WHERE id_product='.$idProduct);
        $str = 'SELECT p.id_product, p.name_product, p.price, p.descript, p.importDate, p.count_view, p.image_link As DuongDan, c.name_category, p.discount, p.count_buy, o.name_origin, p.size, u.name_unit
                FROM products As p, categories As c, units As u, origins As o
                WHERE p.id_category = c.id_category And p.id_origin = o.id And p.id_unit = u.id_unit And p.id_product = '.$idProduct;
        if ($limit !== 0) {
            $str = $str.' LIMIT '.$limit;
        }
        $query = $this->db->query($str);
        $this->db->trans_complete();

        return $query->row();
    }

    public function getSimilarProductWithoutId($idProduct, $limit = 0)
    {
        $this->db->trans_start();
        $this->db->query('SELECT id_category FROM products As p WHERE id_product = '.$idProduct.' Into @id_category');
        $query = 'SELECT DISTINCT p.id_product, p.name_product, p.price, p.descript, p.importDate, p.count_view, p.image_link As DuongDan, c.name_category, p.discount, p.count_buy, o.name_origin, p.size, u.name_unit
                FROM products As p, categories As c, units As u, origins As o 
                WHERE p.id_category = c.id_category And p.id_category = @id_category And p.id_origin = o.id And p.id_unit = u.id_unit And p.id_product != '.$idProduct.' ORDER BY p.count_buy DESC';
        if ($limit !== 0) {
            $query = $query.' LIMIT '.$limit;
        }
        $result = $this->db->query($query);
        $this->db->trans_complete();

        return $result->result_array();
    }

    public function getProductOfCategory($idCategory, $limit = 0, $start = -1)
    {
        $str = 'SELECT p.id_product, p.name_product, p.price, p.descript, p.importDate, p.count_view, p.image_link As DuongDan, c.name_category, p.discount, p.count_buy, o.name_origin, p.size, u.name_unit
        FROM products As p, categories As c, units As u, origins As o
        WHERE p.id_category = c.id_category And p.id_origin = o.id And p.id_unit = u.id_unit And p.id_category = '.$idCategory;
        if ($limit !== 0 && $start != -1) {
            $str = $str.' LIMIT '. $start . ', ' . $limit;
        } else if ($limit != 0) {
            $str = $str.' LIMIT '. $limit;
        }
        $query = $this->db->query($str);

        return $query->result_array();
    }

    public function getProductsSelling($limit = 0, $start = -1)
    {
        $str = 'SELECT `p`.`id_product` AS `id_product`, `p`.`name_product` AS `name_product`, `p`.`price` AS `price`,'
            .' `p`.`descript` AS `descript`, `p`.`importDate` AS `importDate`, `p`.`count_view` AS `count_view`,'
            .' `p`.`image_link` AS `DuongDan`, `c`.`name_category` AS `name_category`, `p`.`discount` AS `discount`,'
            .' `p`.`count_buy` AS `count_buy`, `o`.`name_origin` AS `name_origin`, `p`.`size` AS `size`, `u`.`name_unit` AS `name_unit`'
            .' FROM (((`products` `p` JOIN `categories` `c`) JOIN `origins` `o`) JOIN `units` `u`)'
            .' WHERE ((`p`.`id_category` = `c`.`id_category`) AND (`p`.`id_origin` = `o`.`id`) AND (`p`.`id_unit` = `u`.`id_unit`))'
            .' ORDER BY `p`.`count_buy` DESC , `p`.`count_view` DESC';
        if ($limit !== 0 && $start != -1) {
            $str = $str.' LIMIT '. $start . ', ' . $limit;
        } else if ($limit != 0) {
            $str = $str.' LIMIT '. $limit;
        }
        $query = $this->db->query($str);

        return $query->result_array();
    }

    public function getProductsWithName($name, $limit = 0, $start = -1)
    {
        $query = "SELECT p.id_product, p.name_product, p.price, p.descript, p.importDate, p.count_view, p.image_link As DuongDan, c.name_category, p.discount, p.count_buy, o.name_origin, p.size, u.name_unit
            FROM products As p, categories As c, units As u, origins As o
            WHERE p.id_category = c.id_category And p.id_origin = o.id And p.id_unit = u.id_unit And UPPER(p.name_product) Like Binary UPPER('%".$name."%')";
        if ($limit !== 0 && $start != -1) {
            $query = $query.' LIMIT '. $start . ', ' . $limit;
        } else if ($limit != 0) {
            $query = $query.' LIMIT '. $limit;
        }
        $result = $this->db->query($query);

        return $result->result_array();
    }

    /**
     * Get all products within a limited range.
     *
     * @return array
     */
    public function getAllProducts($limit = -1, $start = 0)
    {
        if (-1 !== $limit) {
            $this->db->limit($limit, $start);
        }
        $query = $this->db->get('products');

        return $query->result_array();
    }

    public function SaveProduct($name_product, $price, $descript, $importDate, $image_link, $id_category, $discount, $id_origin, $size, $id_unit)
    {
        $this->db->trans_start();
        $strsave = 'insert into products(name_product,price,descript,importDate,count_view,image_link,id_category,discount,count_buy,id_origin,size,id_unit) '.
            "values('".$name_product."', ".$price.",'".$descript."','".$importDate."',0,'".$image_link."',".$id_category.','.$discount.',0,'.$id_origin.",'".$size."',".$id_unit.')';
        $strgetid = "select id_product from products where name_product='".$name_product."' limit 1";
        $this->db->query($strsave);
        $query = $this->db->query($strgetid)->row();
        $this->db->trans_complete();
        if ($query === null) {
            return null;
        }

        return $query->id_product;
    }

    public function UpdateProduct($id_product, $name_product, $price, $descript, $image_link, $id_category, $discount, $id_origin, $size, $id_unit)
    {
        $strsave = "update products set name_product='".$name_product."', price=".$price.",descript='".$descript."' ,image_link='".$image_link."',id_category=".$id_category.',discount='.$discount.',id_origin='.$id_origin.",size='".$size."',id_unit=".$id_unit.''.
            ' where id_product='.$id_product.';';
        $this->db->query($strsave);
    }

    public function DeleteProduct($id_product)
    {
        $strdelete = 'delete from products where id_product='.$id_product.';';
        $this->db->query($strdelete);
    }

    public function getTotal($id_category = -1, $query = null) 
    {
        if (-1 != $id_category) {
            $this->db->where('id_category', $id_category);
        } else if (null != $query) {
            $this->db->like('name_product', $query);
        }
        return $this->db->count_all_results('products');
    }

    public function FindProduct($id, $name, $theloai)
    {
        $query = 'SELECT *from products where 1=1';
        if ($id !== '') {
            $query .= (' && id_product = '.$id);
        }
        if ($name !== '') {
            $query .= (" && name_product = '".$name."'");
        }
        if ($theloai !== '' && $theloai !== '0') {
            $query .= (' && id_category = '.$theloai);
        }
        $str = $this->db->query($query);

        return $str->result_array();
    }

    public function getProductName($id_product)
    {
        $sql = 'SELECT name_product from products where id_product = '.$id_product;
        $result = $this->db->query($sql);

        return $result->result_array();
    }
}
