<?php
	define('DS', DIRECTORY_SEPARATOR); 	
	//application root
	define('APPROOT' , dirname(dirname(__FILE__)));
	//core root
	define('CORE' , APPROOT.DS.'core');
	//models
	define('MODELS' , APPROOT.DS.'models');
	//views
	define('VIEWS' , APPROOT.DS.'views');
	//controllers
	define('CNTLRS' , APPROOT.DS.'controllers');
	//helpers root
	define('HELPERS', APPROOT.DS.'helpers');
	//library
	define('LIBS' , APPROOT.DS.'libraries');
	//funtions
	define('FNCTNS' ,  APPROOT.DS.'functions');

	//base controller

	define('BASECONTROLLER' , 'Pages');

	define('BASEMETHOD' , 'index');

	//others

	/*UPLOAD ROOT*/
	define('BASE_DIR', dirname(dirname(dirname(__FILE__))));
	
	define('SITE_NAME', 'Cake');

	const MAILER_AUTH = [
		'username' => 'goodfum1@cakes-sweet.com'
	];