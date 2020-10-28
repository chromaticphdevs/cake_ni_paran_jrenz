<?php 	

	class CakeModel extends Base_model
	{
		private $table_name = 'cakes';

		public function create($data , $image)
		{

			extract($data);

			$imageName = $this->addImage($image);

			$this->db->query("INSERT INTO $this->table_name(name,flavor,duration,cakeDesc,price,availability,image,categoryid) 
				VALUES('$name' ,'$flavor' , '$duration' , '$desc' , '$price' , 'available' , '$imageName','$category')");

			if($insertId = $this->db->insert())
			{
				Flash::set("'{$name}' has been created!");
			}
			redirect('cake/edit/'.$insertId);
			
		}


		private function addImage($image)
		{
			$file = new File();

			$file->setFile($image)
			->setPrefix('cake')
			->setDIR(BASE_DIR.DS.'public/assets')
			->upload();

			if($file->errors())
			{
				return false;
			}else
			{
				return $file->getNewName();
			}
		}


		public function get_list($param = null)
		{
			
			$this->db->query("SELECT cake.* , catName , cat.id as catid
				FROM $this->table_name as cake
				left join cakecategory as cat 
				on cake.categoryid = cat.id 
				$param");

			return $this->db->resultSet();

		}


		public function preview($cakeid)
		{
			$this->db->query("SELECT cake.* , catName , cat.id as catid
				FROM $this->table_name as cake
				left join cakecategory as cat 
				on cake.categoryid = cat.id 
				WHERE cake.id = '$cakeid'");

			return $this->db->single();

		}


		public function updateGeneral($cakeInfo)
		{
			extract($cakeInfo);

			$this->db->query("UPDATE $this->table_name set 
				name = '$name' , categoryid = '$category' ,
				flavor = '$flavor' , duration = '$duration' ,
				cakeDesc = '$cakeDesc' , price = '$price'
				WHERE id = '$cakeid'");

			if($this->db->execute())
			{
				Flash::set('Updated Success fully');
			}
			redirect('cake/edit/'.$cakeid);
		}

		public function updateImage($cakeid , $image)
		{
			$imageName = $this->addImage($image);

			$this->db->query(
				"UPDATE $this->table_name set image = '$imageName' where id = '$cakeid'"
			);

			if($this->db->execute())
			{
				Flash::set('Image updated');
			}
			redirect('cake/edit/'.$cakeid);
		}
	}