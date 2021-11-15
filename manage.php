<?php

session_start();

 $dbhost = "localhost";
 $dbuser= "root";
 $dbpass = "cs3319";
 $dbname = "04_assign2db";
 $connection = mysqli_connect($dbhost, $dbuser,$dbpass,$dbname);
if (mysqli_connect_errno()) {
     die("database connection failed :" .
     mysqli_connect_error() .
     "(" . mysqli_connect_errno() . ")"
         );
    }



if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $connection->query("DELETE FROM bustrip WHERE tripid='$id'");
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
    $add_data_res = mysqli_query($connection, $add_data_query);

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