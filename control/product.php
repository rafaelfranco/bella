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
		#load received filters
		$filters = $this->core->loadFilters('products',$_REQUEST);

		#load data from DB
		$data = $this->model->getData('products','*',$filters);

		return $data;
	}

	/**
	* Put product
	* @param 
	* @return array
	**/
	public function POST() {
		
		#validate data
		$data = $this->core->validateData('products',$_POST);
		
		#insert data
		$return = $this->model->addData('products',$data);

		return $return;
	}



}
?>
