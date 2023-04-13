<?php 

class model_core_adapter 
{
	public $server = "localhost";
	public $username = "root";
	public $password = "";
	public $database = "project-george-solanki";

	public function connection(){
		$conn = new mysqli($this->server,$this->username,$this->password,$this->database);
		return $conn;
	}

	public function fetchAll($sql){
		$conn = $this->connection();
		$result = $conn->query($sql);
		$rows = $result->fetch_all(MYSQLI_ASSOC);
		return $rows;
	}
	public function fetchRow($sql){
		$conn = $this->connection();
		$result = $conn->query($sql);
		$rows = $result->fetch_array();
		return $rows;
	}

	public function insert($sql){
		echo "<pre>";
		echo $sql;
		$conn = $this->connection();
		$result = $conn->query($sql);

		if($result){
			return $conn->insert_id;
		}
		else{
			return false;
		}
	}

	public function update($sql){
		$conn = $this->connection();
		$result = $conn->query($sql);

		if($result){
			return true;
		}
		else{
			return false;
		}
	}

	public function delete($sql){
		echo "<pre>";
		echo $sql;
		$conn = $this->connection();
		$result = $conn->query($sql);

		if($result){
			return true;
		}
		else{
			return false;
		}
	}
}

?>