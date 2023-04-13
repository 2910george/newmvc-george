<?php 

class Block_Customer_Grid extends Block_Core_Abstracts
{
	
	function __construct()
	{
		parent::__construct();
		$this->setTemplate('customer/grid.phtml');
		$this->CollectionData();
	}

	public function CollectionData()
	{
		$sql = "SELECT * FROM `customer` 
				JOIN `customer_address` 
				ON customer.customer_id=customer_address.customer_id";

		$customer_row = Ccc::getModel('customers_row');
		$customers = $customer_row->fetchAll($sql);
		$this->setData(['customers'=>$customers]);
		return $this;

	}
}