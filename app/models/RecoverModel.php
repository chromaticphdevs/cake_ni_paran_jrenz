<?php 	

	class RecoverModel extends Base_model
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

				$password = randomNumber(4);

				$passwordHash = password_hash($password, PASSWORD_DEFAULT);

				$this->db->query(
					"INSERT INTO forget_pwd_request(token , userid ,password_hash , password_generated, email_used , is_active)
					VALUES('$token' , '$user->id' ,'$passwordHash','$password','$email' , true)"
				);

				if($insertid = $this->db->insert()){

					$link = URL.DS."recover/forgetPasswordConfirmed/?token=$token&ID=$insertid";

					mailRequestPassword($email , ['link' => $link , 'password' => $password]);

					Flash::set('Password reset link has been sent to your account' , 'teal');

					redirect('pages/login');
				}
			}
		}

		public function updatePassword($requestid)
		{
			$requestDetail = $this->getRequestPassword($requestid);

			$sql = "UPDATE users set userpass = '$requestDetail->password_hash' 
			where id = '$requestDetail->userid'";

			$this->db->query($sql);

			if($this->db->execute())
			{
				Flash::set('Password Updated!');
				redirect('pages/login');
			}else
			{
				Flash::set('SOMETHING HAPPENED' , 'danger');
				redirect('recover/forgetpassword');
				return false;
			}
		}

		private function getRequestPassword($requestid)
		{
			$sql = "SELECT * FROM forget_pwd_request where id = '$requestid'";

			$this->db->query($sql);

			return $this->db->single();
		}
	}