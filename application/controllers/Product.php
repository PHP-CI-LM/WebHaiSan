<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index($uri_product) {
        validateSession();
        $this->load->model('Product_Model');
        $this->load->model('Comment_Model');
        $id_product = (int)substr($uri_product, strlen($uri_product) - 5, 5);
        $product = (array)($this->Product_Model->getProductOfId($id_product));
        $similarProducts = $this->Product_Model->getSimilarProductWithoutId($id_product, 5);
        $comments = $this->Comment_Model->getComment($id_product);
        // Analys time in comment before send to user
        $sizeComments = sizeof($comments);
        for ($i = 0; $i < $sizeComments; $i++) {
            $comments[$i]['time'] = diff_time($comments[$i]['time']);
        }
        // var_dump($product);
        $this->load->view("Product", [
            "product"           => $product,
            "similarProducts"   => $similarProducts,
            "comments"          => $comments
        ]);
    }

    public function find() {
        validateSession();
        $products = array();
        if ($this->input->get("query") !== null) {
            $query = $this->security->xss_clean($this->input->get("query"));
            $this->load->model("Product_Model");
            $this->load->model("Category_Model");
            $count = sizeof($this->Product_Model->getProductsWithName($query));
            // Paginate page
            $limit_per_page = 8;
            $paging_links = generatePagingLinks($count, $limit_per_page, true);
            $start = 0;
            if (false != $this->input->get('page')) {
                $start = ($this->input->get('page') - 1) * $limit_per_page;
            }
            $products = $this->Product_Model->getProductsWithName($query, $limit_per_page, $start);
            $categories = $this->Category_Model->getCategories();
        }
        $this->load->view("Search", [
            "query"         => $query,
            "products"      => $products,
            "paging_links"  => $paging_links,
            "categories"    => $categories
        ]);
    }
}