<?php 

class model_customer_address extends model_core_table{

	function __construct(){
		$this->setTableName('customer_address');
		$this->setPrimaryKey('customer_id');
	}
}

?>