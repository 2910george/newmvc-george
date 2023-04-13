<?php 

class Block_vender_edit extends Block_Core_Abstracts
{
	
	function __construct()
	{
		parent::__construct();
		$this->setTemplate('vender/edit.phtml');
		$this->CollectionData();

	}

	public function CollectionData()
	{
		$request = Ccc::getModel('Core_Request');
		$id = $request->getParam('vendor_id');
		if($id)
		{
			$vender_row = Ccc::getModel('venders_row');
			$venders = $vender_row->load($id);
		}
		$this->setData(['venders'=>$venders]);

	}
}


?>