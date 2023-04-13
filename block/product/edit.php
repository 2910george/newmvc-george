<?php 
class Block_Product_Edit extends Block_Core_Abstracts
{
	
	function __construct()
	{
		parent::__construct();
		$this->setTemplate('product/edit.phtml');
		$this->prepareData();
	}
	public function prepareData()
	{
		$request = Ccc::getModel('Core_Request');
		$id = $request->getParam('product_id');
		if($id)
		{
		$product_row = Ccc::getModel('product_row');
		$product = $product_row->load($id);
		}
		$this->setData(['products'=>$product]);
	}
}


?>