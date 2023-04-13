<?php 

require_once 'model/core/table/row.php';

class model_category extends model_core_table_row
{
	
	function __construct(argument)
	{
		$this->setTableName('category');
		$this->setPrimaryKey('category_id');
	}
}


?>