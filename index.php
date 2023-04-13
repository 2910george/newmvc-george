<?php 


require_once 'controller/core/front.php';
//define("DS",DIRECTORY_SEPARATOR);

spl_autoload_register(function($className)
{
	$classPath = str_replace('_','/',$className);
	require_once "{$classPath}.php";
}
);
class Ccc {
	public static function init(){
	
		$front = new controller_core_front();
		$front->init();
	}

	public static function getModel($className){
		$className = 'model_'.$className;
		return(new $className());
	}

	public static function getSingleton($className){
		$className = 'model_'.$className;

		if($array_key_exists($className, $GLOBALS)){
			return $GLOBALS[$className];
		}
		$GLOBALS[$className] = (new $className());
		return $GLOBALS[$className];
	}

	public static function setRegister($key,$value)
	{
		$GLOBALS[$key] = $value;
	}

	public static function getRegister($key)
	{
		if(array_key_exists($key,$GLOBALS))
		{
			$GLOBALS[$key];
		}
		return null;
	} 
}
if (!(Ccc::getModel('Core_Request')->getParam('c')) || !(Ccc::getModel('Core_Request')->getParam('a'))) 
{
	header('Location:http://localhost/project_george_04_average/index.php?c=product&a=grid');
	exit();
}
Ccc::init();
?>