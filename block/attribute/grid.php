<?php 

class Block_Attribute_Grid extends Block_Core_Abstracts
{
	
	function __construct()
	{
		//parent::__construct();
		$this->setTemplate('attribute/grid.phtml');
		$this->prepareData();
	}

	public function prepareData()
	{
		$sql = "SELECT * FROM `eav_attribute`";
		$attribute_row = Ccc::getModel('attribute_row');
		$attributes = $attribute_row->fetchAll($sql);
		$this->setData(['attributes'=>$attributes]);
	}
}

?>