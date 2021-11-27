<?php require_once 'manage.php';?>
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


        <h2>Order Bus Trips By Country</h2>
		<form method="POST" action="manage.php">
			<label>Select All Bus Trips From Specific Country</label>
			<br>
			<input type="text" name="select_country">
			<input type="submit" value="Fetch" name="fetch_trips_by_country"> 
		</form>