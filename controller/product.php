<?php 

require_once 'block/core/abstracts.php';
require_once 'block/core/layout.php';

class Controller_Product extends model_core_action{


	public function gridAction(){

		echo "<pre>"; 

		$layout = $this->getLayout();
		$grid = new Block_Product_Grid();
		$layout->prepareChildren();
		$layout->getChild('contain')->addChild('grid',$grid);
		$layout->getChildren();
		$header = new Block_Html_header();
		$layout->getChild('header');
		$layout->addChild('header',$header);
		$layout->getChildren();
		$message = new Block_Html_Message();
		$layout->getChild('message');
		$layout->addChild('message',$message);
		$layout->getChildren();
		$layout->render();
	}

	public function saveAction(){

		try
		{
			$request = Ccc::getModel('Core_Request');
			if(!$request->isPost())
			{
				throw new Exception("Error Processing Request", 1);
			}

			$data = $request->getPost('product');
			if(!$data){
				throw new Exception("Error Processing Request", 1);
			}

			$id = (int)$request->getParam('product_id');
			if($id){
				$data['product_id'] = $id;
				$data['updated_at'] = date("Y-m-d H:i:s");
			}
			else
			{
				$data['inserted_at'] = date("Y-m-d H:i:s");
			}
			$product_row = Ccc::getModel('product_row');
			$product_row->setData($data);
			$product_row->save();
			//$message->addMessage('product deleted',model_core_message::SUCCESS);
			$this->redirect('index.php?c=product&a=grid');
		}
		catch(Exception $e)
		{
			$message->getMessages()->addMessage('product not deleted',FAILURE);
		}

	}
	

	public function deleteAction(){
		
		try{
				$message = Ccc::getModel('core_message');
				$request = $this->getRequest();
				$id = $request->getParam('product_id');
				if(!$id){
					throw new Exception("Error Processing Request", 1);
					
				} 
                $product_row = Ccc::getModel('product_row');
				$product_row->load($id);
				$id = $product_row->delete();
				if(!$id){
					throw new Exception("Error Processing Request", 1);
				}
				$message->addMessage('product deleted',model_core_message::SUCCESS);
			}
		catch(Exception $e)
		{
			$message->getMessages()->addMessage('product not deleted',FAILURE);
		}

		$this->redirect("index.php?a=grid&c=product");

	}

	public function editAction(){

		$layout = $this->getLayout();
		$layout->prepareChildren();
		$edit = new Block_Product_Edit();
		$layout->addChild('contain',$edit)->getChildren();
		$header = new Block_Html_header();
		$layout->getChild('header');
		$layout->addChild('header',$header)->getChildren();
		$layout->render();
		/*$request = $this->getRequest();
		$id = $request->getParam('product_id');
		if(!$id)
		{
			throw new Exception("Envalid ID", 1);
		}
		$product_row = Ccc::getModel('product_row');
		$product = $product_row->load($id);
		$view = $this->getView();
		$view->setTemplate('product/edit.phtml');
		$view->setData(['products' => $product]);
		$view->render();*/
	}

	public function addAction(){
		
		$layout = new Block_Core_Layout();
		$layout->prepareChildren();
		$add = new Block_Product_Add();
		$layout->addChild('contain',$add)->getChildren();
		$header = new Block_Html_header();
		$layout->getChild('header');
		$layout->addChild('header',$header)->getChildren();
		$layout->render();
		/*$product_row = Ccc::getModel('product_row');
		$view = $this->getView();
		$view->setTemplate('product/edit.phtml');
		$view->setData(['products'=>$product_row]);
		$view->render();*/
	}
}


?>