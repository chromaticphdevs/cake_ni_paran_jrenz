<?php 	

	function random_gen($length = 50){

		$bytes = random_bytes($length);

		return substr(bin2hex($bytes), 0 , $length);
	}
	
	function reference($initial = 'REF')
	{
		$bytes = random_bytes(12);
		$initial = substr($initial , 0 ,3);

		return strtoupper($initial.substr(bin2hex($bytes) , 0 , 9));
	}
	function to_number($number)
	{
		return number_format($number , 2);
	}

	function randomNumber($length = 5)
	{
		return substr(rand(1 , 1000000), 0 , $length);
	}
	function isAllowed($userTypeList)
	{
		$user = Session::get('user');

        if( in_array($user->type, $userTypeList) )
            return true;
        return false;
	}

	function notAuthorized()
	{
		redirect('mapper/notAuthorized');
	}