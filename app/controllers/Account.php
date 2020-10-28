<?php 	

	class Account extends Controller
	{

		public function __construct()
		{
			$this->userModel = $this->model('userModel');
		}
		public function list()
		{

			isAllowed(['admin']) or notAuthorized();

			$data = [
				'title' => 'Account List',
				'accountList' => $this->userModel->getList()
			];

			$this->view('account/list' , $data);
		}

		public function preview($userid)
		{
			isAllowed(['admin']) or notAuthorized();

			$data = [
				'title' => 'Account View',
				'user' => $this->userModel->getUser($userid)
			];

			$this->view('account/view' , $data);
		}
	}