<?php 

require_once 'model/core/table/row.php';

class model_shipping_row extends model_core_table_row
{
	
	function __construct()
	{
		$this->setTableClass('model_shipping');
	}
}


?>