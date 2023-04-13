<?php 

class Block_vender_add extends Block_Core_Abstracts
{
	
	function __construct()
	{
		parent::__construct();
		$this->setTemplate('vender/edit.phtml');
		$this->CollectionData();

	}

	public function CollectionData()
	{
		$vender_row = Ccc::getModel('venders_row');
		$this->setData(['venders'=>$vender_row]);
	}
}



?>