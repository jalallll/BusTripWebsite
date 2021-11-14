<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>CS3319 A3</title>
	</head>
	<body>
		<?php include 'connectdb.php';?>
		<h1>Assignment 3</h1>
		<?php include 'getdata.php';?>
		<h2>Order Country By:</h2>
		<form method="POST" action="order.php">
			<input type="radio" name="radio_btn" value="Ascending" checked>Ascending
			<br> 
			<input type="radio" name="radio_btn" value="Descending">Descending
			<input type="submit" value="Result" name="Result"> 
		</form>
	</body>
</html>
