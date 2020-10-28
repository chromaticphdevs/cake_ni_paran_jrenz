<?php 	

	class CheckoutModel extends Base_model
	{
		public function doCheckout($billingInfo)
		{
			extract($billingInfo);

			$session = Session::get('cart');

			$status = 'pending';
			//check if there is user logged in
			$userid = $this->hasUser();

			//check if user exists
			$sql = "INSERT INTO orders(customername , deliverAddress , email , contactNumber , note , status, userid)
			VALUES('$customername' , '$deliverAddress' , '$email','$contactNumber' , '$note' , '$status' , '$userid')";

			$this->db->query($sql);

			if($orderid = $this->db->insert())
			{
				//insert order item

				$sql = "INSERT INTO order_items(orderid , productid , quantity , price)
				SELECT '$orderid' , productid , quantity , price 
				from carts left join 
				cakes on carts.productid = cakes.id 
				where token = '$session'";

				$this->db->query($sql);

				$this->db->execute();
					
				Session::remove('cart');
				//main the shit invoice
				Flash::set('Order Sent!');
				redirect('invoice/?id='.$orderid);
			}
		}

		private function hasUser()
		{
			if(Session::check('user'))
				return Session::get('user')->id;
			return 0;
		}
	}