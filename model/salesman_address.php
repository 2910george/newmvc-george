<?php 
require_once 'model/core/table.php';

class model_salesman_address extends model_core_table{
	
	function __construct()
	{
		$this->setTableName('salesman_address');
		$this->setPrimaryKey('salesman_id');
	}
}


?>