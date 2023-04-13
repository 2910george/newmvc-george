<?php 

require_once 'model/core/action.php';

define("CD",getcwd());
define("DS",DIRECTORY_SEPARATOR);

class controller_core_front {

	public function init(){

		$action = new model_core_action();
		$request = $action->getRequest();
		$controller = $request->getControllerName();
		$action = $request->getActionName()."Action";

		$str_replace = str_replace('_',' ',$controller);
		$replace = str_replace(' ','_',ucwords($str_replace));
		$className = "controller_".ucwords($replace);
		$fileImplement = str_replace('_',DS,$className).'.php';
		$this->filePath($fileImplement);
		$actionName = new $className();
		$actionName->$action();

	}

	public function filePath($path){
		require_once CD.DS.$path;
	}
}

?>