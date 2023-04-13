<?php 

class Controller_admin extends model_core_action
{
	

	public function gridAction()
	{
		
		$query = "SELECT * FROM `admin` ORDER BY `admin_id` DESC";
		$admins_row = Ccc::getModel('admin_row');
		$admin = $admins_row->fetchAll($query);
		$view = $this->getView();
		$view->setTemplate('admin/grid.phtml');
		$view->setData(["admins"=>$admin]);		
		$view->render();
	
	}
	
	public function editAction()
	{

		$request = $this->getRequest();
		$id = $request->getParam('admin_id');
		if(!$id)
		{
			throw new Exception("Envalid ID", 1);
		}
		$admins = Ccc::getModel('admin_row');
		$data = $admins->load($id);
		$view = $this->getView();
		$view->setTemplate('admin/add.phtml');
		$view->setData(['admins' => $admins]);
		$view->render();
	}

	public function saveAction()
	{
		$request = $this->getRequest();
		if(!$request->isPost())
		{
			throw new Exception("Error Processing Request", 1);
		}
		$data = $request->getPost('admin');
		if(!$data)
		{
			throw new Exception("Error Processing Request", 1);
		}

		$admin_row = Ccc::getModel('admin_row');
		$id = (int)$request->getParam('admin_id');
		if($id)
		{
			$data['admin_id'] = $id;
			//$data['updated_at'] = date("Y-m-d H:i:s");
		}

		$admin_row->setData($data);
		$admin_row->save();
		$this->redirect('index.php?c=admin&a=grid');

     }
	public function deleteAction(){

		$message = Ccc::getModel('core_message');
		$request = $this->getRequest();
		$id = $request->getParam('admin_id');
		if(!$id){
			throw new Exception('Invalid ID',1);
		}
		$admins = Ccc::getModel('admin_row');
		$data = $admins->load($id);
		$admins->delete();
		$message->addMessage("DELETED SUCCESFULLY",model_core_message::SUCCESS);
		$view = $this->getView();
		$this->redirect("index.php?c=admin&a=grid");
		//$view->setTemplate('admin/grid.phtml');
		//$view->render();
	}
}


?>