<?php

session_start();

require "Database.php";

$DB = Database::connect();




if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $response = $DB->query("DELETE FROM bustrip WHERE tripid='$id'");
    $_SESSION['message'] = "Successful Deletion";
    $_SESSION['msg_type'] = "Success";

    header("location: main.php");

}
 if(isset($_POST['add_trip'])){
    $name = $_POST['input_trip_name'];
    $start = $_POST['input_start_date'];
    $end = $_POST['input_end_date'];
    $country = $_POST['input_country'];
    $license_plate = $_POST['input_license_plate'];
    $id = $_POST['input_trip_id'];
    $add_data_query = "INSERT INTO bustrip (tripid, tripname, startdate, enddate, country, licenseplatenumber) VALUES ('$id','$name', '$start', '$end', '$country', '$license_plate')";
    $add_data_res = $DB->query($add_data_query);

    if (!$add_data_res) {
        die("Failed Insert");
    } else{
        echo "Successful Insert";
        $_SESSION['message'] = "Successful Insert";
        $_SESSION['msg_type'] = "Success";
        header("location: main.php");

    }
}

?>