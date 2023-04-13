<?php 

class Block_payment_grid extends Block_Core_Abstracts
{
	
	protected $column = [];

	function __construct()
	{
		parent::__construct();
		$this->setTemplate('payment/grid.phtml');
		$this->CollectionData();
		$this->prepareColumn();
		$this->prepareAction();
	}

	public function CollectionData()
	{
		$sql = "SELECT * FROM `payment`";
		$payment_row = Ccc::getModel('payment_row');
		$payments = $payment_row->fetchAll($sql);
		$this->setData(['payments'=>$payments]);
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

	public function prepareAction()
	{
		$this->addColumn('edit',['title'=>'edit']);
		$this->addColumn('delete',['title'=>'delete']);
	}


	public function prepareColumn()
	{
		$this->addColumn('payment_id',['title'=>'payment_id']);
		$this->addColumn('Name',['title'=>'payment_id']);
		$this->addColumn('status',['title'=>'payment_id']);
	}

}

?>