<?php 	
	
	//select your environment

	$env = 'local';

	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	
	//environment details
	switch($env){


		case 'local' :

			define('URL' , 'http://dev.cakeordering');
			
			define('DBVENDOR' , 'mysql');
			define('DBHOST' , 'localhost');
			define('DBUSER' , 'root');
			define('DBPASS' , '');
			define('DBNAME' , 'md_cakes');
				
		break;

		case 'dev' :

			define('URL' , 'https://kondokoportal.com');

			define('DBVENDOR' , 'mysql');
			define('DBHOST' , 'localhost');
			define('DBUSER' , 'root');
			define('DBPASS' , 'admin');
			define('DBNAME' , 'asdasdasdsad');	

		break;

		case 'live':

			define('URL' , 'http://cakes-sweet.com');

			define('DBVENDOR' , 'mysql');
			define('DBHOST' , 'localhost');
			define('DBUSER' , 'goodfum1_cake');
			define('DBPASS' , 'goodfum1_cake');
			define('DBNAME' , 'goodfum1_cake');	

		break;

		default:

		die("Invalid Environment");

	}