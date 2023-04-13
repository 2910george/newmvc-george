<?php 

class model_admin extends model_core_table
{
	const STATUS_ACTIVE = 1;
	const STATUS_ACTIVE_LBL = 'ACTIVE';
	const STATUS_INACTIVE = 2;
	const STATUS_INACTIVE_LBL = "INACTIVE";
	const STATUS_DEFAULT = 2;

	function __construct()
	{
		$this->setTableName('admin');
		$this->setPrimaryKey('admin_id');
	}

	public function getStatusOption(){
		return [
				self::STATUS_ACTIVE => self::STATUS_ACTIVE_LBL,
				self::STATUS_INACTIVE => self::STATUS_INACTIVE_LBL
			];
	}
	
}


?>