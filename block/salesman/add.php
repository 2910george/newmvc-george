<?php 

class Block_Salesman_Add extends Block_Core_Abstracts
{
	
	function __construct()
	{
		parent::__construct();
		$this->setTemplate('customer/edit.phtml');
		$this->CollectionData();
	}

	public function CollectionData()
	{
		$salesman_row = Ccc::getModel('salesman_row');
		$this->setData(['salesmans'=>$salesman]);
	}
}

?>