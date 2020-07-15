<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Comment_Model extends CI_Model
{
    public function getComment($idProduct, $idAccount = null)
    {
        $query = '';
        if ($idAccount == null) {
            $query = 'SELECT c.id, ct.avatar, ct.CustomerName as name, c.comment_time as time, c.content, c.id_reply 
                        FROM comments as c JOIN accounts as a ON c.id_account = a.AccountID JOIN customers as ct ON ct.CustomerID = c.id_account 
                        WHERE c.id_product = '.$idProduct;
        } else {
            $query = 'SELECT c.id, ct.avatar, ct.CustomerName as name, c.comment_time as time, c.content, c.id_reply 
                        FROM comments as c JOIN accounts as a ON c.id_account = a.AccountID JOIN customers as ct ON ct.CustomerID = c.id_account 
                        WHERE id_product = '.$idProduct.' And c.id_account = '.$idAccount;
        }
        $result = $this->db->query($query);

        return $result->result_array();
    }

    /**
     * Get all comment within a limited range.
     *
     * @return array
     */
    public function getAllComments($limit = -1, $start = 0)
    {
        $this->db->select('comments.id, comments.id_account, comments.id_product, comments.comment_time, comments.content, comments.id_reply, accounts.UserName, products.name_product');
        $this->db->from('comments');
        $this->db->join('accounts', 'accounts.AccountID = comments.id_account');
        $this->db->join('products', 'products.id_product = comments.id_product');
        $this->db->order_by('comments.id');
        if (-1 !== $limit) {
            $this->db->limit($limit, $start);
        }
        $query = $this->db->get();

        return $query->result_array();
    }

    public function getListCommentForProcduct($idProduct)
    {
        $srt = 'SELECT comments.id, comments.id_account, comments.id_product, comments.comment_time, comments.content, comments.id_reply, accounts.UserName, products.name_product from comments, accounts, products where accounts.AccountID = id_account and id_reply IS NULL and id_product = '.$idProduct.' ORDER BY comment_time ASC';
        $result = $this->db->query($srt);

        return $result->result_array();
    }

    public function getListSubComment($id_Comment, $id_product)
    {
        $srt = 'SELECT comments.id, comments.id_account, comments.id_product, comments.comment_time, comments.content, comments.id_reply, accounts.UserName, products.name_product from comments, accounts, products where accounts.AccountID = id_account and id_reply = '.$id_Comment.' and id_product = '.$id_product.' and id_product = products.id_product ORDER BY comment_time ASC';
        $result = $this->db->query($srt);

        return $result->result_array();
    }

    public function addComment($idProduct, $idAccount = -1, $content, $time, $idReply = 'null')
    {
        $this->db->query(
            'INSERT INTO comments(id_account, id_product, comment_time, content, id_reply)'.
                'VALUES('.$idAccount.', '.$idProduct.", '".$time."', '".$content."', ".$idReply.')'
        );
    }

    public function editComment($id_Comment, $id_user, $content)
    {
        $query = "update comments set content ='".$content."' where id =".$id_Comment.' and id_account = '.$id_user;
        $this->db->query($query);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function removeComment($id_comment, $id_user)
    {
        $this->db->delete('comments', array('id' => $id_comment));
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
