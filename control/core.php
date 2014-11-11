<?php
    /**
    * Bella - The full SOA E-commerce Platform
    * @copyright https://github.com/rafaelfranco/bella
    * @author Rafael Franco | rafaelfranco@me.com - 11/11/14
    **/

    class core extends simplePHP {
        private $model;
        private $html;

        #initialize vars
        public function __construct() {    
        	$this->model = $this->loadModule('model');
            $this->html = $this->loadModule('html');
        }
    }