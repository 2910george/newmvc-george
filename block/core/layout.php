<?php 


class Block_Core_Layout extends Block_Core_Abstracts
{
	public function __construct()
	{
		parent::__construct();
		$this->setTemplate('core/layout/3columns.phtml');
		//$this->prepareChildren();
				
	}

	public function prepareChildren()
	{
		$contain = new block_html_contain();
		$this->addChild('contain',$contain);

		$left = new Block_Html_Left();
		$this->addChild('left',$left);

		$right = new Block_Html_Right();
		$this->addChild('right',$right);

		$message = new Block_Html_Message();
		$this->addChild('message',$message); 


	}




}

?>