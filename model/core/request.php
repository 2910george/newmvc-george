<?php

class model_core_request{

	public function isPost(){
		
		if($_POST!=null){
			return true;
		}
		return false;
	}
	public function getPost($key=null,$value=null){
		
		if($key==null & $value==null){
			return $_POST;
		}
		
		if($key!=null){
			if(array_key_exists($key, $_POST)){
			return $_POST[$key];
			}
		}
	
	    if($key!=null & $value!=null){
	    	
	    	if(array_key_exists($key,$_POST)){
	    		return $_POST[$key];
	    	}
	    	return $value;

	    }
	}

	public function isParam(){
		
		if($_GET!=null){
			return true;
		}
		return false;
	}

	public function getParam($key=null,$value=null){
		if($key==null & $value==null){
			return $_GET;
		}
		
		if($key!=null){
			
			if(array_key_exists($key, $_GET)){
			return $_GET[$key];
			}
		}
	
	    if($key!=null & $value!=null){
	    	
	    	if(array_key_exists($key,$_GET)){
	    		return $_GET[$key];
	    	}
	    	return $value;

	    }

	}

	public function getActionName(){

		return $this->getParam('a','index');
	}

	public function getControllerName(){

		return $this->getParam('c','index');

	}
              

}


?>