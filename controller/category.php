<?php 

require_once 'model/category.php';

class controller_category extends model_core_action{

	public $categorys = [];

	public function setCategory($category){
		$this->categorys = $category;
	}

	public function getCategory(){

		return $this->categorys;
	}

	public function gridAction(){

		$sql = "SELECT * FROM `category`";
		$product_row = Ccc::getModel('product_row');
		$categorys = $product->fetchAll($sql);


		/*$adapter = new model_category();
		$category = $adapter->fetchAll();
		$this->setCategory($category);*/
		$this->getTemplate("category/grid.phtml");
	}

	public function insertAction(){


	}
	public function updateAction(){

		try{
				 $request = $this->getRequest();

				 if(!$request->isPost()){

				 	throw new Exception("Error Processing Request", 1);
				 	
				 }

				 $data = $request->getPost();
				 $data['updated_at'] = date("Y-m-d H:i:s A");

				 $condition = $request->getPost('product_id');
				 if(!$condition){

				 	throw new Exception( "invalid id not found");
				 }

				 $product = new model_category();
				 $id = $product->update($data,$condition);
				 if(!$id){

				 		throw new Exception("Error Processing Request", 1);
				}
				$message->addMessage('category updated');
			}
		catch(Exception $e){

				$message->getMessages->addMessage('category updated',FAILURE);
			}
				 $this->getTemplate("category/grid.phtml");


	}

	public function deleteAction(){

		$request = $this->getRequest();
		$condition = $request->getParam('category_id');
		$product = new model_category();
		$id = $product->delete($condition);

		if(!$products){

			throw new Exception("Error Processing Request", 1);
			
		} 

		$this->redirect("index.php?c=product&a=grid");
		$this->getTemplate("category/grid.phtml");
	}


	public function editAction(){

		$request = $this->getRequest();
		$condition = $request->getParam('category_id');
		$adapter = new model_category();
		$result = $adapter->load($condition);
		$this->setCategory($result);
		print_r($result);
		$this->getTemplate('category/edit.phtml');

	}

	public function addAction(){

		$adapter = new model_category();
		$category = $adapter->fetchAll();
		$this->setCategory($category);
		$this->getTemplate('category/add.phtml');
	}
}

?>