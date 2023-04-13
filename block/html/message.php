<?php 

class Block_Html_Message extends block_core_layout
{
	
	function __construct()
	{
		parent::__construct();
		$this->setTemplate('html/message.phtml');
		$this->message();
	}

	public function message()
	{
		
		try 
		{
			$message = Ccc::getModel('core_message');
			$message->addMessage('salesman added',model_core_message::SUCCESS);
		} 
		catch (Exception $e) 
		{
			$message->getMessages()->addMessage('salesman not added',model_core_message::FAILURE);
		}


	}
}

?>