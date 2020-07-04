<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		validateSession();
		$this->load->model('BangTin_Model');
		$this->load->model('Product_Model');
		$this->load->model('Category_Model');
		$result = $this->BangTin_Model->getAllBangTin();
		$categories = $this->Category_Model->getCategories();
		$sellingProducts = $this->Product_Model->getProductsSelling(4);
		$classifiedProducts = $this->listAllProduct();
		$this->load->view('Home', [
			'bangTin' => $result, 
			'sellingProducts' => $sellingProducts,
			'products' => $classifiedProducts,
			'categories' => $categories,
			'page' => 'Home'
		]);
	}

	public function policy() {
		validateSession();
		$this->load->view('Policy', ["page" => "Policy"]);
	}

	private function listAllProduct($limitItem = 4) {
		$result = array();
		$this->load->model('Category_Model');
		$categories = $this->Category_Model->getCategories();
		foreach ($categories as $category) {
			$products = array(
				"id_category" => $category["id_category"], 
				"name_category" => $category["name_category"]
			);
			$products["items"] = $this->Product_Model->getProductOfCategory($category["id_category"], $limitItem);
			array_push($result, $products);
		}
		return $result;
	}
}
