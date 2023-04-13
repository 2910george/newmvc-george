<?php 

class Block_Html_Right extends block_core_layout
{
	
	function __construct()
	{
		parent::__construct();
		$this->setTemplate('html/right.phtml');
	}
}

?>