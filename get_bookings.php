<?php
require_once "Database.php";

$DB = Database::Connect();

$query = $_SESSION['booking_query'];



$result = $DB->query($query);
if (!$result) {
    die("databases query failed.");
}
?>
<table class="table table-bordered"> 
    <tr> 
        <th>Passenger ID</th> 
        <th>First Name</th> 
        <th>Last Name</th> 
        <th>Booking Price</th>
        <th>Trip Name</th>
        <th>Trip ID</th> 
    </tr>

<?php 
while ($row = mysqli_fetch_assoc($result)): ?>
    <tr>
        <td>
            <?php echo $row['passengerid']; ?>
        </td>
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
            <?php echo $row['tripid']; ?>
        </td>
        <td>
            <a href="main.php?delete_booking=<?php echo $row['passengerid']; ?>-<?php echo $row['tripid'] ?>">Delete Booking</a>
        </td>

    </tr>


<?php endwhile; ?>

<?php
mysqli_free_result($result);
echo "</table>";
?>