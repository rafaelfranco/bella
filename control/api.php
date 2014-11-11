<?php
	
	/**
	* Bella - The full SOA E-commerce Platform
	* @copyright https://github.com/rafaelfranco/bella
	* @author Rafael Franco | rafaelfranco@me.com - 11/11/14
	**/

class api extends simplePHP {

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

	    #load tdd module
	    $this->keys['tests'] = '';
	    $tests = $this->loadModule('tests');
	    $this->keys['tests'] = $tests->loadTests();

	    #if receive some class name call the class with the rest method
	    if($_SERVER['PATH_INFO'] != '/') {
	    	$class = explode('/',$_SERVER['PATH_INFO'])[1];
			$action = $_SERVER['REQUEST_METHOD'];  

			$calling = $this->loadModule($class,'',true);
			$data = $calling->$action();

			$this->out($data);
		}
	}


	public function _actionStart() {

	}

	private function out($data) {
		echo json_encode($data);
		exit;
	}

}
?>
