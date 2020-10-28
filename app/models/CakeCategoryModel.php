<?php 	

	class CakeCategoryModel extends Base_model
	{
		private $table_name = 'cakecategory';

		public function create($data , $image)
		{

			extract($data);

			$imageName = 'defaultCategory.jpeg';

			if($imagePath= $this->addImage($image))
			{
				$imageName = $imagePath;
			}

			$this->db->query("INSERT INTO $this->table_name(catName,catDesc,image) VALUES('$name' , '$desc' , '$imageName')");

			if($insertId = $this->db->insert())
			{
				Flash::set("'{$name}' Cake Category has been successfully added" , 'positive');
			}

			redirect('cakeCategory/edit/'.$insertId);
		}


		public function updateImage($categoryid , $file)
		{
			if($imageName = $this->addImage($file))
			{
				$this->db->query("UPDATE $this->table_name set image = '$imageName' where id = '$categoryid'");

				if($this->db->execute())
				{
					Flash::set('Category Updated');
				}
			}
			redirect('cakeCategory/edit/'.$categoryid);
		}
		private function addImage($image)
		{
			$file = new File();

			$file->setFile($image)
			->setPrefix('cat')
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
		public function getList($param = null)
		{

			$this->db->query("SELECT * FROM $this->table_name as cat $param");

			return $this->db->resultSet();	

		}


		public function preview($catId)
		{


			$this->db->query("SELECT * FROM $this->table_name WHERE id = '$catId'");

			return $this->db->single();

		}

		public function update($data)
		{

			 extract($data);

			 $this->db->query("UPDATE $this->table_name SET catName = '$name' , catDesc = '$desc' WHERE id = '$categoryid'");

			 if($this->db->execute())
			 {
			 	Flash::set('Category Updated');
			 }

			 redirect('cakeCategory/edit/'.$categoryid);
		}

	}