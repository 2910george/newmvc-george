<?php 

require_once 'model/salesman.php';
require_once 'model/salesmanprice.php';

class Controller_SalesmanPrice extends model_core_action{

	public function gridAction(){
		
		$query = "SELECT * FROM `salesman`";
		$salesman_row = Ccc::getModel('salesman_row');
		$salesmans = $salesman_row->fetchAll($query);
		$query = "SELECT * FROM `salesman_price`";
		$salesman_row = Ccc::getModel('salesmanprice_row');
		$salesmanprice = $salesman_row->fetchAll($query);
		$view = $this->getView();
		$view->setTemplate('salesmanprice/grid.phtml');
		$view->setData('salesman'=>$salesmans,'salesmanprice'=>$salesmanprice);
		$view->render();

	}
	public function insertAction(){

		$request = $this->getRequest();

		if(!$request->isPost()){
			throw new Exception("ERROR IN PROCCESSING REQUEST",1);
		}

		$data = $request->getPost();
		$data['inserted_at'] = date("Y-m-d H:i:s");
		$product = new model_product();
		$id = $product->insert($data);
		$this->redirect("view/product/grid.phtml");  
	}
	public function updateAction(){

		$price = new model_salesman_price();
		$request = $this->getRequest();
		$salesman_id = $request->getPost('salesman_id');
		$product_id = $request->getPost('product_id');

		$price = new model_salesman_price();

		if($request->getPost('delete')){
			$remove = $request->getPost('remove');
			foreach($remove as $key=>$value){
				$result = $price->delete($value);
			}
		}
		else{
			$s_price = $request->getPost('s_price');
			$salesman_price = array_combine($product_id,$s_price);

			foreach($salesman_price as $key => $value){
				$query = "SELECT * FROM `salesman_price` WHERE `salesman_id` = {$salesman_id} AND `product_id` = {$key};"
				$prices = $price->fetchAll($query);
				if(!$prices){
					$query = "INSERT INTO `salesman_id`(`salesman_id`,`product_id`,`salesman_price`) VALUES ('{$salesman_id}','{$key}','{$value}')";
					$result = $price->insert($query);
				}
				else{
					$query = "UPDATE `salesman_price` 
					          SET `product_id` = '{$key}'
					              `salesman_price` = '{salesman_id}'";
					$result = $price->update($query);
				} 
			}
		}

		$this->redirect("index.php?c=salesman_price&a=grid&salesman_id={$salesman_id}");

	}

	public function deleteAction(){

		$request = $this->getRequest();
		$condition = $request->getParam('product_id');
		$product = new model_product();
		$id = $product->delete($condition);

		if(!$products){

			throw new Exception("Error Processing Request", 1);
			
		} 

		$this->redirect("index.php?c=product&a=grid");
		$this->getTemplate("product/grid.phtml");
	}

	public function editAction(){

		$request = $this->getRequest();
		$condition = $request->getParam('product_id');
		$adapter = new model_product();
		$result = $adapter->load($condition);
		$this->setProduct($result);
		print_r($result);
		$this->getTemplate('product/edit.phtml');

	}

	public function addAction(){

		$this->getTemplate('product/add.phtml');
	}
}


?>