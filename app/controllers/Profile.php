<?php 	

	class Profile extends Controller
	{
		public function __construct()
		{
			if(!Session::check('user')){
				redirect('user/login');
				return;
			}
		}
		

		public function index()
		{
			$data = [
				'title' => 'Profile'
			];
			
			$this->view('profile/index' , $data); 
		}
	}