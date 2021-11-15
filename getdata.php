
<?php

require "Database.php";

$DB = Database::connect();

$query = $_SESSION['bustrip_order'];

$result = $DB->query($query);
if (!$result) {
    die("databases query failed.");
}
?>
<table> 
    <tr> 
        <th>Tripid</th> 
        <th>Trip Name</th> 
        <th>Start Date</th> 
        <th>End Date</th> 
        <th>Country</th> 
        <th>License Plate</th> 
    </tr>

<?php 
while ($row = mysqli_fetch_assoc($result)): ?>
    <tr>
        <td>
            <?php echo $row['tripid']; ?>
        </td>
        <td>
            <?php echo $row['tripname']; ?>
        </td>
        <td>
            <?php echo $row['startdate']; ?>
        </td>
        <td>
            <?php echo $row['enddate']; ?>
        </td>
        <td>
            <?php echo $row['country']; ?>
        </td>
        <td>
            <?php echo $row['licenseplatenumber']; ?>
        </td>
        <td>
            <a href="manage.php?delete=<?php echo $row['tripid']; ?>">Delete</a>
        </td>
        <td>
            <a href="manage.php?update=<?php echo $row['tripid']; ?>">Update</a>
        </td>

        </td>
    </tr>


<?php endwhile; ?>

<?php
mysqli_free_result($result);
echo "</table>";
?>