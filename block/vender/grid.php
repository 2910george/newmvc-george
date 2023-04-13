<?php 

class Block_vender_grid extends Block_Core_Abstracts
{
	
	function __construct()
	{
		parent::__construct();
		$this->setTemplate('vender/grid.phtml');
		$this->CollectionData();
	}

	public function CollectionData()
	{
		$sql = "SELECT * FROM `vendor` JOIN `vendor_address` 
				ON vendor.vendor_id = vendor_address.vendor_id";

		$vender_row = Ccc::getModel('venders_row');
		$venders = $vender_row->fetchAll($sql);
		$this->setData(['venders'=>$venders]);
		return $this;

	}




}


?>