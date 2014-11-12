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
            $this->file = $this->loadModule('file');
        }

        /**
        * Function to load the data model for one table
        * @param $table string
        * @return array
        **/
        public function loadDataModel($table) {
            #load Json file
            if(!is_file(('../datamodels/'.$table.'.json'))) {
                $this->createDataModel($table);
            }
            $json = file_get_contents('../datamodels/'.$table.'.json');
            $json = json_decode($json);
           
            return $json;
        }

        /**
        * Function to create the data model for one table
        * @param $table string
        * @return array
        **/
        private function createDataModel($table) {
            #load data model
            $model = $this->model->getColumns($table);
            foreach ($model as $column) {
                $model['valid'][] = $column['field'];
            }
            $json = json_encode($model);
            $this->file->save($json,'../datamodels/'.$table.'.json');
        }

        /**
        * Function to create possible filters analizing request and columns
        * @param $table string
        * @param $request array
        **/
        public function loadFilters($table,$request) {
            #load data model of this table
            $columns = $this->loadDataModel($table);
            foreach ($request as $key => $value) {
                if(in_array($key, $columns->valid)) {
                    $filters[$key] = $value;
                }
            }
            return $filters;
        }

        /**
        * Function to validate data before insert in database, and magic create columns
        * @param $table string
        * @param $data array
        **/
        public function validateData($table,$data) {
            #load data model of this table
            $columns = $this->loadDataModel($table);
            foreach ($data as $key => $value) {
                #if data isnt in data model, create column and update data model
                if(!in_array($key, $columns->valid)) {
                    $columnType = $this->defineDataType($key,$value);

                    #create column o db
                    $this->model->addColumn($table,$key,$columnType);

                    #update data model
                    $this->createDataModel($table);
                }
            }
            /** TODO Validate input data to clear malicious insert **/

            return $data;
        }

        /**
        * Function who define what kind of data will be used for an value
        * @param $key string : column name
        * @param $value ? the value will be saved
        **/
        private function defineDataType($key,$value) {
            if(is_string($value)) {
                if(strlen($value) > 200) {
                    $return = 'text';
                } else {
                    $return = 'varchar(255)';
                }
            } 
            if(is_int($value)) {
                $return = 'int(11)';
            }

            return $return;
        }
    }