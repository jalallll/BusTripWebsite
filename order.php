<?php

require "Database.php";

$DB = Database::connect();

$country_btn_val = $_POST["country_btn"];

$trip_name_btn_val = $_POST["trip_name_btn"];




if($country_btn_val == "Ascending" && $trip_name_btn_val == "Ascending"){
    echo "Order By: Country (ASC), Trip Name (ASC) <br>";
    $query = "SELECT * FROM bustrip ORDER BY country ASC, tripname ASC";
}
else if($country_btn_val == "Descending" && $trip_name_btn_val == "Ascending"){
    echo "Order By: Country (DSC), Trip Name (ASC) <br>";
    $query = "SELECT * FROM bustrip ORDER BY country DESC , tripname ASC";
}
else if($country_btn_val == "Descending" && $trip_name_btn_val == "Descending"){
    echo "Order By: Country (DSC), Trip Name (DSC) <br>";
    $query = "SELECT * FROM bustrip ORDER BY country DESC , tripname DESC";
}
else if($country_btn_val == "Ascending" && $trip_name_btn_val == "Descending"){
    echo "Order By: Country (ASC), Trip Name (DSC) <br>";
    $query = "SELECT * FROM bustrip ORDER BY country ASC , tripname DESC";
}
$result = $DB->query($query);
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


?>