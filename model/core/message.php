<?php 

require_once 'model/core/session.php';


class model_core_message{

	public $message = null;
	public $session = null;
	const SUCCESS = 'sucess';
	const FAILURE = 'failure';
	const NOTICE = 'notice';

    function __construct(){
    	
    	$this->getSession()->start();
    }
    
    public function setSession(model_core_session $session){
    	$this->session = $session;
    	return $this;
    }

    public function getSession(){

    	if($this->session){

    		return $this->session;
    	}
    	$session = new model_core_session();
    	$this->setSession($session);
    	return $this->session;
    }

	public function getMessages(){
		if(!$this->getSession()->has('message')){
			return null;
		}
		if(!$this->getSession()->has('message')){
			return null;

		}
		if(!array_key_exists('message',$_SESSION)){
			return null;
		}
		return $this->getSession()->get('message');
	}

	public function addMessage($message, $type = 'success'){

		$session = $this->getSession();
		if(!$this->getSession()->has('message'))
		{
			$this->getSession()->set('message',[]);
		}
		$messages = $this->getMessages();
		$messages[$type] = $message;

		$this->getSession()->set('message',$messages);
		return $this;
	}

	public function clearMessages(){
		// $this->getSession()->unset('message');
		$this->getSession()->set('message',[]);
		//$_SESSION['message'] = [];
		return $this;
		
	}
}


?>