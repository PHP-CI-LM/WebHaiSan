<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Filter_Comment extends CI_Model
{
    public function get_filter_comment()
    {
        $query = $this->db->get('filter_comment');
        return $query->result_array();
    }

    public function getFilter($id = null, $key_word = null)
    {
        if ($id != null) {
            $this->db->where('id', $id);
        } else if ($key_word != null) {
            $this->db->where('key_word', $key_word);
        }
        $query = $this->db->get('filter_comment');
        return $query->result_array();
    }

    public function addFilter($filter)
    {
        $data = [
            "key_word" => $filter
        ];
        $this->db->insert('filter_comment', $data);
        return $this->db->affected_rows();
    }

    public function removeFilter($idFilter)
    {
        $this->db->where('id', $idFilter);
        $this->db->delete('filter_comment');
        return $this->db->affected_rows();
    }

    public function isExist($id_filter = null, $filter = null)
    {
        if ($id_filter != null) {
            $this->db->where('id', $filter);
        } else if ($filter != null) {
            $this->db->where('key_word', $filter);
        }
        $this->db->from('filter_comment');
        return $this->db->count_all_results() > 0;
    }
}
