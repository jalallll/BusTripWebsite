<?php

session_start();

require "Database.php";

$DB = Database::connect();

if(isset($_POST['order-by'])){
    $country_btn_val = $_POST["country_btn"];
    $trip_name_btn_val = $_POST["trip_name_btn"];

    if($country_btn_val == "Ascending" && $trip_name_btn_val == "Ascending"){
        echo "Order By: Country (ASC), Trip Name (ASC) <br>";
        $query = "SELECT * FROM bustrip ORDER BY country ASC, tripname ASC";
        $_SESSION['bustrip_order']= $query; 

    }
    else if($country_btn_val == "Descending" && $trip_name_btn_val == "Ascending"){
        echo "Order By: Country (DSC), Trip Name (ASC) <br>";
        $query = "SELECT * FROM bustrip ORDER BY country DESC , tripname ASC";
        $_SESSION['bustrip_order']= $query; 
    }
    else if($country_btn_val == "Descending" && $trip_name_btn_val == "Descending"){
        echo "Order By: Country (DSC), Trip Name (DSC) <br>";
        $query = "SELECT * FROM bustrip ORDER BY country DESC , tripname DESC";
        $_SESSION['bustrip_order']= $query; 
    }
    else if($country_btn_val == "Ascending" && $trip_name_btn_val == "Descending"){
        echo "Order By: Country (ASC), Trip Name (DSC) <br>";
        $query = "SELECT * FROM bustrip ORDER BY country ASC , tripname DESC";
        $_SESSION['bustrip_order']= $query; 
    }
   
}
if(isset($_POST['fetch_trips_by_country'])){
    $country = $_POST['select_country'];
    $query = "SELECT * FROM bustrip WHERE country='$country'";
    $_SESSION['bustrip_order']= $query; 
    
}
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
if(isset($_GET['update'])){
    $id = $_GET['update'];

}


?>