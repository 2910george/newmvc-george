<?php 

class model_admin_row extends model_core_table_row
{
	
	function __construct()
	{
		$this->setTableClass('model_admin');
	}

	public function getStatusText()
	{

		$statuses = $this->getTableClass()->getStatusOption();
		if(array_key_exists($this->status,$statuses))
		{
			return $statuses[$this->status];
		}
		return $statuses[model_admin::STATUS_DEFAULT];
	}
}


?>