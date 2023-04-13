<?php 


class Block_Customer_Edit extends Block_Core_Abstracts
{
	
	function __construct()
	{
		parent::__construct();
		$this->setTemplate('customer/edit.phtml');
	}

	public function CollectionData()
	{
		$request = Ccc::getModel('Core_Request');
		$id = $request->getParam('customer_id');
		if(!$id)
		{
			throw new Exception("Error Processing Request", 1);
		}

		$customer_row = Ccc::getModel('customers_row');
		$customer = $customer_row->load($id);
		$this->setData(['customers'=>$customer]);

	}
}

?>