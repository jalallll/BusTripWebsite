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
    $new_id = $largest_id + 1;
    $add_data_query = "INSERT INTO bustrip (tripid, tripname, startdate, enddate, country, licenseplatenumber) VALUES ('$new_id','$name', '$start', '$end', '$country', '$license_plate')";
    $add_data_res = mysqli_query($connection, $add_data_query);

    if (!$add_data_res) {
        die("Failed Insert");
    } else{
        echo "Successful Insert";
    }
}
?>