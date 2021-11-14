<?php
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






$input_trip_id = $_POST["input_trip_id"];
$input_trip_name = $_POST["input_trip_name"];
$input_start_date = $_POST["input_start_date"];
$input_end_date = $_POST["input_end_date"];


if($input_trip_id != ""){
    $query = "UPDATE bustrip set tripname='$input_trip_name', startdate='$input_start_date', enddate='$input_end_date' WHERE tripid='$input_trip_id'";
    $result = mysqli_query($connection,$query);
    if (!$result) {
        die("databases query failed.");
    }
    if ($result ){
        echo "<table> <tr> <th>Tripid</th> <th>Trip Name</th> <th>Start Date</th> <th>End Date</th> <th>Country</th> <th>License Plate</th> </tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr> <td>" . $row['tripid'] . "</td> <td>" . $row['tripname'] . "</td> <td>" . $row['startdate'] . "/<td> <td>" . $row['enddate'] . "</td> <td>" . $row['country'] . "</td> <td>" . $row['licenseplatenumber'] . "</td> </tr>" ;
        }
        mysqli_free_result($result);
        echo "</table>";
    }
}

?>