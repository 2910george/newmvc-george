<?php 

class Block_Product_Grid extends Block_Core_Abstracts
{
	public $column = [];
	public $action = [];
	
	function __construct()
	{
		parent::__construct();
		$this->setTemplate('product/grid.phtml');
		$this->prepareData();
		$this->prepareAction();
		$this->prepareColumn();
	}

	public function prepareData()
	{
		$sql = "SELECT * FROM `product` ORDER BY `product_id` DESC";
		$product_row = Ccc::getModel('product_row');
		$products = $product_row->fetchAll($sql);
		$this->setData(['products'=>$products]);
		return $this;
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

	public function prepareColumn()
	{
		$this->addColumn('product_id',['title'=>'product_id']);
		$this->addColumn('name',['title'=>'name']);
		$this->addColumn('sku',['title'=>'sku']);
		$this->addColumn('cost',['title'=>'cost']);
		$this->addColumn('price',['title'=>'price']);
		$this->addColumn('quantity',['title'=>'quantity']);
		$this->addColumn('discription',['title'=>'description']);
		$this->addColumn('status',['title'=>'status']);
		$this->addColumn('inserted_at',['title'=>'inserted_at']);
	}

	public function getColumnValue($row,$key)
	{
		/*if($key=='status')
		{
			return $row->getStatusText();
		}*/
		return $row->$key;
	}


}

?>