<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cookie_Cart
{

    /**
     * Get list product from cookies
     */
    public function getProducts()
    {
        $count = get_cookie("countProduct");
        $cookieName = "product";
        $products = array();
        for ($i = 1; $count > 0; $i++) {
            $product = get_cookie($cookieName . $i);
            if ($product !== null) {
                $product = array();
                $product["id"] = explode(":", explode("-", get_cookie($cookieName . $i))[0])[1];
                $product["amount"] =  explode(":", explode("-", get_cookie($cookieName . $i))[1])[1];
                array_push($products, $product);
                $count--;
            }
        }
        if (sizeof($products) == 0) return null;
        return $products;
    }
}
