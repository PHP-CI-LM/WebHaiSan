<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Filter_Comment extends CI_Model
{
    public function get_filter_comment()
    {
        $query = 'select * from filter_comment';
        $result = $this->db->query($query);
        $x = $result->result_array();

        return $x;
    }
}
