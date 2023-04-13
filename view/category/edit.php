<?php 

$categorys = $this->getCategory();
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
			<td>ADD CATEGORY</td>
			<td>CANCEL</td>
			<td><button>ADD</button></td>
		</tr>
		<?php echo foreach($categorys as $category) {?>
		<tr>
			<td>Category Name</td>
			<td><input type="text" name="name" value="<?php echo $category['name'] ?>"></input></td>
		</tr>
		<tr>
			<td>Discription</td>
			<td><input type="text" name="discription" value="<?php echo $category['discription'] ?>"></input></td>
		</tr>
		<tr>
			<td>Url</td>
			<td><input type="text" name="url" value="<?php echo $category['url'] ?>"></input></td>
		</tr>
	   <?php } ?>
	</table>

</body>
</html>