<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<?php 

		session_start();
		$id = $_SESSION['id'];
		require_once '../model/core/adapter.php';
		$adapter = new model_core_adapter();
		$query1 = "SELECT * FROM `product` ";
		$productrows = $adapter->fetchAll($query1);
		$query2 = "SELECT * FROM `shipping`";
		$shippingrows = $adapter->fetchAll($query2);
		$query3 = "SELECT cart_item.product_id,cart_item.cart_item_id,cart_item.price,cart_item.quantity,product.name,product.sku FROM `cart_item` INNER JOIN `product` ON cart_item.product_id=product.product_id";
		$cartitem = $adapter->fetchAll($query3);
		$query4 = "SELECT SUM(price) FROM `cart_item`";
		$total = $adapter->fetchAll($query4);
		$query5 = "SELECT shipping_amount FROM `cart` WHERE cart_id=$id";
		$shippingAmount = $adapter->fetchAll($query5);
		
    ?>
    <form name="f1" method="POST">
	<table border="1" width="50%">
		<tr>
			<td width="20%" align="right">
				<select name="name">
					<?php foreach ($productrows as $row){ ?>
					<option value="<?php echo $row['name'] ?>"><?php echo $row['name']."-".$row['price'] ?></option>
				<?php } ?>
				</select>
            </td>
            <td width="20%" align="center">
            	<input type="text" name="quantity"></input>
            </td>
            <td width="10%"><button bgcolor="blue" type="submit" onclick="f1.action='show.php'" name="product">ADD ITEM</button></td>
        </tr>
        <tr>
			<td align="right">
				<select name="name">
					<?php foreach($shippingrows as $row) {?>
					<option value="<?php echo $row['name']?>"><?php echo $row['name']."-".$row['amount'] ?></option>
				    <?php } ?>
				</select>
			</td>
			<td></td>
			<td><button bgcolor="blue" type="submit" onclick="f1.action='show.php'" name="shipping">SAVE</button></td>
		</tr>
		<tr>
			<td align="right"><input type="text"></input></td>
			<td></td>
			<td><button bgcolor="blue" type="submit" onclick="f1.action='show.php'" name="tax">SAVE2</button></td>
		</tr>
		<tr>
			<th align="left"><h3>CART ITEM</h3></th>
			<td></td>
			<td><button type="submit" onclick="f1.action='show.php'" name="update">UPDATE</button></td>
		</tr>

	</table>
    </form>
	<table width="100%" border="1">
		<tr>
			<th>PRODUCT ID</th>
			<th>CART ITEM ID</th>
			<th>NAME</th>
			<th>SKU</th>
			<th>PRICE</th>
			<th>QUANTITY</th>
			<th>ROW TOTAL</th>
			<th>REMOVE</th>
		</tr>
		<?php foreach($cartitem as $cart){ ?>
		<tr>
			<td align="center"><?php echo $cart['product_id'] ?></td>
			<td align="center"><?php echo $cart['cart_item_id'] ?></td>
			<td align="center"><?php echo $cart['name'] ?></td>
			<td align="center"><?php echo $cart['sku'] ?></td>
			<td align="center"><?php echo $cart['price'] ?></td>
			<td align="center"><?php echo $cart['quantity'] ?></td>
			<td align="center"><?php echo $cart['quantity']*$cart['price'] ?></td>
			<td align="center"><a href="../controller/Cart.php?a=delete">REMOVE</a></td>

		</tr>
	    <?php } ?>
		<tr bgcolor="skyblue">
			<th colspan="6" align="right">TOTAL</th>
			<td align="center"><?php echo $total[0]['SUM(price)'] ?></td>
		</tr>
	</table>
	<table width="30%" border="1" align="right">
		<tr>
			<th>SUB TOTAL:</th>
			<td align="center"><?php echo $total[0]['SUM(price)'] ?></td>
		</tr>
		<tr>
			<th>SHIPPING AMOUNT:</th>
			<td align="center"><?php echo $shippingAmount[0]['shipping_amount']?></td>
		</tr>
		<tr>
			<th>TAX(%)</th>
			<td>xxxxx</td>
		</tr>
		<tr bgcolor="skyblue">
			<th align="right">GRAND TOTAL:</th>
			<td align="center">xxxxx</td>
		</tr>
	</table>

</body>
</html>