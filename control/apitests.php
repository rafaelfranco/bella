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
		$fields['id'] = '123';
		$fields['name'] = 'Produto';


		$this->post($url,$fields);

	}

}
?>
