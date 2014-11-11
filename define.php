<?php 

	/**
	* Bella - The full SOA E-commerce Platform
	* @copyright https://github.com/rafaelfranco/bella
	* @author Rafael Franco | rafaelfranco@me.com - 11/11/14
	**/

	#start session
	session_start();	

	#import envinroment configs
	include 'config/envinroments.php';

	$uri = explode('?',$_SERVER['REQUEST_URI']);
	$_SERVER['REQUEST_URI'] = $uri[0];

	#define SimplePhp Framework Path - To get SIMPLEPHP - https://github.com/rafaelfranco/SimplePHP
	if($_SERVER['HTTP_HOST'] == DEVEVOPMENT_URL) {
		define('SIMPLEPHP_PATH', '/Users/rafaelfranco/Sites/SimplePHP/');
	}
	
	if($_SERVER['HTTP_HOST'] == TEST_URL) {
		define('SIMPLEPHP_PATH', '/var/www/SimplePHP/');
	}

	if(in_array($_SERVER['HTTP_HOST'],$PRODUCTION_URLS)) {
		define('SIMPLEPHP_PATH', '/var/www/SimplePHP/');
	}

	#import libraries - Use only if your server doesn't have MDB2 installed
	include SIMPLEPHP_PATH.'app/code/libs/MDB2.php';

	#init database connections
	include 'config/db.php';
	
	#include SimplePhp
	require SIMPLEPHP_PATH.'SimplePHP.php';

?>