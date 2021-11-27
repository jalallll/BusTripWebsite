<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

		<title>CS3319 A3</title>
	</head>
	<body>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
		<h1>Assignment 3</h1>
		<br>
		<?php include_once 'order_trips.php';?>

		<br> 
		<h1>Trips Table</h1>
		<?php include_once 'getdata.php';?>
		<br>
		<br>
		<h2>Add New Bus Trip</h2> 
		<?php include_once 'add_trip.php';?>
		<br> 
		<br>
		<h1>Create New Booking</h1>
		<?php include_once 'add_booking.php';?>
		<br>
		<br>
		<br>
		<h1>Passenger Information</h1>
		<?php include_once 'passenger_info.php'; ?>
		<br>
		<br>
		<h1>Bookings</h1>
		<?php include_once 'get_bookings.php'; ?>
		<br>
		<br>
		<h1>Bus Trips With No Bookings</h1>
		<?php include_once 'empty_trips.php'; ?>
	</body>
</html>
