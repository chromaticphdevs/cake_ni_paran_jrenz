<?php 	

	class CartModel extends Base_model
	{
		private $maxQuantity = 3;

		private $maxItem     = 3;

		public function init(){

			Session::set('cart' , random_gen());

			return Session::get('cart');
		}

		public function addItem($productid , $quantity)
		{
			$token = Session::get('cart') ?? $this->init();

			$totalItem = $this->checkTotalItems();

			if($totalItem > $this->maxItem)
			{
				Flash::set("Maximum Cake order is '{$this->maxItem}'" , 'negative');
				redirect('itemView/'.$productid);
			}
			else
			{
				if($quantity > $this->maxQuantity)
				{
					Flash::set('Max Order Quantity is 3 per item' , 'negative');
					redirect('itemView/'.$productid);
				}
				else
				{
					if($itemid = $this->checkIfItemExists($productid))
					{
						Flash::set('Item is already on your cart.' , 'teal');
						redirect('billing');
					}else
					{
						$sql = "INSERT INTO carts(token , productid , quantity) 
						VALUES('$token' , '$productid' , '$quantity')";

						$this->db->query($sql);

						if($this->db->execute())
						{
							Flash::set('Item Added');
						}
						redirect('billing');
					}
				}
			}

			
		}

		//check numberofItems





		public function updateItem($itemid , $quantity)
		{
			//check quantity

			if($quantity > $this->maxQuantity)
			{
				Flash::set("Maximum of '{$this->maxQuantity}' quantity per cake" , 'negative');
			}
			else
			{
				$this->db->query("UPDATE carts set quantity = '$quantity' where id = '$itemid'");

				if($this->db->execute())
				{
					Flash::set('Cart Item updated!');
				}	
			}
			redirect('billing');
			
		}

		public function removeItem($itemid)
		{
			$this->db->query("DELETE FROM carts where id  = '$itemid'");
			if($this->db->execute())
			{
				Flash::set('Cart Item removed!');
				redirect('billing');
			}
		}
		public function getOnCart()
		{
			$session = Session::get('cart');

			$sql = "SELECT ci.id as itemid , name , flavor , duration , cakeDesc , price , cake.image as image , catName ,
			quantity 

			from carts as ci
			left join cakes as cake  on 
			ci.productid = cake.id 
			left join cakecategory as cc 
			on cc.id = cake.categoryid

			where token = '$session'
			";

			$this->db->query($sql);

			return $this->db->resultSet();
		}

		public function getAmountTotal()
		{
			$session = Session::get('cart');

			$sql = "SELECT SUM(c.price * ci.quantity) as total_amount from carts as ci 
			left join cakes as c 
			on c.id = ci.productid 
			where token = '$session' 
			group by token";

			$this->db->query($sql);

			$res = $this->db->single();;

			if($res)
				return $res->total_amount;
			return 0;
		}
		private function checkIfItemExists($productid)
		{
			$session = Session::get('cart');

			$sql = "SELECT * FROM carts where productid = '$productid' and token = '$session'";

			$this->db->query($sql);

			$res = $this->db->single();

			if($res)
				return $res->id;
			return 0;
		}

		private function checkTotalItems()
		{
			$session = Session::get('cart');

			$sql = "SELECT count(id) + 1 as totalItem from carts where token = '$session'";

			$this->db->query($sql);

			$res = $this->db->single();

			if($res)
				return $res->totalItem;
			return 0;
		}
	}