<?php require_once 'manage.php';?>

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