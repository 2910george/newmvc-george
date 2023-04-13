<?php 

class Block_Html_Left extends block_core_layout
{
	function __construct()
	{
		parent::__construct();
		$this->setTemplate('html/left.phtml');
	}
}



?>