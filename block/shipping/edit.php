<?php 

class Block_Shipping_Edit extends Block_Core_Abstracts
{
	
	function __construct()
	{
		parent::__construct();
		$this->setTemplate('shipping/edit.phtml');
		$this->CollectionData();
	}

	public function CollectionData()
	{
		$request = Ccc::getModel('Core_Request');
		$id = $request->getParam('shipping_id');

		if($id)
		{
			$shipping_row = Ccc::getModel('shipping_row');
			$shippings = $shipping_row->load($id);
		}
		$this->setData(['shippings'=>$shippings]);
	}
}

?>