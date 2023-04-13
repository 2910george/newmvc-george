<?php 

class Block_Shipping_Grid extends Block_Core_Abstracts
{
	public $column = [];
	public $action = [];
	
	function __construct()
	{
		parent::__construct();
		$this->setTemplate('shipping/grid.phtml');
		$this->CollectionData();
		$this->prepareColumn();
		$this->prepareAction();
	}

	public function CollectionData()
	{
		$sql = "SELECT * FROM `shipping`";
		$shipping_row = Ccc::getModel('shipping_row');
		$shippings = $shipping_row->fetchAll($sql);
		$this->setData(['shippings'=>$shippings]);
	}
	public function setColumn(array $column)
	{
		$this->column = $column;
	}

	public function getColumn()
	{
		return $this->column;
	}

	public function addColumn($key,$value)
	{
		$this->column[$key] = $value;
	}

	public function removeColumn($key)
	{
		unset($this->column[$key]);
		return $this;
	}

	public function setAction(array $action)
	{
		$this->action = $action;
		return $this;
	}

	public function addAction($key,$value)
	{
		$this->action[$key] = $value;
		return $this;
	}
	public function getAction()
	{
		return $this->action;
	}

	public function prepareAction()
	{
		$this->addAction('edit',['title'=>'edit']);
		$this->addAction('delete',['title'=>'delete']);
	}

	public function getColumnValue($row,$key)
	{
		/*if($key=='status')
		{
			return $row->getStatusText();
		}*/
		return $row->$key;
	}


	public function prepareColumn()
	{
		$this->addColumn('shipping_id',['title'=>'shipping_id']);
		$this->addColumn('Name',['title'=>'name']);
		$this->addColumn('status',['title'=>'status']);
		$this->addColumn('amount',['title'=>'amount']);
	}

}

?>