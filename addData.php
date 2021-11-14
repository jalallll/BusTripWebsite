<?php 

 $connection = mysqli_connect("localhost", "root","cs3319","04_assign2db") or die(mysqli_error($connection));

 if(isset($_POST['add_trip'])){
    $name = $_POST['input_trip_name'];
    $start = $_POST['input_start_date'];
    $end = $_POST['input_end_date'];
    $country = $_POST['input_country'];
    $license_plate = $_POST['input_license_plate'];
    $largest_id_query = "SELECT MAX(tripid) FROM bustrip";
    $largest_id = mysqli_query($connection, $largest_id_query);
    while ($row = mysqli_fetch_assoc($largest_id)){
        $new_id = $row['tripid'];
        echo $new_id;

    }
    
}
?>