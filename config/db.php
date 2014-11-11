<?php

	/**
	* Bella - The full SOA E-commerce Platform
	* @copyright https://github.com/rafaelfranco/bella
	* @author Rafael Franco | rafaelfranco@me.com - 11/11/14
	**/


#development
if($_SERVER['HTTP_HOST'] == DEVEVOPMENT_URL) {
	$dsn = array(
	    'phptype'  => 'mysql',
	    'username' => 'root',
	    'password' => '979899',
	    'hostspec' => 'localhost',
	    'database' => 'bella',
	);
}

#tests
if($_SERVER['HTTP_HOST'] == TEST_URL) {
	$dsn = array(
	    'phptype'  => 'mysql',
	    'username' => 'root',
	    'password' => '979899',
	    'hostspec' => '127.0.0.1',
	    'database' => 'bella',
	);
}

#production
if(in_array($_SERVER['HTTP_HOST'],$PRODUCTION_URLS)) {
	$dsn = array(
	    'phptype'  => 'mysql',
	    'username' => 'root',
	    'password' => '979899',
	    'hostspec' => '127.0.0.1',
	    'database' => 'bella',
	);
} 

$options = array(
        'debug'       => 2,
        'portability' => MDB2_PORTABILITY_ALL,
);
    
$mdb2 =& MDB2::connect($dsn, $options);
if (PEAR::isError($mdb2)) {
    die('error:'.$mdb2->getMessage());
}