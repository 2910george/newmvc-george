<?php 
require_once 'model/core/table.php';

class model_venders extends model_core_table{
	
	function __construct()
	{
		$this->setTableName('vendor');
		$this->setPrimaryKey('vendor_id');
	}
}

?>