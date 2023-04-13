<?php

require_once 'model/core/table.php';

class model_payment extends model_core_table
{
	
	function __construct()
	{
		$this->setTableName('payment');
		$this->setPrimaryKey('payment_id');
	}
}

 ?>