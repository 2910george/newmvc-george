<?php 


class model_core_session{

	public function getId(){

		return session_id();
	}

	public function start(){
		session_start();
		return $this;
	}

	public function destroy(){

		session_destroy();
		return $this;
	}

	public function set($key,$value){

		$_SESSION[$key] = $value;
		return $this;

	}

	public function get($key){

		if(!array_key_exists($key,$_SESSION)){

			return null;
		}
		return $_SESSION[$key];
	}

	public function has($key){
		if(array_key_exists($key,$_SESSION)){
			return true;
		}
		return false;
	}

	public function unset($key){

		if(array_key_exists($key,$_SESSION)){

			unset($_SESSION[$key]);
		}

		return $this;
	}
}


?>