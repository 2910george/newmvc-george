<?php 

require_once 'model/core/view.php';

class Block_Core_Abstracts extends Model_Core_View
{
	
	protected $children = [];
	
	public function __construct()
	{
		parent::__construct();		
	}
	public function setChildren(array $children)
	{
		$this->children = $children;
	}
	
	public function getChildren()
	{
		
		return $this->children;
	}
	
	public function addChild($key,$value)
	{
		$this->children[$key] = $value;
	}
	
	public function removeChild($key)
	{
		if(array_key_exists($key,$this->children))
		{
			unset($this->children[$key]);
		}
		return $this->children;
	}
	public function getChild($key)
	{
		if(array_key_exists($key,$this->children))
		{
			return $this->children[$key];
		}
		return null;
	}

}
?>