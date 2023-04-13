<?php 

require_once 'model/core/table.php';

class model_salesman extends model_core_table{
	
	function __construct()
	{
		$this->setTableName('salesman');
		$this->setPrimaryKey('salesman_id');
	}
}

?>