<?php 

session_start();

$_SESSION['id']=3;

/*require_once '../model/core/adapter.php';

if(array_key_exists('product',$_POST)){

	
		$adapter = new model_core_adapter();
		$name = $_POST['name'];
		$query1 = "SELECT * FROM `product` WHERE name = '{$name}'";
		$productRow = $adapter->fetchAll($query1);
		print_r($productRow);
		$product_id = $productRow[0]['product_id'];
		$cost = $productRow[0]['cost'];
		$price = $productRow[0]['price'];
		$quantity = $_POST['quantity'];
		$query2 = "INSERT INTO `cart_item`(`product_id`, `cost`, `price`, `quantity`) VALUES ('$product_id','$cost','$price','$quantity')";
		$result = $adapter->insert($query2);
		echo "<br>";
		echo $result;
	}
if(array_key_exists('shipping',$_POST)){


}
*/
?>