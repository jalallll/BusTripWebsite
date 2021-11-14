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
		<form method="POST" action="order.php">
			<h2>Order By Country:</h2>
			<input type="radio" name="country_btn" value="Ascending" checked>Ascending
			<input type="radio" name="country_btn" value="Descending">Descending
			<br> 
			<h2>Order By Trip Name:</h2>
			<input type="radio" name="trip_name_btn" value="Ascending" checked>Ascending
			<input type="radio" name="trip_name_btn" value="Descending">Descending
			<input type="submit" value="Result" name="Result"> 
		</form>

		<form method="POST" action="addData.php">
			<label>Add New Bus Trip</label>
			<label>Trip Name</label>
			<input type="text" name="input_trip_name">
			<label>Start Date</label>
			<input type="text" name="input_start_date">
			<label>End Date</label>
			<input type="text" name="input_end_date">
			<label>Country</label>
			<input type="text" name="input_country">
			<label>License Plate Number</label>
			<input type="text" name="input_license_plate">
			<input type="submit" value="Add" name="add_trip"> 
		</form>
	</body>
</html>
