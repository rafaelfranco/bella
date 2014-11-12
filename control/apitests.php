<?php
	
	/**
	* Bella - The full SOA E-commerce Platform
	* @copyright https://github.com/rafaelfranco/bella
	* @author Rafael Franco | rafaelfranco@me.com - 11/11/14
	**/

class apitests extends simplePHP {

	#initialize vars
	private $model;
	private $html;
	private $core;
	private $apiurl = 'http://bella/api/';

	public function __construct() {    
	    global $keys;

	    #load model module
	    $this->model = $this->loadModule('model');

	    #load html module
	    $this->html = $this->loadModule('html');

	    #load html module
	    $this->core = $this->loadModule('core','',true);

	}

	public function _actionStart() {	
	}

	/**
	* Method to make POSTs on Bella API
	* @param $method string
	* @param $data array
	**/
	private function post($method,$data) {

		//open connection
		$ch = curl_init();

		$url = $this->apiurl.$method;

		//set the url, number of POST vars, POST data
		curl_setopt($ch,CURLOPT_URL, $url);
		curl_setopt($ch,CURLOPT_POST, count($data));
		curl_setopt($ch,CURLOPT_POSTFIELDS, $data);

		//execute post
		$result = curl_exec($ch);

		//close connection
		curl_close($ch);
		
		exit;
	}

	public function _actionPutProduct() {
		
		$url = 'product';
		
		$fields['name'] = 'Produto';
		$fields['description'] = 'xxxxxxx';
		$fields['texto'] = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.';


		$this->post($url,$fields);

	}

}
?>
