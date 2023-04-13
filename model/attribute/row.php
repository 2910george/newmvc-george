<?php 

class model_attribute_row extends model_core_table_row
{
	function __construct()
	{
		$this->setTableName('eav_attribute');
		$this->setPrimaryKey('attribute_id');
		$this->setTableClass('model_attribute');
	}
}


?>