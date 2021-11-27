<?php
require_once "Database.php";

$DB = Database::Connect();

$query = $_SESSION['booking_query'];

echo $query;


$result = $DB->query($query);
if (!$result) {
    die("databases query failed.");
}
?>
<table> 
    <tr> 
        <th>First Name</th> 
        <th>Last Name</th> 
        <th>Booking Price</th>
        <th>Trip Name</th> 
    </tr>

<?php 
while ($row = mysqli_fetch_assoc($result)): ?>
    <tr>
        <td>
            <?php echo $row['firstname']; ?>
        </td>
        <td>
            <?php echo $row['lastname']; ?>
        </td>
        <td>
            <?php echo $row['price']; ?>
        </td>
        <td>
            <?php echo $row['tripname']; ?>
        </td>
        <td>
            <a href="main.php?view_bookings=<?php echo $row['passengerid']; ?>">View Bookings</a>
        </td>

        </td>
    </tr>


<?php endwhile; ?>

<?php
mysqli_free_result($result);
echo "</table>";
?>