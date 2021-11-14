
<?php
$query = "SELECT * FROM bustrip";
$result = mysqli_query($connection,$query);
if (!$result) {
    die("databases query failed.");
}
echo "<table>";
echo "<th>Tripid</th>";
echo "<th>Trip Name</th>";
echo "<th>Start Date</th>";
echo "<th>End Date</th>";
echo "<th>Country</th>";
echo "<th>License Plate</th>";


while ($row = mysqli_fetch_assoc($result)) {
     echo "<tr>" . "<td>" . $row['tripid'] . "</td>" . "<td>" . $row['tripname'] . "</td>" .  "<td>" . $row['startdate'] . "/<td>" . "<td>" . $row['enddate'] . "</td>" . "<td>" . $row['country'] . "</td>" . "<td>" . $row['licenseplatenumber'] . "</td>" . "</tr>" ;
}
mysqli_free_result($result);
echo "</table>";
?>