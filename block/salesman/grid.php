<?php 


class Block_Salesman_Grid extends Block_Core_Abstracts
{
	
	function __construct()
	{
		parent::__construct();
		$this->setTemplate('salesman/grid.phtml');
		$this->CollectionData();
	}

	public function CollectionData()
	{
		$sql = "SELECT * FROM `salesman` 
				JOIN `salesman_address` 
				salesman.salesman_id = salesman_address.salesman_id";

		$salesman_row = Ccc::getModel('salesman_row');
		$salesmans = $salesman_row->fetchAll($sql);
		$this->setData(['salesmans'=>$salesmans]);
	}
}

?>