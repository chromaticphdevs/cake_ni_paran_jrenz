<?php 	

	class Verification extends Controller
	{

		public function __construct()
		{
			$this->verificationModel = $this->model('VerificationModel');
		}

		public function verifyAccount()
		{
			if(isset($_GET['accountID']))
			{
				$accountID = $_GET['accountID'];
				$this->verificationModel->verify($accountID);
			}
			
		}
	}