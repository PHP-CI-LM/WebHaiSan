<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BangTin_Model extends CI_Model {

    public function getAllBangTin() {
        $query = $this->db->get('banners');
		return $query->result_array();
    }
}