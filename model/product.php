<?php 
require_once 'model/core/table.php';

class model_product extends model_core_table{
	
	function __construct()
	{
		$this->setTableName('product');
		$this->setPrimaryKey('product_id');
	}
}

?>