<?php
	
	/**
	* Bella - The full SOA E-commerce Platform
	* @copyright https://github.com/rafaelfranco/bella
	* @author Rafael Franco | rafaelfranco@me.com - 11/11/14
	**/

class tests extends simplePHP {

	#initialize vars
	private $model;
	private $html;
	private $core;

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
		die('xxx');

	}

	public function _actionProduct() {
		
	}

}
?>
