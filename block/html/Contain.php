<?php 
class Block_Html_Contain extends Block_Core_Layout
{
	function __construct()
	{
		parent::__construct();
		$this->setTemplate('html/contain.phtml');
	}
} 
?>