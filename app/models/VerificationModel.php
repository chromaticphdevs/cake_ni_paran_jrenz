<?php 	

	class VerificationModel extends Base_model
	{
		public function verify($accountID)
		{
			$this->db->query(
				"UPDATE users set is_verified = 'true' 
				where id = '$accountID'"
			);

			if($this->db->execute())
			{
				Flash::set('Account verified!');
				redirect('pages/login');
			}
		}
	}