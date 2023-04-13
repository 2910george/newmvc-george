<?php

require_once 'model/core/table.php';

class model_core_table_resource{

	protected $data = [];
	protected $table = null;
	protected $tableClass = null;
	
	public function __set($key,$value){

		$this->data[$key] = $value;
	
	}

	public function __get($key){

		if(array_key_exists($key,$this->data)){
			return $this->data[$key];
		}
		return null;
	}

	public function __unset($key){

		if(array_key_exists($key,$this->data)){

			unset($this->data[$key]);
		}
	}

	public function setTableClass($tableClass){
		$this->tableClass = $tableClass;
		return $tableClass;
	}
	public function getTableClass(){
		return new ($this->tableClass);
	}

	public function setTableName($tableName){

		$this->tableName = $tableName;
		return $this;
	}

	public function getTableName($tableClass){

		return $tableClass->tableName;
	}

	public function setPrimaryKey($primaryKey){

		$this->primaryKey = $primaryKey;
		return $this; 
	}

	public function getPrimaryKey($tableClass){

		return $tableClass->primaryKey;
	}


	public function setModel($model){

		$this->model = $model;
		return $this;
	}

	public function getModel(){

		if($this->model){
			return $this->model;
		}
		$modelName = rtrim(get_called_class(),'_row');
		$model = new $modelName;
		$this->setModel($model);
		return $model;
	}

	public function setRow(model_core_table_row $row){
		$this->row=$row;
		return $this;
	}

	public function getRow(model_core_table_row $row){

		if($this->row){

			return $this->row;
		}
		$row = new model_core_tabel_row();
		$this->setRow($row);
		return $row;
	}

	public function addData($key,$value){

		$this->data[$key] = $value;
		return $this;
	}

	public function setData(array $data){

		$this->data = $data;
		return $this;
	}

	public function getData($key = null){

		if($key == null){

			return $this->data;
		}
		if(array_key_exists($key,$this->data)){

			return $this->data[$key];
		}
		return null;
	}

	public function fetchAll($query){

		$arrayData = $this->getModel()->fetchAll($query);
		foreach($arrayData as &$row){

			$row = (new $this)->setData($row);
		}
		$this->data = $arrayData;
		return $this->data;

	}

	public function fetchRow($query){

		$data = $this->getModel()->fetchRow($query);
		$data = $this->getRow()->setModel($data);
		$this->setRow(new model_core_tabel_row());
		return $this;
	}

	public function load($id,$column=null){

	$tableclass = new ($this->tableClass);
	$tableName = $this->getTableName($tableclass); 
	$primaryKey = $this->getPrimaryKey($tableclass);
		echo "<pre>";
		if(!$column){

			$column = $primaryKey;
		}
	$query = "SELECT * FROM `{$tableName}` WHERE `{$column}` = '{$id}'";
	$result = $tableclass->fetchRow($query);
	if($result){
		$this->data = $result;
	}
	return $this;
	}

	public function save(){
		$tableclass = new ($this->tableClass);
		$tableName = $this->getTableName($tableclass);
		$primaryKey = $this->getPrimaryKey($tableclass);
		if(array_key_exists($primaryKey,$this->data)) 
        {
        	$result = $tableclass->update($this->data,$this->data[$primaryKey]);
        	return $result;
        }
		$id = $tableclass->insert($this->data);
		return $id;
	}

	public function delete(){

		$tableclass = new ($this->tableClass);
		print_r($tableclass);
		$tableName = $this->getTableName($tableclass);
		$primaryKey = $this->getPrimaryKey($tableclass);
		print_r($this->data);
		$id = $this->getData($primaryKey); 
		$ids = $tableclass->delete($id);
		return $ids;
	}
}

?>
