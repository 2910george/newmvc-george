<?php 

class Controller_Eav_Attribute extends model_core_action
{
	
	public function gridAction()
	{
		$layout = $this->getLayout();
		$grid = new Block_attribute_Grid();
		$layout->prepareChildren();
		$layout->getChild('contain')->addChild('grid',$grid)->getChildren();
		$layout->render();
		die();
		$attribute_row = Ccc::getModel('Attribute_Row');
		$query = "SELECT * FROM `eav_attribute`";
		$collection = $attribute_row->fetchAll($query);
		print_r($collection);
		die();
	}
}

?>