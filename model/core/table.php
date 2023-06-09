<?php 
require_once 'model/core/adapter.php';
class model_core_table{

	public $adapter = null;
	public $tableName = null;
	public $primaryKey = null;
	public $resourceClass = null;
	public $resource = null;
	public $data = [];
	public $collectionClass = null;

	public function setResourceClass($resource)
	{
		$this->resourceClass = $resource;
		return $this;
	}

	public function getResource()
	{
		if($this->resourceClass)
		{
			return $this->resourceClass;
		}
		$resourceClass = $this->resourceClass;
		$resource = new $resourceClass();
		$this->setResourceClass($resource);
		return $this->ResourceClass;

	}

	public function setCollectionClass($resource)
	{
		$this->CollectionClass = $resource;
		return $this;

	}

	public function getCollectionClass()
	{
		if($this->collectionClass)
		{
			return $this->collectionClass;
		}
		$collection = model_Eav_attribute_collection();
		$this->setCollectionClass($collection);
	    return $this->collectionClass;
	}

	public function setAdapter($adapter){
        
		$this->adapter = $adapter;
		return $this;
	}

	public function getAdapter(){

		if($this->adapter){
			return $this->adapter;
		}
		
		$adapter = new model_core_adapter();
		$this->setAdapter($adapter);
		return $adapter;
	}

	public function setTableName($tableName){

		$this->tableName = $tableName;
		return $this;
	}

	public function getTableName(){

		return $this->tableName;
	}

	public function setPrimaryKey($primaryKey){

		$this->primaryKey = $primaryKey;
		return $this; 
	}

	public function getPrimaryKey(){

		return $this->primaryKey;
	}

	public function fetchRow($query=null){

		$result = $this->getAdapter()->fetchRow($query);
		return $result;
	}

	public function fetchAll($query=null){
		
		if($query == null){

			$query = "SELECT * FROM `{$this->getTableName()}`";
		}

		$result = $this->getAdapter()->fetchAll($query);
		return $result;
	}

	public function insert($data){

		if($data==null){
			throw new Exception("Error Processing Request", 1);
			
		}
		$keys = "`".implode("`, `",array_keys($data))."`";
		$values = "'".implode("', '",array_values($data))."'";
		$query = "INSERT INTO `{$this->getTableName()}` ({$keys}) VALUES ({$values})";
		$result = $this->getAdapter()->insert($query);
		return $result;


	}

	public function update($data,$condition){

		if(!$data){

			throw new Exception("Error Processing Request", 1);
			
		}

		$final = [];
		foreach($data as $key=>$value){
			$final[] = "`{$key}` = '{$value}'";
		}

		if(is_array($condition)){
			$where = [];
			foreach($condition as $key => $value){
				$where[] = "`{$key}` = '{$value}'"; 
			}
			$whereString = implode(" AND ",$where);

		}
		else{

			$whereString = "`{$this->getPrimaryKey()}` = {$condition}";
		}

		$updateData = implode(",",$final);
		$query = "UPDATE `{$this->getTableName()}` SET {$updateData} WHERE {$whereString}";
		$result = $this->getAdapter()->update($query);
		return $result;
	}

	public function delete($condition){

		if(!$condition){

			throw new Exception("Error Processing Request", 1);
			
		}

		if(is_array($condition)){

			$where = [];
			foreach($condition as $key => $value){

				$where[] = "`{$key}` = '{$value}'";
			}
			$whereString = implode(" AND ",$where);
		}
		else{

			$whereString = "`{$this->getPrimaryKey()}` = {$condition}";
		}

		$query = "DELETE FROM `{$this->getTableName()}` WHERE $whereString";
		$result = $this->getAdapter()->delete($query);
		return $result;

	}

	public function load($value,$column=null){

		$column = (!$column) ? $this->getPrimaryKey() : $column;
		$query = "SELECT * FROM `{$this->getTableName()}` WHERE `{$column}` = '{$value}'";
		$result = $this->getAdapter()->fetchRow($query);
		return $result;
	}

}
?>