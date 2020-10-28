<?php 

	session_start();
	
	spl_autoload_register(function($class) {

		$file = null;

		if(file_exists(CORE.DS.$class.'.php'))
		{
			$file = CORE.DS.$class.'.php';
		}
		
		else if (file_exists(CNTLRS.DS.$class.'.php'))
		{
			$file = CNTLRS.DS.$class.'.php';
		}
		else if (file_exists(MODELS.DS.$class.'.php'))
		{
			$file = MODELS.DS.$class.'.php';
		}
		else if (file_exists(LIBS.DS.$class.'.php'))
		{
			$file = LIBS.DS.$class.'.php';
		}

		else if (file_exists(HELPERS.DS.$class.'.php'))
		{
			$file = HELPERS.DS.$class.'.php';
		}

		require_once $file;
	});

	//** load your functions here *//

	require_once FNCTNS.DS.'url_helper.php';
	require_once FNCTNS.DS.'debug_helper.php';
	require_once FNCTNS.DS.'token.php';
	require_once FNCTNS.DS.'html_parsers.php';
	require_once FNCTNS.DS.'mailer.php';
