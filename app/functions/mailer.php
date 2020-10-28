<?php 	
	

	function mailRequestPassword($email , array $body)
	{

		extract($body);

		$body = "<div> 
		We recieve a request on our site '{$siteName}' 
		to  change your password. <br/>
		New Password : <strong> {$password} </strong>
		click the link <a href='{$link}'> {$link} </a> if you confirm</div>";

		$subject ="Forget Password";

		$mailer  = MailMakerNative::getInstance();

		$mailer->setSubject($subject)
		->setBody($body)
		->setReciever($email)
		->useHTMLHeader();

		try{
			$mailer->send();
		}catch(Exception $e)
		{
			die(var_dump($e->getMessage()));
		}
	}

	function mailVerifyAccount($email , $link)
	{
		$body = "<div> Confirm your registration by clicking the link <a href='{$link}'> {$link} </a> if you confirm</div>";

		$subject ="Account Verification";

		$mailer  = MailMakerNative::getInstance();

		$mailer->setSubject($subject)
		->setBody($body)
		->setReciever($email)
		->useHTMLHeader();

		try{
			$mailer->send();
		}catch(Exception $e)
		{
			die(var_dump($e->getMessage()));
		}
	}
?>