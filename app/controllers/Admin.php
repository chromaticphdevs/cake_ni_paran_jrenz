<?php 	

	class Admin extends Controller
	{
		public function index()
		{
			isAllowed(['admin']) or notAuthorized();
			
			$data = [
				'title' => 'Admin Dashboard'
			];
			$this->view('admin/index' , $data);
		}
	}