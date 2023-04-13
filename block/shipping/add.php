<?php 

class Block_Shipping_Add extends Block_Core_Abstracts
{
	
	function __construct()
	{
		parent::__construct();
		$this->setTemplate('shipping/edit.phtml');
		$this->CollectionData();
	}

	public function CollectionData()
	{
		$shipping_row = Ccc::getModel('shipping_row');
		$this->setData(['shippings'=>$shipping_row]);
	}
}

?>