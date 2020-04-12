<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Comment_Model extends CI_Model
{
    public function getComment($idProduct, $idAccount = null)
    {
        $query = "";
        if ($idAccount == null) {
            $query = "SELECT c.id, a.avatar, ct.CustomerName as name, c.comment_time as time, c.content, c.id_reply 
                        FROM comments as c JOIN accounts as a ON c.id_account = a.AccountID JOIN customers as ct ON ct.CustomerID = c.id_account 
                        WHERE c.id_product = ". $idProduct;
        } else {
            $query = "SELECT c.id, a.avatar, ct.CustomerName as name, c.comment_time as time, c.content, c.id_reply 
                        FROM comments as c JOIN accounts as a ON c.id_account = a.AccountID JOIN customers as ct ON ct.CustomerID = c.id_account 
                        WHERE id_product = " . $idProduct . " And c.id_account = " . $idAccount;
        }
        $result = $this->db->query($query);
        return $result->result_array();
    }

    public function addComment($idProduct, $idAccount = -1, $content, $time, $idReply = -1)
    {
        $this->db->query(
            "INSERT INTO comments(id_account, id_product, comment_time, content, id_reply)" .
                "VALUES(" . $idAccount . ", " . $idProduct . ", '" . $time . "', '" . $content . "', " . $idReply . ")"
        );
    }
}
