<?php 	

	class UserModel extends Base_model
	{
		private $table_name = 'users';

		public function register($userInfo)
		{
			$errors = array();
			extract($userInfo);

			//checks
			if(strlen($username) < 5){
				$errors[] = 'Username must atleast 5 characters';
			} 

			if(strlen($userpass) < 4){
				$errors[] = 'Password must atleast 5 characters';
			}

			if(!empty($errors)){
				return [
					'errors' => $errors,
					'fields' => $userInfo
				];
			}else
			{
				$userpass = password_hash($userpass, PASSWORD_DEFAULT);

				$this->db->query(
					"INSERT INTO $this->table_name(fname , lname , email , phone , address , username , userpass)
					VALUES('$fname' , '$lname' ,'$email' , '$phone' , '$address' , '$username' ,'$userpass')"
				);

				if($accountid = $this->db->insert()){

					Flash::set("Account Verification was sent to your email '{$email}'" , 'teal');

					$link = URL.DS."verification/verifyAccount/?accountID=$accountid";

					mailVerifyAccount($email , $link);

					redirect('pages/login');

					return true;
				}else{
					return [
						'errors' => $errors,
						'fields' => $userInfo
					];
				}
			}
		}

		public function login($logins)
		{
			extract($logins);

			$res = $this->getByUserName($username);
			
			if(!empty($res))
			{
				if(password_verify($password, $res->userpass)){
					Flash::set('Logged in successful');

					Session::set('user',$res);

					if($res->type == 'admin')
					{
						Flash::set('Welcome back admin!' , 'positive');
						redirect('admin/index');
					}else
					{
						Flash::set("Welcome back {$res->username} ", 'positive');
						redirect('profile');
					}

					return true;
				}else{
					Flash::set('Password unmatched' , 'negative');
					redirect('pages/login');
					return false;
				}
			}else{
				Flash::set('No Account Found' , 'negative');
				redirect('pages/login');
				return false;
			}
		}

		public function changePassword($password)
		{
			$user = Session::get('user');

			if(strlen($password) > 4)
			{
				$password = password_hash($password, PASSWORD_DEFAULT);

				$this->db->query("UPDATE users set userpass = '$password' where id = '$user->id'");

				if($this->db->execute()){
					Flash::set('user password updated!' , 'positive');
				}
			}else
			{
				Flash::set("Password length must atleast '4' characters long");
			}
			redirect('profile');
		}

		public function getByUserName($username)
		{
			$this->db->query(
				"SELECT * , concat(fname , ' ' ,lname) as fullname FROM users where username = '$username'"
			);

			return $this->db->single();
		}

		public function getByEmail($email)
		{
			$this->db->query(
				"SELECT * , concat(fname , ' ' ,lname) as fullname FROM users where email = '$email'"
			);

			return $this->db->single();
		}


		public function getList()
		{
			$this->db->query(
				"SELECT * , concat(fname , ' ' , lname) as fullname FROM users"
			);
			return $this->db->resultSet();
		}

		public function getUser($userid)
		{
			$this->db->query(
				"SELECT * , concat(fname , ' ' , lname) as fullname  FROM users where id = '$userid'"
			);

			return $this->db->single();
		}
	}