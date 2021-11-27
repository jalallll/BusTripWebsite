<?php require_once 'manage.php';?>

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
            $firstname = $_POST['passenger_pick_first'];
            if($firstname!=""){
                $conn = mysqli_connect("localhost", "root","cs3319","04_assign2db");
                $res = mysqli_query($conn,"SELECT lastname FROM passenger WHERE firstname='$firstname'");
                while ($row = mysqli_fetch_assoc($res)): 
                    echo "<option>" . $row['lastname'] . "</option>";?>
                <?php endwhile; 
            }

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