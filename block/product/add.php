<?php 

class Block_Product_Add extends Block_Core_Abstracts
{
	
	function __construct()
	{
		parent::__construct();
		$this->setTemplate('product/edit.phtml');
		$this->prepareData();
	}

	public function prepareData()
	{
		$product_row = Ccc::getModel('product_row');
		$this->setData(['products'=>$product_row]);
		

	}
}

?>