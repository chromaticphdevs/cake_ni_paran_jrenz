<?php 	

	class User extends Controller
	{
		public function __construct()
		{
			$this->userModel = $this->model('userModel');
		}

		public function login()
		{
			if($this->request() === 'POST')
			{
				$res = $this->userModel->login($_POST);

				if(is_array($res))
				{	
					Flash::set(implode($res['errors']) , 'negative');
					redirect('pages/login');
				}
			}else
			{
				redirect('pages/login');
			}
		}
		public function register()
		{
			if($this->request() === 'POST')
			{
				$res = $this->userModel->register($_POST);

				if(is_array($res))
				{
					Flash::set(implode(',',$res['errors']) , 'negative');

					redirect('pages/register');
				}
			}else{

				$this->view('pages/register');
			}
		}

		public function changePassword()
		{
			if($this->request() === 'POST')
			{
				$this->userModel->changePassword($_POST['password']);
			}
		}
		public function logout()
		{
			session_destroy();

			redirect('pages/login');
		}
	}