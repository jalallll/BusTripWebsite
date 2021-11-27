
<?php

require_once "Database.php";

$DB = Database::Connect();

$query = $_SESSION['bustrip_order'];

$result = $DB->query($query);
if (!$result) {
    die("databases query failed.");
}
?>
<table class="table table-bordered"> 
    <tr> 
        <th>Tripid</th> 
        <th>Trip Name</th> 
        <th>Start Date</th> 
        <th>End Date</th> 
        <th>Country</th> 
        <th>License Plate</th>
        <th>Url Image</th> 
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
            <div class="card">
                <img src="<?php echo $row['urlimage']; ?>" alt="..." height="100" width="100">
            </div>
        </td>
        <td>
            <a href="main.php?delete=<?php echo $row['tripid']; ?>">Delete</a>
        </td>
        <td>
            <a href="main.php?update=<?php echo $row['tripid']; ?>">Update</a>
        </td>

    </tr>


<?php endwhile; ?>

<?php
mysqli_free_result($result);
echo "</table>";
?>