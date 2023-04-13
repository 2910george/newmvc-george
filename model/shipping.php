<?php

require_once 'model/core/table.php';

class model_shipping extends model_core_table
{
	
	function __construct()
	{
		$this->setTableName('shipping');
		$this->setPrimaryKey('shipping_id');
	}
}

 ?>