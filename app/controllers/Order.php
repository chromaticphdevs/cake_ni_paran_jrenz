<?php 	

	class Order extends Controller
	{
		public function __construct()
		{
			$this->orderModel = $this->model('OrderModel');
		}

		public function process()
		{
			if($this->request() === 'POST')
			{
				$orderid = $_POST['orderid'];

				if(isset($_POST['accept']))
				{
					$this->orderModel->acceptOrder($orderid);
				}

				if(isset($_POST['deliver']))
				{
					$this->orderModel->deliverOrder($orderid);
				}

				if(isset($_POST['sold']))
				{
					$this->orderModel->soldOrder($orderid);
				}

				if(isset($_POST['cancel']))
				{
					$this->orderModel->cancelOrder($orderid);
				}
				if(isset($_POST['decline']))
				{
					$this->orderModel->declineOrder($orderid);
				}
			}
		}
		public function list()
		{	
			isAllowed(['admin', 'client']) or notAuthorized();
			$params = '';

			$user = Session::get('user');

			if($user->type == 'admin')
			{
				if(isset($_GET['status']))
				{
					$status = strtolower(trim($_GET['status']));

					$params = " WHERE orders.status = '{$status}'";

				}
				$data = [
					'title' => 'Order',
					'orderList' => $this->orderModel->getList($params)
				];

				$this->view('order/list' , $data);
			}else
			{
				$userid = $user->id;

				$params = " WHERE userid = '$userid'";

				if(isset($_GET['status']))
				{
					$status = strtolower(trim($_GET['status']));

					$params = " WHERE orders.status = '{$status}' and userid = '$userid'";

				}
				$data = [
					'title' => 'Order',
					'orderList' => $this->orderModel->getList($params)
				];

				$this->view('user/history' , $data);
			}
			
		}

		public function preview($orderid)
		{
			isAllowed(['admin', 'client']) or notAuthorized();
			$user = Session::get('user');

			$data =[
				'title' => 'Order Preview',
				'order'  => $this->orderModel->getOrder($orderid)
			];

			if($user->type == 'admin')
			{
				$this->view('order/view' , $data);
			}else
			{
				$this->view('user/orderpreview' , $data);
			}
			
		}
	}