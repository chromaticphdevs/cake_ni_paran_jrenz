<?php 	

	class Recover extends Controller
	{
		public function __construct()
		{
			$this->recoverModel = $this->model('recoverModel');
		}
		public function forgetPassword()
		{
			$data =[
				'title' => 'Recover Account'
			];
			$this->view('recover/forgetpassword' , $data);
		}


		public function fireForgetPassword()
		{
			if($this->request() === 'POST')
			{
				$userModel = $this->model('userModel');

				$this->recoverModel->fireRequestPassword($_POST['email'] , $userModel);	
			}
		}

		public function forgetPasswordConfirmed()
		{
			if(isset($_GET['token'] , $_GET['ID']))
			{
				$requestid = $_GET['ID'];
				$rs = $this->recoverModel->updatePassword($requestid);


				var_dump($rs);
			}else{
				echo "HH?";
			}
		}
	}