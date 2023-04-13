<?php 

require_once 'block/core/abstracts.php';
require_once 'block/core/layout.php';

class Controller_Payment extends model_core_action
{

	public function gridAction()
	{
		$layout = new Block_Core_Layout();
		$layout->prepareChildren();
		$grid = new Block_payment_Grid();
		$layout->getChild('contain');
		$layout->addChild('grid',$grid);
		$layout->getChildren();
		$header = new Block_Html_header();
		$layout->getChild('header');
		$layout->addChild('header',$header);
		$layout->getChildren();
		$layout->render();
		die();

		/*$sql = "SELECT * FROM `payment` ORDER BY `payment_id`";
		$payment = Ccc:: getModel('payment_row');
		$payments = $payment->fetchAll($sql);
		$view = $this->getView();
		$view->setTemplate('payment/grid.phtml');
		$view->setData(['payments'=>$payments]);
		$view->render();*/
    }
    public function saveAction()
    {

		try
		{
			$request = $this->getRequest();
			if(!$request->isPost())
			{
				throw new Exception("Error Processing Request", 1);
			}

			$data = $request->getPost('payment');
			if(!$data)
			{
				throw new Exception("Error Processing Request", 1);
			}

			$id = (int)$request->getParam('payment_id');
			if($id)
			{
				$data['payment_id'] = $id;
			}
			
			$product_row = Ccc::getModel('payment_row');
			$product_row->setData($data);
			$product_row->save();
			$message->addMessage('payment added',model_core_message:SUCCESS);
			$this->redirect('index.php?c=payment&a=grid');
		}
		catch(Exception $e)
		{
			$message->getMessages()->addMessage('payment not added',model_core_message::FAILURE);
		}

	}

	

	public function deleteAction()
	{
		try
		{

			$message = Ccc::getModel('core_message');
			$request = $this->getRequest();
			$id = $request->getParam('payment_id');
			if(!$id)
			{
				throw new Exception("Error Processing Request", 1);
			}
			$payment_row = Ccc::getModel('payment_row');
			$payment_row->load($id);
			$id = $payment_row->delete();

			if(!$id)
			{
				throw new Exception("Error Processing Request", 1);
			}
			$message->addMessage('payment Deleted',model_core_message::SUCCESS);
		}
		catch(Exception $e)
		{
			$message->getMessages()->addMessage('payment not deleted',model_core_message::FAILURE);
		}
		$this->redirect('index.php?c=payment&a=grid'); 	
		
	}

	public function editAction(){

		$request = $this->getRequest();
		$id = $request->getParam('payment_id');
		if(!$id)
		{
			throw new Exception("Envalid ID", 1);
		}
		$payment_row = Ccc::getModel('payment_row');
		$payment = $payment_row->load($id);
		$view = $this->getView();
		$view->setTemplate('payment/edit.phtml');
		$view->setData(['payments' => $payment]);
		$view->render();
	}

	public function addAction(){
		
		$payment_row = Ccc::getModel('payment_row');
		$view = $this->getView();
		$view->setTemplate('payment/edit.phtml');
		$view->setData(['payments'=>$payment_row]);
		$view->render();
	}
}

?>