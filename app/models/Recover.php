<?php 	

	class Recover extends Base_model
	{
		public function fireRequestPassword($email , $userModel)
		{

			$user = $userModel->getByEmail($email);

			if(empty($user))
			{	
				Flash::set("No user with email '{$user->email}'");

				redirect('recover/forgetpassword');
			}else{

				$token = random_gen();

				$this->db->query(
					"INSERT INTO forget_pwd_request(token , userid , email_used , is_active)
					VALUES('$token' , '$user->id' , '$email' , true)";
				);

				if($insertid = $this->db->insert()){

					$link = URL.DS."recover/changePassword/?token=$token&ID=$insertid";

					// mailRequestPassword($email , $link);
				}
			}
			
		}

		private function 
	}