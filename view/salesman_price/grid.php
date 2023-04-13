<?php 
salesPrices = $this->getSalesmanPrice();

?> 

  <!DOCTYPE html>
  <html>
  <head>
  	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<title></title>
  </head>
  <body>
  	<table>
  		<tr>
  			<td>Salesman:</td>
  			<td>
  				<select>
  					<option></option>
  				</select>
  			</td>
  			<td><button type="submit">Update</button></td>
  			<td><button type="submit">DELETE</button></td>

  		</tr>
  		<tr>
  			<th>PRODUCT ID</th>
  			<th>NAME</th>
  			<th>COST</th>
  			<th>PRICE</th>
  			<th>S.PRICE</th>
  			<th>REMOVE</th>
  		</tr>
  		<tr>
  			<td><?php echo $salesPrice['product_id'] ?></td>
  			<td><?php echo $salesPrice['name'] ?></td>
  			<td><?php echo $salesPrice['cost'] ?></td>
  			<td><?php echo $salesPrice['price'] ?></td>
  			<td><input name=s.price value=<?php echo $salesPrice['s.price'] ?>></input></td>
  		</tr>
  	</table>
  
  </body>
  </html>