<?php 
class model_core_view{

	protected $data = [];
	protected $template = null;

	public function __construct()
	{
			
	}
	function __get($key){
		if(array_key_exists($key,$this->data))
		{
			return $this->data[$key];
		}
	}
	public function setTemplate($template){

		$this->template = $template;
		return $this;
	}

	public function getTemplate(){
		return $this->template;
	}

	public function setData($data){
		$this->data = $data;
		return $this->data;
	}
	public function getData($key=null){
		if($key==null){
			return $this->data;
		}
		if(array_key_exists($key,$this->data)){
			return $this->data[$key];
		}
		return null;
	}

	public function render(){
		require_once 'view'.DS.$this->getTemplate();
	}

	public function getUrl($action=null,$controller=null,$param=[],$resetParam=false){
		return Ccc::getModel('core_url')->getUrl($action,$controller,$param,$resetParam);

	}
}




?>