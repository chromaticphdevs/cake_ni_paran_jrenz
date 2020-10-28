<?php 	

	class Billing extends Controller
	{
		public function index()
		{
			$this->cartModel = $this->model('cartModel');

			$userInfo = '';

			if(Session::check('user'))
			{
				$userInfo = Session::get('user');
			}
			
			$data = [
				'title' => 'Billing',
				'cartItemList' => $this->cartModel->getOnCart(),
				'cartAmountTotal' => $this->cartModel->getAmountTotal(),
				'user'       => $userInfo
			];

			$this->view('billing/index' , $data);
		}

		public function checkout()
		{
			$this->checkModel = $this->model('checkoutModel');

			if($this->request() === 'POST')
			{
				$this->checkModel->doCheckOut($_POST);
			}
		}
	}