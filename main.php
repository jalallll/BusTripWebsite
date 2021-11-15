<?php
session_start();
$_SESSION['bustrip_order']="SELECT * FROM bustrip";  

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>CS3319 A3</title>
	</head>
	<body>
		<h1>Assignment 3</h1>
		<?php
		
		include_once 'getdata.php';
		include 'manage.php';
		?>
		<form method="POST" action="manage.php">
			<h2>Order By Country:</h2>
			<input type="radio" name="country_btn" value="Ascending" checked>Ascending
			<input type="radio" name="country_btn" value="Descending">Descending
			<br> 
			<h2>Order By Trip Name:</h2>
			<input type="radio" name="trip_name_btn" value="Ascending" checked>Ascending
			<input type="radio" name="trip_name_btn" value="Descending">Descending
			<input type="submit" value="Result" name="order-by"> 
		</form>
		<br> 
		<br> 
		<form method="POST" action="manage.php">
			<label>Add New Bus Trip</label>
			<br> 
			<label>Trip ID (Unique)</label>
			<input type="text" name="input_trip_id">
			<br>
			<label>Trip Name</label>
			<input type="text" name="input_trip_name">
			<br>
			<label>Start Date</label>
			<input type="text" name="input_start_date">
			<br>
			<label>End Date</label>
			<input type="text" name="input_end_date">
			<br>
			<label>Country</label>
			<input type="text" name="input_country">
			<br>
			<label>License Plate Number</label>
			<input type="text" name="input_license_plate">
			<input type="submit" value="Add" name="add_trip"> 
		</form>
		<br> 
		<br> 
		<form method="POST" action="manage.php">
			<label>Select All Bus Trips From Specific Country</label>
			<br>
			<input type="text" name="select_country">
			<input type="submit" value="Fetch" name="fetch_trips_by_country"> 
		</form>
		<form method="POST" action="manage.php">
			
			<input type="submit" value="Create Booking" name="add_booking">
		</form>
	</body>
</html>
