<?php 


class Model_Eav_Attribute_collection extends model_core_table
{
	
	function __construct()
	{
		$this->setTableName('Eav_attribute');
		$this->setPrimaryKey('attribute_id');
	}
}


?>