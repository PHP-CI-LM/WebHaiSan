<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_Model extends CI_Model {

    public function getProductOfCategory($idCategory, $limit = 0) {
        $str = "SELECT b.MaSach, TenSach, GiaBan, MaTheLoai, MaNXB, MaTacGia, 
            MoTa, DanhGia, im.DuongDan From Books As b, Image As im 
            Where MaTheLoai='".$idCategory."' And im.MaSach=b.MaSach";
        if ($limit !== 0) $str = $str." LIMIT ".$limit;
        $query = $this->db->query($str);
        return $query->result_array();
    }

    public function getProductsSelling($limit = 0) {
        $str = "SELECT b.MaSach, SoLuong, TenSach, GiaBan, MaTheLoai, MaNXB, MaTacGia, MoTa, DanhGia, im.DuongDan
            FROM Books AS b JOIN (SELECT MaSach, COUNT(MaSach) As SoLuong From CT_HoaDon GROUP BY MaSach) AS c ON b.MaSach = c.MaSach JOIN 
            Image As im ON b.MaSach=im.MaSach";
        if ($limit !== 0) $str = $str." LIMIT ".$limit;
        $query = $this->db->query($str);
        return $query->result_array();
    }

    public function getProductsLiked($limit = 0) {
        $str = "SELECT b.MaSach, TenSach, GiaBan, MaTheLoai, MaNXB, MaTacGia, MoTa, DanhGia, im.DuongDan 
            From Books As b JOIN Image As im ON b.MaSach=im.MaSach ORDER BY DanhGia DESC";
        if ($limit !== 0) $str = $str." LIMIT ".$limit;
        $query = $this->db->query($str);
        return $query->result_array();
    }
}