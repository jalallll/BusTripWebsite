
<?php
$query = "SELECT * FROM bustrip";
$result = mysqli_query($connection,$query);
if (!$result) {
    die("databases query failed.");
}
echo "<table> <tr> <th>Tripid</th> <th>Trip Name</th> <th>Start Date</th> <th>End Date</th> <th>Country</th> <th>License Plate</th> </tr>";

while ($row = mysqli_fetch_assoc($result)) {
     echo "<tr> <td>" . $row['tripid'] . "</td> <td>" . $row['tripname'] . "</td> <td>" . $row['startdate'] . "/<td> <td>" . $row['enddate'] . "</td> <td>" . $row['country'] . "</td> <td>" . $row['licenseplatenumber'] . "</td> </tr>" ;
}
mysqli_free_result($result);
echo "</table>";
?>