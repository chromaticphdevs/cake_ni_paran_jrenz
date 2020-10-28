<?php 	


	class CakeCategory extends Controller
	{
		public function __construct()
		{
			$this->cakeCategoryModel = $this->model('CakeCategoryModel');
		}
		public function create()
		{
			isAllowed(['admin']) or notAuthorized();
			if($this->request() === 'POST')
			{
				$res = $this->cakeCategoryModel->create($_POST , $_FILES['image']);
			}

			$data = [
				'title'   => 'Cake Category',
			];

			$this->view('cake_category/create' , $data);
		}

		public function list()
		{
			isAllowed(['admin']) or notAuthorized();
			$data = [
				'title' => 'Cake Category List',	
				'cakeCategory' => $this->cakeCategoryModel->getList()
			];

			$this->view('cake_category/list' , $data);
		}

		public function edit($catID)
		{
			isAllowed(['admin']) or notAuthorized();
			$data = 
			[
				'title'    => 'Cake Category Edit',
				'category' => $this->cakeCategoryModel->preview($catID),
				'catId'    => $catID
			];


			$this->view('cake_category/edit' , $data);
		}

		public function update()
		{
			$this->cakeCategoryModel->update($_POST);
		}

		public function updateImage()
		{
			$this->cakeCategoryModel->updateImage($_POST['categoryid'] , $_FILES['image']);
		}
	}