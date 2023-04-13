<?php 

require_once 'model/core/request.php';
require_once 'model/core/message.php';

class model_core_action{

	public $request = null;
	public $message = null;
	public $layout = null;

	public function getView(){
		$view = Ccc::getModel('core_view');
		return $view;
    }
	public function setMessage(model_core_message $message){
		$this->message = $message;
		return $this;
	}

	public function getMessage(){

		if($this->message){
			return $this->message;
		}
		$message = new model_core_message();
		$this->setMessage($message);
		return $this->message;
	} 
	
	public function setRequest($request){
		$this->request = $request;

		return $this->request;
	}

	public function getRequest(){
		if($this->request){
			return $this->request;
		}
		$request = new model_core_request();
		$request = $this->setRequest($request);
		return $request;
	}

	public function redirect($url){
		header("Location:$url");
		exit();
	}
	public function getTemplate($templatePath){

		require_once "view".DS.$templatePath;
	}
	
	public function render(){
		return $this->getView()->render();
	}

	public function setLayout($layout)
	{
		$this->layout = $layout;
		return $this;
	}

	public function getLayout()
	{
		if(!$this->layout){
			
			$this->layout = new Block_Core_Layout();
			return $this->layout;
		}

		return $this->layout;

		
	}


}

?>