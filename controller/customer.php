<?php 

require_once 'model/customer.php';
require_once 'model/customer_address.php';
require_once 'model/customer/row.php';


class controller_customer extends model_core_action{


	public function gridAction(){

		$address = Ccc::getModel('customers_row');
		$address = $address->getAddress();
		print_r($address);
		die();
		
		/*$layout = $this->getLayout();
		$grid = new Block_Customer_Grid();
		$layout->prepareChildren();
		$layout->getChild('contain')->addChild('grid',$grid)->getChildren();
		$layout->render();


		/*$query = "SELECT * FROM `customer` JOIN `customer_address` 
		          ON customer.customer_id=customer_address.customer_id ";
		$customer_row = Ccc::getModel('customers_row');
		$customers = $customer_row->fetchAll($query);
        $view = $this->getView();
        $view->setTemplate('customer/grid.phtml');
        $view->setData(['customers'=>$customers]);
        $view->render();*/
		
	}

	public function saveAction(){

	try
	{	
		$request = $this->getRequest();
		if($request->isPost())
		{
			throw new Exception("Error Processing Request", 1);
		}

		$data = $request->getPost('customer');
		if(!$data)
		{
			throw new Exception("Error Processing Request", 1);
		}
		$id = (int)$this->getParam('customer_id');
		if($id)
		{
			$data['customer_id'] = $id;
			$data['updated_at'] = date('Y-m-d H:i:s');
		}
		else
		{
			$data['inserted_at'] = date('Y-m-d H:i:s');
		}
		$customer_row = Ccc::getModel('customers_row');
		$customer_row->setData($data);
		$ids = $customer_row->save();
		$customer_address_row = Ccc::getModel('customers_address_row');
		$data = $request->getPost('Address');
		if($id)
		{
			$data['customer_id'] = $id;
		}
		else
		{
			$data['customer_id'] = $ids;
		}
		$customer_address_row->setData($data);
		$customer_address_row->save();
		$message->addMessage('shipping added',SUCCESS);
		$this->redirect('index.php?c=customer&a=grid');
	}
	catch(Exception $e)
	{
		$message->getMessages()->addMessage('shipping not added',FAILURE);
	}

	}
	
	public function editAction(){

		$layout = new Block_Core_Layout();
		$edit = new Block_Customer_Edit();
		$layout->prepareChildren();
		$layout->getChild('contain')->addChild('edit',$edit);
		$layout->render();


		/*$request = $this->getRequest();
		$id = $request->getParam('customer_id');
		if(!$id)
		{
			throw new Exception("Envalid ID", 1);
		}
		$customer_row = Ccc::getModel('customers_row');
		$address_row = Ccc::getModel('customers_address_row');
		$customers = $customer_row->load($id);
		$address = $address_row->load($id);
		$view = $this->getView();
		$view->setData(['customers' => $customers,'address'=>$address]);
		$view2 = $this->getView();

		$view->setTemplate('customer/edit.phtml');
		$view->render();*/

	}

	public function deleteAction(){

		try
		{

			$message = Ccc::getModel('core_message');
			$request = $this->getRequest();
			$id = $request->getParam('customer_id');
			echo "id".$id;
			if(!$id)
			{
				throw new Exception("Error Processing Request", 1);
			}
			$salesman_row = Ccc::getModel('customer_row');
			$salesman_row->load($id);
			$id = $salesman_row->delete();

			if(!$id)
			{
				throw new Exception("Error Processing Request", 1);
			}
			$message->addMessage('customer Deleted',model_core_message::SUCCESS);
		}
		catch(Exception $e){
			$message->getMessages()->addMessage('customer not deleted',model_core_message::FAILURE);
		}
		$this->redirect('index.php?c=customer&a=grid');
	}

	public function addAction(){

		$layout = new Block_Core_Layout();
		$add = new Block_Customer_Add();
		$layout->prepareChildren();
		$layout->getChild('contain')->addChild('add',$add)->getChildren();
		$layout->render();

		/*$customer_row = Ccc::getModel('customer_row');
		$view = $this->getView();
		$view->setTemplate('customer/edit.phtml');
		$view->setData(['customers'=>$customer_row]);
		$view->render();*/
	}

}
?>