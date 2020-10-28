<?php 	

	class ReportModel extends Base_model
	{

		public function getReport($start , $end)
		{
			$particulars  = $this->getParticulars($start, $end);
			$totalAmount  = $this->getAmoutTotal($particulars);

			if(empty($particulars))
			{	
				Flash::set("No report found on {$start} to {$end}" , 'negative');
				redirect('report/');
				return;
			}
			return [
				'detail' => [
					'company' => SITE_NAME,
					'start'   => $start ,
					'end'     => $end
				],

				'particulars' => $this->getParticulars($start , $end),
				'totalAmount' => $totalAmount
			];
		}


		private function getParticulars($start , $end)
		{
			$sql = "SELECT name, flavor, sum(oi.quantity) as total_quantity , 
			sum(oi.price * oi.quantity) as total_price 
			from orders as o 
			left join order_items as oi 
			on o.id = oi.orderid 

			left join cakes 
			on cakes.id = oi.productid

			where date(date) between CAST('$start' as date) and CAST('$end' as date)

			group by oi.productid";

			$this->db->query($sql);

			return $this->db->resultSet();
		}

		private function getAmoutTotal($particulars)
		{
			$total = 0;
			foreach($particulars as $particular)
			{
				$total += $particular->total_price;
			}

			return $total;
		}
	}