<?php 

require_once 'model/media.php';

class Controller_Media extends model_core_action{

	public $medias = [];
	
	public function setMedia($media){
		$this->medias = $media;

		return $this;
	}

	public function getMedia(){

		return $this->medias;
	}

	public function gridAction(){

		$media = new model_product_media();
		$request = $this->getRequest();
		$product_id = $request->getParam('product_id');
		$query = "SELECT * FROM `media` WHERE product_id=`{product_id}`";
		$result = $media->fetchAll($query);
		$this->setMedia($result);
		$this->getTemplate('media/grid.phtml');
	}
	
    public function insertAction(){

    	$request = $this->getRequest();
    	if(!$request->isPost()){

    		throw new Exception("Error Processing Request", 1);
    		
    	}

    	$data = $request->getPost();
    	$data['created_at'] = date("Y-m-d H:i:s A");
    	$media = new model_product_media();
    	$media_id = $media->insert($data);
    	$stringArray = explode('.',$_FILES['name']['image']);
    	$extension = $stringArray[1];
    	$destination = $media_id.".".$extension; 
    	$result = move_uploaded_file($_FILES['tmp_name']['image'], $destination);
    	

    }

    public function updateAction(){

    	$request = $this->getRequest();
    	$
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

		$this->getTemplate('media/add.phtml');
	}
}


?>