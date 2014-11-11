<?php
	
	/**
	* Bella - The full SOA E-commerce Platform
	* @copyright https://github.com/rafaelfranco/bella
	* @author Rafael Franco | rafaelfranco@me.com - 11/11/14
	**/

class product extends simplePHP {

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
	}

	public function _actionStart() {

	}

	/**
	* Get products
	* @param 
	* @return array
	**/
	public function GET() {
		$data = $this->model->getData('products');
		return $data;
	}

	/**
	* Put product
	* @param 
	* @return array
	**/
	public function POST() {
		$data['name'] = $_POST['name'];
		

		$return = $this->model->addData('products',$data);
		return $return;
	}



}
?>
