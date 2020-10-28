<?php 	

	class Mapper extends Controller
	{
		public function notAuthorized()
		{
			$this->view('mapper/unauthorize');
		}
	}