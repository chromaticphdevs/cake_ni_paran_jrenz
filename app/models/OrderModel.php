<?php 	

	class OrderModel extends Base_model
	{
		private $table_name = 'orders';

		public function getList($params = null)
		{
			if($params == null)
			{
				$params = " ORDER BY id desc ";
			}

			$this->db->query(
				"SELECT id, customername as customerName , 
				deliverAddress , contactNumber , note , status , DATE_FORMAT(date,'%Y-%m-%d') as dateFormat

				from orders $params"
			);

			return $this->db->resultSet();
		}


		public function getOrder($orderid)
		{
			$this->db->query(
				"SELECT id, customername as customerName , 
				deliverAddress , contactNumber , note , status , DATE_FORMAT(date,'%Y-%m-%d') as dateFormat

				from orders where id = '$orderid'"
			);

			$orderDetails = $this->db->single();

			return [
				'details' => $orderDetails, 
				'items'   => $this->getOrderItems($orderid)
			];
		}
		private function getOrderItems($orderId)
		{
			$sql = "SELECT name, flavor , duration , cakeDesc , c.image as image ,
			oi.price as price , catName  , oi.quantity as quantity, 
			oi.quantity * oi.price as total 

			from order_items as oi 
			left join cakes as c 
			on c.id = oi.productid

			left join cakecategory as cc 

			on c.categoryid = cc.id 

			where oi.orderid = '$orderId'";


			$this->db->query($sql);

			return $this->db->resultSet();
		}

		public function acceptOrder($orderid)
		{
			$this->db->query(
				"UPDATE orders set status = 'accepted' where id = '$orderid'"
			);

			if($this->db->execute())
			{
				Flash::set('Order Accepted');
				redirect('order/preview/'.$orderid);
			}
		}

		public function deliverOrder($orderid)
		{
			$this->db->query(
				"UPDATE orders set status = 'delivered' where id = '$orderid'"
			);

			if($this->db->execute())
			{
				Flash::set('Order Delivered');
				redirect('order/preview/'.$orderid);
			}
		}

		public function soldOrder($orderid)
		{
			$this->db->query(
				"UPDATE orders set status = 'sold' where id = '$orderid'"
			);

			if($this->db->execute())
			{
				Flash::set('Order Sold');
				redirect('order/preview/'.$orderid);
			}
		}

		public function cancelOrder($orderid)
		{
			$this->db->query(
				"UPDATE orders set status = 'cancelled' where id = '$orderid'"
			);

			if($this->db->execute())
			{
				Flash::set('Order Declined');
				redirect('order/preview/'.$orderid);
			}
		}

		public function declineOrder($orderid)
		{
			$this->db->query(
				"UPDATE orders set status = 'declined' where id = '$orderid'"
			);

			if($this->db->execute())
			{
				Flash::set('Order Declined');
				redirect('order/preview/'.$orderid);
			}
		}
	}