<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<?php require_once '../html/header.php'; 
	      require_once '../../model/core/salesman_price.php';
		$adapter = new model_core_adapter();
		$sql = "SELECT * FROM `salesman_price`";
		$salesmans = $adapter->fetchAll(); 
	

	?>
	<table width="100%" border="1">
		<form method="POST" action="../salesman_price.php?a=update">
		<tr>
			<td>salesman</td>
			<td>
				<select>
					<?php while ($salesman = $salesmans->fetch_assoc()) { ?>
					<option><?php echo $salesman['name'] ?></option>
				</select>
			</td>
			<td><button type="submit">UPDATE</button></td>
			<td>DELETE</td>
		</tr>
		<tr>
			<th>ENTITY ID</th>
			<th>NAME</th>
			<th>COST</th>
			<th>PRICE</th>
			<th>S.PRICE</th>
			<th>REMOVE</th>
		</tr>
		
		<tr>
			<td><?php echo $salesman['product_id'] ?></td>
			<td><?php echo $salesman['name'] ?></td>
			<td><?php echo $salesman['cost'] ?></td>
			<td><?php echo $salesman['price'] ?></td>
			<td><input type="text" name="salesman[s.price]" value="<?php echo $salesman['s.price'] ?>"></input><input type="checkbox" name="salesman[product_id]" value="<?php echo $salesman['product_id'] ?>"></input></td>
			<td><?php echo $salesman['product_id'] ?></td>
		</tr>
	<?php } ?>
    </form>
	</table>
</body>
</html>