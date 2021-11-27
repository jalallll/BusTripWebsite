<?php require_once 'manage.php';?>

<form method="POST" action="manage.php">
    <label>Pick First Name</label>
    <select name="passenger_pick_first" id="passenger_pick">
        <?php 
            $conn = mysqli_connect("localhost", "root","cs3319","04_assign2db");
            $res = mysqli_query($conn,"SELECT DISTINCT firstname FROM passenger");
            while ($row = mysqli_fetch_assoc($res)): 
                echo "<option>" . $row['firstname'] . "</option>";?>
            <?php endwhile; 
        ?>				
    </select>
    <input type="submit" value="Select First Name" name="select_first">

    <br>
    <label>Pick Last Name</label>
    <select name="passenger_pick_last" id="passenger_pick">
        <?php 
            $conn = mysqli_connect("localhost", "root","cs3319","04_assign2db");
            $res = mysqli_query($conn,"SELECT DISTINCT lastname FROM passenger");
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