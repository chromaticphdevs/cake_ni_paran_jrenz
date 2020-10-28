<?php 	

	class Invoice extends Controller
	{
		public function __construct()
		{
			$this->orderModel = $this->model('orderModel');
		}
		public function index()
		{
			$orderid = $_GET['id'];

			$data = [
				'title' => 'Order Invoice',
				'order' => $this->orderModel->getOrder($orderid)
			];

			$this->view('billing/invoice' , $data);
		}
	}