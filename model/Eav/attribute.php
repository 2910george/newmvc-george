<?php 

class Model_Eav_Attribute extends model_core_table
{
	
	function __construct()
	{
		$this->setResourceClass('Model_Eav_Attribute_Resource');
		$this->setCollectionClass('Model_Eav_Attribute_Collection');
	}
}
?>