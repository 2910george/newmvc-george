<?php 

require_once 'model/core/table/row.php';

class model_customers_row extends model_core_table_row
{
	
	function __construct()
	{
		$this->setTableName('customer');
		$this->setPrimaryKey('customer_id');
	}
	public function getAddress()
	{
		$sql = "SELECT * FROM `customer_address` ORDER BY `customer_id` DESC";
		$customer_address_row = Ccc::getModel('customer_address_row');
		$address = $customer_address_row->fetchAll($sql);
		return $address;

	}
	public function billingID()
	{
		$sql = "SELECT * FROM `billing_address` ORDER BY "
	}
}



?>