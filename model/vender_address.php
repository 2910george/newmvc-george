<?php 

class model_vender_address extends model_core_table{

	function __construct(){
		$this->setTableName('vendor_address');
		$this->setPrimaryKey('vendor_id');
	}
}

?>