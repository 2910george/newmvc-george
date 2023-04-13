<?php 
require_once 'model/vender.php';
require_once 'model/vender_address.php';

class controller_vender extends model_core_action{

	public function gridAction()
	{
		$layout = new Block_Core_Layout();
		$grid = new Block_Vender_Grid();
		$layout->prepareChildren();
		$layout->getChild('contain')->addChild('grid',$grid);
		$header = new Block_Html_header();
		$layout->getChild('header');
		$layout->addChild('header',$header);
		$layout->getChildren();
		$layout->render();

		/*$query = "SELECT * FROM `vendor` JOIN `vendor_address` ON vendor.vendor_id=vendor_address.vendor_id";
		$vender_row = Ccc::getModel('venders_row');
		$venders = $vender_row->fetchAll($query);
		$view =$this->getView();
		$view->setData(["venders"=>$venders]);
		$view->setTemplate('vender/grid.phtml');
		$view->render();*/


	}
	
	public function saveAction()
	{
		try
		{
			$message = Ccc::getModel('core_message');
			$request = $this->getRequest();
			if(!$request->isPost())
			{
				throw new Exception("Error Processing Request", 1);
			}
			$data = $request->getPost('vender');
			if(!$data)
			{
				throw new Exception("Error Processing Request", 1);
			}
			$id = (int)$this->getParam('vender_id');
			if($id)
			{
				$data['vendor_id'] = $id;
				$data['updated_at'] = date('Y-m-d H:i:s');
			}
			else
			{
				$data['inserted_at'] = date('Y-m-d H:i:s');
			}
			$vender_row = Ccc::getModel('vender_row');
			$vender_row->setData($data);
			$ids = $vender_row->save();
			$vender_address_row = Ccc::getModel('vender_address_row');
			$data = $this->getPost('Address');
			if($id)
			{
				$data['vendor_id'] = $id;
			}
			else
			{
				$data['inserted_at'] = $ids;
			}
			$vender_address_row->setData($data);
			$vender_address_row->save();
			$message->addMessage('vender added',model_core_message::SUCCESS);
			$vender->redirect('index.php?c=vender&a=grid');
		}
		catch(Exception $e)
		{
			$message->getMessages()->addMessage('vender not added',model_core_message::FAILURE);
		}
	}

	public function insertAction(){

		try{
				$request = $this->getRequest();
				if(!$request->isPost()){

					throw new Exception("Error Processing Request", 1);
					
				}

				$data = $request->getPost('vender');
				$adapter = new model_vender();
				$data['inserted_at'] = date("Y-m-d H:i:s");
				$vender_id = $adapter->insert($data);
			
				if(!$vender_id){

					throw new Exception("Error Processing Request", 1);
					
				}
				$message->addMessage('vender added');
			}catch(Exception $e){
				$message->getMessages->addMessage('vender not added');
			}

			
		}

	public function updateAction(){

		try{
				 $request = $this->getRequest();

				 if(!$request->isPost()){

				 	throw new Exception("Error Processing Request", 1);
				 	
				 }

				 $data = $request->getPost('vender');
				 $data['updated_at'] = date("Y-m-d H:i:s A");

				 $condition = $data['vendor_id'];
				 if(!$condition){

				 	throw new Exception( "invalid id not found");
				 }

				 $product = new model_vender();
				 $id = $product->update($data,$condition);
				 if(!$id){

				 		throw new Exception("Error Processing Request", 1);
				 		
				 }
				 	$message->addMessage('vender updated');
			}
		catch(Exception $e){

				$message->getMessages->addMessage('vender not updated');
		}

		 $this->getTemplate("vender/grid.phtml");
	}

	public function deleteAction(){

		try{
				$message = Ccc::getModel('core_message');
				$request = $this->getRequest();
				$id = $request->getParam('vender_id');
				if(!$id){
					throw new Exception("Error Processing Request", 1);
					
				} 
                $product_row = Ccc::getModel('vender_row');
				$product_row->load($id);
				$id = $product_row->delete();
				if(!$id){
					throw new Exception("Error Processing Request", 1);
				}
				$message->addMessage('vender deleted',model_core_message::SUCCESS);
			}catch(Exception $e){
				$message->getMessages()->addMessage('vender not deleted',FAILURE);
			}

		$this->redirect("index.php?a=grid&c=vender");

	}


	public function editAction(){

		$layout = new Block_Core_Layout();
		$edit = new Block_Vender_Edit();
		$layout->prepareChildren();
		$layout->getChild('contain')->addChild('edit',$edit);
		$layout->getChildren();
		$header = new Block_Html_header();
		$layout->getChild('header');
		$layout->addChild('header',$header);
		$layout->getChildren();
		$layout->render();


		/*$request = $this->getRequest();
		$condition = $request->getParam('vender_id');
		$adapter = new model_vender();
		$result = $adapter->load($condition);
		$this->setVender($result);
		$this->getTemplate('vender/edit.phtml');*/

	}

	public function addAction(){

		$layout = new Block_Core_Layout();
		$add = new Block_Vender_Add();
		$layout->prepareChildren();
		$layout->getChild('contain')->addChild('add',$add);
		$layout->getChildren();
		$header = new Block_Html_header();
		$layout->getChild('header');
		$layout->addChild('header',$header);
		$layout->getChildren();
		$layout->render();
		//$this->getTemplate('vender/add.phtml');
	}
}

?>