<?php 

class Block_Salesman_Edit extends Block_Core_Abstracts
{
	
	function __construct()
	{
		parent::__construct();
		$this->setTemplate('salesman/edit.phtml');
		$this->CollectionData();
	}

	public function CollectionData()
	{
		$request = Ccc::getModel('salesman_row');
		$id = $request->getParam('salesman_id');
		if(!$id)
		{
			throw new Exception("Error Processing Request", 1);
			
		}
		$salesman_row = Ccc::getModel('salesman_row');
		$salesmans = $salesman_row->load($id);
		$this->setData(['salesmans'=>$salesmans]);
	}
}

?>