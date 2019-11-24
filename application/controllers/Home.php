<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->model('BangTin_Model');
		$this->load->model('Product_Model');
		$result = $this->BangTin_Model->getAllBangTin();
		$newProducts = $this->Product_Model->getProductsNew(4);
		$sellingProduct = $this->Product_Model->getProductsSelling(4);
		// var_dump($newProducts);
		$this->load->view('Home', [
			'bangTin' => $result, 
			'newProducts' => $newProducts,
			'sellingProducts' => $sellingProduct
		]);
	}
}
