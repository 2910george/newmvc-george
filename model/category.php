<?php 

require_once 'model/core/table.php';

class model_category extends model_core_table
{
	
	function __construct()
	{
		$this->setTableName('category');
		$this->setPrimaryKey('category_id');
	}
}

?>