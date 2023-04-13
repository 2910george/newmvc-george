<?php 

require_once 'model/core/table.php';

class model_customers extends model_core_table{
	
	const STATUS_ACTIVE = 1;
	const STATUS_ACTIVE_LBL = 'ACTIVE';
	const STATUS_INACTIVE = 2;
	const STATUS_INACTIVE_LBL = "INACTIVE";
	const STATUS_DEFAULT = 2;

	function __construct()
	{
		$this->setTableName('customer');
		$this->setPrimaryKey('customer_id');
	}
	public function getStatusOption(){
		return [
				self::STATUS_ACTIVE => self::STATUS_ACTIVE_LBL,
				self::STATUS_INACTIVE => self::STATUS_INACTIVE_LBL
			];
	}

	public function getAddress()
	{
		$sql = "SELECT * FROM `customer_address` ORDER BY `customer_id` DESC";
		$customer_address_row = Ccc::getModel('vender');
		$address = $customer_address_row->fetchAll($sql);
		return $address;

	}

	public function billingID()
	{
		$sql = "SELECT * FROM `customer_address` ORDER BY `customer_id` DESC";
		$customer_address_row = Ccc::getModel('vender');
		$address = $customer_address_row->fetchAll($sql);
		return $address;
	}
}


?>