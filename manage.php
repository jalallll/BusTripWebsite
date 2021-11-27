<?php

session_start();


$trip_id = "";
$trip_name = "";
$trip_start = "";
$trip_end = "";
$trip_country = "";
$trip_license_plate = "";
$btn_val = "Add";

require_once "Database.php";

$DB = Database::connect();

if(isset($_POST['order-by'])){
    $country_btn_val = $_POST["country_btn"];
    $trip_name_btn_val = $_POST["trip_name_btn"];

    if($country_btn_val == "Ascending" && $trip_name_btn_val == "Ascending"){
        echo "Order By: Country (ASC), Trip Name (ASC) <br>";
        $query = "SELECT * FROM bustrip ORDER BY country ASC, tripname ASC";
        $_SESSION['bustrip_order']= $query; 
        header("location: main.php");


    }
    else if($country_btn_val == "Descending" && $trip_name_btn_val == "Ascending"){
        echo "Order By: Country (DSC), Trip Name (ASC) <br>";
        $query = "SELECT * FROM bustrip ORDER BY country DESC , tripname ASC";
        $_SESSION['bustrip_order']= $query; 
        header("location: main.php");

    }
    else if($country_btn_val == "Descending" && $trip_name_btn_val == "Descending"){
        echo "Order By: Country (DSC), Trip Name (DSC) <br>";
        $query = "SELECT * FROM bustrip ORDER BY country DESC , tripname DESC";
        $_SESSION['bustrip_order']= $query; 
        header("location: main.php");

    }
    else if($country_btn_val == "Ascending" && $trip_name_btn_val == "Descending"){
        echo "Order By: Country (ASC), Trip Name (DSC) <br>";
        $query = "SELECT * FROM bustrip ORDER BY country ASC , tripname DESC";
        $_SESSION['bustrip_order']= $query;
        header("location: main.php");
 
    }
   
}
if(isset($_POST['fetch_trips_by_country'])){
    $country = $_POST['select_country'];
    $query = "SELECT * FROM bustrip WHERE country='$country'";
    $_SESSION['bustrip_order']= $query;
    header("location: main.php");
 
    
}
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $response = $DB->query("DELETE FROM bustrip WHERE tripid='$id'");
    $_SESSION['message'] = "Successful Deletion";
    $_SESSION['msg_type'] = "Success";

    header("location: main.php");

}
if(isset($_GET['view_bookings'])){
    $id = $_GET['view_bookings'];
    $query = "SELECT passenger.passengerid, passenger.firstname, passenger.lastname, bustrip.tripid, booking.price, bustrip.tripname 
        FROM passenger 
        INNER JOIN booking ON passenger.passengerid = booking.passengerid
        INNER JOIN bustrip ON booking.tripid = bustrip.tripid
        WHERE passenger.passengerid='$id'";
    
    $_SESSION['booking_query'] = $query;
}
if(isset($_GET['delete_booking'])){
    $str = $_GET['delete_booking'];
    $pieces = explode("-", $str);
    $passenger_id = $pieces[0];
    $trip_id = $pieces[1];
    $query = "
        DELETE FROM booking
        WHERE passengerid = '$passenger_id' AND tripid = '$trip_id'
    ";
    
    $response = $DB->query($query);
}
 if(isset($_POST['add_trip'])){
    $name = $_POST['input_trip_name'];
    $start = $_POST['input_start_date'];
    $end = $_POST['input_end_date'];
    $country = $_POST['input_country'];
    $license_plate = $_POST['input_license_plate'];
    $id = $_POST['input_trip_id'];
    $url_image = $_POST['input_url_image'];
    $url_image = str_replace(" ", "", $url_image);
    if($url_image==""){
        $url_image="http://cs3319.gaul.csd.uwo.ca/vm221/a3jqr/null.jpg";
    }


    $query = "INSERT INTO 
    bustrip (tripid, tripname, startdate, enddate, country, licenseplatenumber, urlimage) 
    VALUES ('$id','$name', '$start', '$end', '$country', '$license_plate', '$url_image')";
    $add_data_res = $DB->query($query);

    if (!$add_data_res) {
        die("Failed Insert");
    } else{
        echo "Successful Insert";
        $_SESSION['message'] = "Successful Insert";
        $_SESSION['msg_type'] = "Success";
                echo "successful insert";

        header("location: main.php");

    }  
}
if(isset($_POST['update_trip'])){
    $name = $_POST['input_trip_name'];
    $start = $_POST['input_start_date'];
    $end = $_POST['input_end_date'];
    $country = $_POST['input_country'];
    $license_plate = $_POST['input_license_plate'];
    $id = $_POST['input_trip_id'];
    $url_image = $_POST['input_url_image'];


    $query = "UPDATE bustrip SET tripname='$name', startdate='$start', enddate='$end', country='$country', licenseplatenumber='$license_plate', urlimage='$url_image' WHERE tripid='$id'";
    $add_data_res = $DB->query($query);

    if (!$add_data_res) {
        die("Failed Insert");
    } else{
        echo "Successful Insert";
        $_SESSION['message'] = "Successful Insert";
        $_SESSION['msg_type'] = "Success";
        echo "successful update";
        header("location: main.php");

    }
}
if(isset($_GET['update'])){
    $id = $_GET['update'];
    $res = $DB->query("SELECT * FROM bustrip WHERE tripid='$id'");
    if(count($res)>0){
        $row = mysqli_fetch_assoc($res);
        $trip_id = $row['tripid'];
        $trip_name = $row['tripname'];
        $trip_start = $row['startdate'];
        $trip_end = $row['enddate'];
        $trip_country = $row['country'];
        $trip_license_plate = $row['licenseplatenumber'];
        $btn_val = "Update";
    }
}
if(isset($_POST['add_booking'])){
    $price = $_POST['booking_price'];
    $firstname = $_POST['passenger_pick_first'];
    $lastname = $_POST['passenger_pick_last'];

    $trip = $_POST['trip_pick'];
    $query = "INSERT INTO booking (passengerid, tripid, price) VALUES (
        (SELECT passengerid FROM passenger WHERE firstname='$firstname' AND lastname='$lastname'),
        (SELECT tripid FROM bustrip WHERE tripname='$trip'),
        '$price'
    )";
    $add_data_res = $DB->query($query);

    if (!$add_data_res) {
        die("Failed Insert");
    } else{
        echo "Successful Insert";
        $_SESSION['message'] = "Successful Insert";
        $_SESSION['msg_type'] = "Success";
                echo "successful insert";

        header("location: main.php");

    }  
}


?>