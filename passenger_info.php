<?php
require_once "Database.php";

$DB = Database::Connect();

$query = "SELECT passenger.firstname, passenger.lastname, passenger.passengerid, passport.* FROM passenger INNER JOIN passport ON passenger.passportnumber = passport.passportnumber";

$result = $DB->query($query);
if (!$result) {
    die("databases query failed.");
}
?>
<table class="table table-bordered"> 
    <tr> 
        <th>firstname</th> 
        <th>lastname</th> 
        <th>passportnumber</th> 
        <th>citizenship</th> 
        <th>expirydate</th> 
        <th>birthdate</th> 
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
            <?php echo $row['passportnumber']; ?>
        </td>
        <td>
            <?php echo $row['citizenship']; ?>
        </td>
        <td>
            <?php echo $row['expirydate']; ?>
        </td>
        <td>
            <?php echo $row['birthdate']; ?>
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