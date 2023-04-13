<?php 

require_once 'model/shipping.php';
require_once 'model/shipping/row.php';
require_once 'model/core/url.php';

class controller_shipping extends model_core_action
{
	
	public function gridAction(){

		$layout = $this->getLayout();
		$grid = new Block_Shipping_Grid();
		$layout->prepareChildren();
		$layout->getChild('contain')->addChild('grid',$grid);
		$layout->getChildren();
		$header = new Block_Html_header();
		$layout->getChild('header');
		$layout->addChild('header',$header);
		$layout->getChildren();
		//$layout->getChildren();
		$layout->render();



		/*$query = "SELECT * FROM `shipping` ORDER BY `shipping_id` DESC";
		$shipping = Ccc::getModel('shipping_row');
		$shippings = $shipping->fetchAll($query);
		$view = $this->getView();
		$view->setTemplate('shipping/grid.phtml');
		$view->setData(['shippings'=>$shippings]);
		$view->render();*/
	}

	public function saveAction(){

		try
		{
			$message = Ccc::getModel('core_message');
			$request = $this->getRequest();
			if(!$request->isPost())
			{
				throw new Exception("Error Processing Request", 1);
			}

			$data = $request->getPost('shipping');
			if(!$data){
				throw new Exception("Error Processing Request", 1);
			}

			$id = (int)$request->getParam('shipping_id');
			if($id){
				$data['shipping_id'] = $id;
			}
			$product_row = Ccc::getModel('shipping_row');
			$product_row->setData($data);
			$product_row->save();
			$this->redirect('index.php?c=shipping&a=grid');
			$message->addMessage('shipping added',model_core_message::SUCCESS);
		}
		catch(Exception $e)
		{
			$message->getMessages()->addMessage('shipping not added',model_core_message::FAILURE);
		}
	}

	
	public function deleteAction(){
		
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
		catch(Exception $e){
			$message->getMessages()->addMessage('payment not deleted',model_core_message::FAILURE);
		}
		$this->redirect('index.php?c=shipping&a=grid');   
	}

	public function editAction(){

		$layout = new Block_Core_Layout();
		$layout->prepareChildren();
		$edit = new Block_Shipping_Edit();
		$layout->getChild('contain')->addChild('edit',$edit);
		$layout->getChildren();
		$header = new Block_Html_header();
		$layout->getChild('header');
		$layout->addChild('header',$header);
		$layout->getChildren();
		$layout->render(); 

		/*$request = $this->getRequest();
		$id = $request->getParam('shipping_id');
		if(!$id)
		{
			throw new Exception("Envalid ID", 1);
		}
		$product_row = Ccc::getModel('shipping_row');
		$product = $product_row->load($id);
		$view = $this->getView();
		$view->setTemplate('shipping/edit.phtml');
		$view->setData(['shippings' => $product]);
		$view->render();*/
	}

	public function addAction(){
		
		$layout = $this->getLayout();
		$layout->prepareChildren();
		$add = new Block_Shipping_Add();
		$layout->getChild('contain')->addChild('add',$add);
		$layout->getChildren();

		$header = new Block_Html_header();
		$layout->getChild('header');
		$layout->addChild('header',$header);
		$layout->getChildren();
		$layout->render();

		/*$shipping_row = Ccc::getModel('shipping_row');
		$view = $this->getView();
		$view->setTemplate('shipping/edit.phtml');
		$view->setData(['shippings'=>$shipping_row]);
		$view->render();*/
	}
}

?>