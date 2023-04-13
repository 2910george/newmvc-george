<?php 

require_once 'model/core/table/row.php';

class model_payment_row extends model_core_table_row{
	
	function __construct()
	{
		$this->setTableclass('model_payment');
	}
}


?>