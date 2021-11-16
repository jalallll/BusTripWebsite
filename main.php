<?php
session_start();

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
		require_once 'manage.php';
		require_once 'Database.php';
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
			<label>Bus Trip</label>
			<br> 
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

			<?php if($btn_val=="Update"): ?>
			<input type="submit" value="<?php echo $btn_val; ?>" name="update_trip">
			
			<?php else: ?>
			<input type="submit" value="<?php echo $btn_val; ?>" name="add_trip">
			<?php endif; ?>
 
		</form>
		<br> 
		<br> 
		<form method="POST" action="manage.php">
			<label>Select All Bus Trips From Specific Country</label>
			<br>
			<input type="text" name="select_country">
			<input type="submit" value="Fetch" name="fetch_trips_by_country"> 
		</form>
		<br>
		<br>
		<form method="POST" action="manage.php">
			<label>Create Booking</label>
			<br>
			<label>Pick A Passenger</label>
			<select name="passenger_pick" id="passenger_pick">
				<?php 
					$DB = Database::Connect();
					$res = $DB->get_all_passenger_firstname();
					while ($row = mysqli_fetch_assoc($result)): 
						$name = $row['firstname'];?>
						<option value="<?php $name; ?>"><?php $name; ?></option>
            		<?php endwhile; ?>
				
				
				<option value="saab">Saab</option>
			</select>
			<br>
			<label>Pick A Trip</label>
			<select name="trip_pick" id="trip_pick">
				<option value="volvo">trip1</option>
				<option value="saab">trip2</option>
			</select>
			<input type="submit" value="Create Booking" name="add_booking">
		</form>
	</body>
</html>
