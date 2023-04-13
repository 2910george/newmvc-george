<?php 
require_once 'model/core/request.php';

class model_core_url extends model_core_request{

	public function getCurrentUrl(){

		$url = $_SERVER['REQUEST_SCHEME']."://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		return $url;
	}

	public function getUrl($a=null,$c=null,$param=null,$resetParam=false){

		$final = $this->getParam();

		$currentUrl = explode('?', $this->getCurrentUrl());

		if($resetParam){

			$final = [];
		}

		if($c == null){
			$requiredParam['c'] = $this->getControllerName();
		}
		else{
			$requiredParam['c'] = $c;
		}

		if($a==null){

			$requiredParam['a'] = $this->getActionName();
		}

		else{

			$requiredParam['a'] = $a;
		}

		$final =  array_merge($final,$requiredParam);

		if($param){

			$final = array_merge($final,$param);
		}

		$url = $currentUrl[0].'?'.http_build_query($final);
		return $url;

	}
}


?>