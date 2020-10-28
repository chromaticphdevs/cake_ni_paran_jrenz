<?php 	

	class Cart extends Controller
	{

		public function __construct()
		{
			$this->cartModel = $this->model('cartModel');
		}
		public function addItem()
		{
			if($this->request() === 'POST')
			{
				$this->cartModel->addItem($_POST['productid'] , $_POST['quantity']);
			}
		}

		public function updateItem()
		{
			if($this->request() === 'POST')
			{
				if(isset($_POST['updateItem']))
				{
					$this->cartModel->updateItem($_POST['itemid'] , $_POST['quantity']);
				}

				if(isset($_POST['removeItem']))
				{
					$this->cartModel->removeItem($_POST['itemid']);
				}
			}
		}
	}