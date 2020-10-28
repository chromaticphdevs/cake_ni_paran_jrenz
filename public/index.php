<?php
	
	$root = dirname(dirname(__FILE__));

	//config
	require_once($root.'/app/config/config.php');

	//environment
	require_once($root.'/app/config/environment.php');
	require_once($root.'/app/config/theme.php');

	//autoloader
	require_once($root.'/app/autoload.php');

	$bootstrap = new Bootstrap();
?>