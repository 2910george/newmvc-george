<?php 

class Model_Attribute extends model_core_table
{
	
	function __construct()
	{
		$this->setTableName('eav_attribute');
		$this->setPrimaryKey('attribute_id');
	}
}

?>