<?php 	

	class Cake extends Controller
	{

		public function __construct()
		{
			$this->cakeModel = $this->model('cakeModel');
		}
		public function create()
		{	

			isAllowed(['admin']) or notAuthorized();

			$this->cakeCategoryModel = $this->model('cakeCategoryModel');
			
			$data = [
				'title' => 'Cake Create' , 
				'categoryList' => $this->cakeCategoryModel->getList()
			];

			if($this->request() === 'POST')
			{
				//check if file error
				if($_FILES['image']['error'])
				{
					Flash::set('Error found on cake image' ,'red');
					$this->view('cake/create' , $data);
				}else
				{
					$this->cakeModel->create($_POST , $_FILES['image']);
				}
			}else
			{
				$this->view('cake/create' , $data);
			}
		}

		public function list()
		{
			isAllowed(['admin']) or notAuthorized();

			$param = null;

			$data = 
			[
				'title' => 'Cake List' , 
				'cakeList' => $this->cakeModel->get_list($param)
			];


			$this->view('/cake/list' , $data);
		}

		public function preview($cakeid)
		{
			isAllowed(['admin']) or notAuthorized();

			$data = [
				'title' => 'Cake View',
				'cake'  => $this->cakeModel->preview($cakeid)
			];


			$this->view('cake/preview' , $data);
		}

		public function edit($cakeid)
		{
			isAllowed(['admin']) or notAuthorized();
			
			$this->cakeCategoryModel = $this->model('cakeCategoryModel');
			$data =
			[
				'title' => 'Cake Edit',
				'cake' => $this->cakeModel->preview($cakeid),
				'categoryList' => $this->cakeCategoryModel->getList(),
				'cakeid'      => $cakeid

			];
			$this->view('cake/edit' , $data);
		}

		public function updateGeneral()
		{
			if($this->request() === 'POST')
			{
				$this->cakeModel->updateGeneral($_POST);
			}
		}

		public function updateImage()
		{
			if($this->request() === 'POST')
			{
				$this->cakeModel->updateImage($_POST['cakeid'] , $_FILES['image']);
			}
		}
	}