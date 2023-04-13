<?php 

class Block_Customer_Add extends Block_Core_Abstracts
{
	
	function __construct()
	{
		parent::__construct();
		$this->setTemplate('customer/edit.phtml');
		$this->CollectionData();
	}

	public function CollectionData()
	{
		$customer_row = Ccc::getModel('customers_row');
		$this->setData(['customers'=>$customer_row]);
	}

}

?>