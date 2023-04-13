<?php 

require_once 'model/core/table.php';

class model_product_media extends model_core_table{
	
	function __construct()
	{
		$this->setTableName('images');
		$this->setPrimaryKey('media_id');
	}
}


?>