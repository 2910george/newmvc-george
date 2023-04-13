<?php 
require_once 'model/core/table.php';

class model_salesmanprice extends model_core_table{
	
	function __construct()
	{
		$this->setTableName('salesman_price');
		$this->setPrimaryKey('product_id');
	}
}



?>