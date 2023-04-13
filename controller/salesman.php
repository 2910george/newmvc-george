<?php 
require_once 'model/salesman.php';
require_once 'model/salesman_address.php';

class controller_salesman extends model_core_action{

	public function gridAction(){

		$sql = "SELECT * FROM `salesman` ORDER BY `salesman_id` DESC";
		$salesman_row = Ccc::getModel('salesman_row');
		$salesmans = $salesman_row->fetchAll($sql);
		$view = $this->getView();
		$view->setTemplate('salesman/grid.phtml');
		$view->setData(['salesmans'=>$salesmans]);
        $view->render();

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

			$data = $request->getPost('salesman');
			if(!$data){
				throw new Exception("Error Processing Request", 1);
			}

			$id = (int)$request->getParam('salesman_id');
			if($id){
				$data['salesman_id'] = $id;
				$data['updated_at'] = date("Y-m-d H:i:s");
			}
			else
			{
				$data['inserted_at'] = date("Y-m-d H:i:s");
			}
			$salesman_row = Ccc::getModel('salesman_row');
			$salesman_row->setData($data);
			$ids = $salesman_row->save();
			$salesman_address_row = Ccc::getModel('salesman_address_row');
			$data = $request->getPost('Address');
			if($id)
			{
				$data['salesman_id'] = $id;
			}
			else
			{
				$data['salesman_id'] = $ids;
			}
			$salesman_address_row->setData($data);
			$salesman_address_row->save();
			$message->addMessage('salesman added',model_core_message::SUCCESS);
			$this->redirect('index.php?c=salesman&a=grid');

		}
		catch(Exception $e)
		{
			$message->getMessages()->addMessage('salesman not added',model_core_message::FAILURE);
		}
	}

	
	public function editAction(){

		$request = $this->getRequest();
		$id = $request->getParam('salesman_id');
		if(!$id)
		{
			throw new Exception("Envalid ID", 1);
		}
		$salesman_row = Ccc::getModel('salesman_row');
		$address_row = Ccc::getModel('salesman_address_row');
		$salesmans = $salesman_row->load($id);
		$address = $address_row->load($id);
		$view = $this->getView();
		$view->setData(['salesmans' => $salesmans,'address'=>$address]);
		$view2 = $this->getView();

		$view->setTemplate('salesman/edit.phtml');
		$view->render();
	}

	public function addAction(){
		
		$salesman_row = Ccc::getModel('salesman_row');
		$view = $this->getView();
		$view->setTemplate('salesman/edit.phtml');
		$view->setData(['salesmans'=>$salesman_row]);
		$view->render();
	}
	public function deleteAction(){

		try
		{

			$message = Ccc::getModel('core_message');
			$request = $this->getRequest();
			$id = $request->getParam('salesman_id');
			echo "id".$id;
			if(!$id)
			{
				throw new Exception("Error Processing Request", 1);
			}
			$salesman_row = Ccc::getModel('salesman_row');
			$salesman_row->load($id);
			$id = $salesman_row->delete();

			if(!$id)
			{
				throw new Exception("Error Processing Request", 1);
			}
			$message->addMessage('salesman Deleted',model_core_message::SUCCESS);
		}
		catch(Exception $e){
			$message->getMessages()->addMessage('salesman not deleted',model_core_message::FAILURE);
		}
		$this->redirect('index.php?c=salesman&a=grid');
	}

	
}

?>