<?php 	

	class ItemView extends Controller
	{
		
		public function index($productID)
		{
			$this->productModel = $this->model('productModel');

			$data = [
				'title'   => 'Item View',
				'product' => $this->productModel->getProduct($productID)
			];

			$this->view('pages/itemview' , $data);
		}
	}