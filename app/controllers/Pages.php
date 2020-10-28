<?php 	

	class Pages extends Controller
	{
		public function index()
		{
			$this->landing();
		}
		public function landing()
		{
			$this->cakeCategoryModel = $this->model('CakeCategoryModel');
			/*SHOW PRODUCT CATEGORIES*/
			
			$data = [
				'title' => 'Welcome to ' . SITE_NAME,

				'categoryList' => $this->cakeCategoryModel->getList()
			];

			$this->view('pages/landing' , $data);
		}

		public function catalog()
		{	
			$this->cakeModel = $this->model('cakeModel');

			$category = $_GET['category'] ?? '';

			$data = [
				'title' => "Catalog {$category}",
				'cakeList' => $this->cakeModel->get_list(" WHERE cat.catName like '%$category%'")
			];

			$this->view('pages/catalog' , $data);
		}

		public function register()
		{
			$data = [
				'title' => 'Register Page'
			];
			if($this->request() === 'POST')
			{
				$res = $this->userModel->register($_POST);

				if(is_array($res))
				{

					Flash::set(implode(',',$res['errors']) , 'danger');

					$this->view('pages/register' , $res['fields'] , $data);
				}else{
					Flash::set('User successfully registered please validate your account by click the link sent to your email');
					redirect('user/login');
				}
			}else{

				$this->view('pages/register' , $data);
			}
		}

		public function login()
		{
			$data = [
				'title' => 'Login Page'
			];
			if($this->request() === 'POST')
			{
				$res = $this->userModel->login($_POST);

				if($res == false)
				{	
					$this->view('pages/login', $data);
				}else{
					redirect('user/profile');
				}
			}else
			{
				$this->view('pages/login', $data);
			}
		}
	}