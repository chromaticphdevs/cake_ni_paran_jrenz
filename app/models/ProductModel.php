<?php 

	class ProductModel extends Base_model
	{
		private $table_name = 'cakes';

		public function getProduct($productID)
		{
			$this->db->query("SELECT cake.* , catName 
				FROM $this->table_name as cake
				left join cakecategory as cat 
				on cake.categoryid = cat.id
				where cake.id = '$productID'");

			return $this->db->single();
		}
	}