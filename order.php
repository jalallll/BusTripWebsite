<?php

$radio_btn_val = $_POST["radio_btn"];




if($radio_btn_val == "Ascending"){
    echo "ascending";
    $query = "SELECT * FROM bustrip ORDER BY country ASC";
    $result = mysqli_query($connection,$query);
}
else if($radio_btn_val == "Descending"){
    echo "descending";
    $query = "SELECT * FROM bustrip ORDER BY country DESC";
    $result = mysqli_query($connection,$query);
}

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