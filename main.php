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
		<h1>Trips Table</h1>
		<?php
		
		include_once 'getdata.php';
		require_once 'manage.php';

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
		<h2>Add New Bus Trip</h2> 
		<form method="POST" action="manage.php">
			<label>Trip ID (Unique)</label>
			<input type="text" value="<?php echo $trip_id; ?>" name="input_trip_id">
			<br>
			<label>Trip Name</label>
			<input type="text" value="<?php echo $trip_name; ?>" name="input_trip_name">
			<br>
			<label>Start Date</label>
			<input type="text" value="<?php echo $trip_start; ?>" name="input_start_date">
			<br>
			<label>End Date</label>
			<input type="text" value="<?php echo $trip_end; ?>" name="input_end_date">
			<br>
			<label>Country</label>
			<input type="text" value="<?php echo $trip_country; ?>" name="input_country">
			<br>
			<label>License Plate Number</label>
			<input type="text" value="<?php echo $trip_license_plate; ?>" name="input_license_plate">
			<label>Url Image</label>
			<input type="text" value="<?php echo $trip_url_image; ?>" name="input_url_image">

			<?php if($btn_val=="Update"): ?>
			<input type="submit" value="<?php echo $btn_val; ?>" name="update_trip">
			
			<?php else: ?>
			<input type="submit" value="<?php echo $btn_val; ?>" name="add_trip">
			<?php endif; ?>
 
		</form>
		<br> 
		<br>
		<h2>Order Bus Trips By Country</h2>
		<form method="POST" action="manage.php">
			<label>Select All Bus Trips From Specific Country</label>
			<br>
			<input type="text" name="select_country">
			<input type="submit" value="Fetch" name="fetch_trips_by_country"> 
		</form>
		<br>
		<br>
		<h1>Create New Booking</h1>
		<form method="POST" action="manage.php">
			<label>Pick First Name</label>
			<select name="passenger_pick_first" id="passenger_pick">
				<?php 
					$conn = mysqli_connect("localhost", "root","cs3319","04_assign2db");
					$res = mysqli_query($conn,"SELECT firstname FROM passenger");
					while ($row = mysqli_fetch_assoc($res)): 
						echo "<option>" . $row['firstname'] . "</option>";?>
            		<?php endwhile; 
				?>				
			</select>
			<br>
			<label>Pick Last Name</label>
			<select name="passenger_pick_last" id="passenger_pick">
				<?php 
					$conn = mysqli_connect("localhost", "root","cs3319","04_assign2db");
					$res = mysqli_query($conn,"SELECT lastname FROM passenger");
					while ($row = mysqli_fetch_assoc($res)): 
						echo "<option>" . $row['lastname'] . "</option>";?>
            		<?php endwhile; 
				?>				
			</select>
			<br>
			<label>Pick A Trip</label>
			<select name="trip_pick" id="trip_pick">
				<?php 
					$conn = mysqli_connect("localhost", "root","cs3319","04_assign2db");
					$res = mysqli_query($conn,"SELECT tripname FROM bustrip");
					while ($row = mysqli_fetch_assoc($res)): 
						echo "<option>" . $row['tripname'] . "</option>";?>
            		<?php endwhile; 
				?>
			</select>
			<input type="text" name="booking_price" placeholder="Price">
			<input type="submit" value="Create Booking" name="add_booking">
		</form>
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
