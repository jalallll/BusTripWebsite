
<?php

require_once "Database.php";

$DB = Database::Connect();

$query = "SELECT DISTINCT 
            bustrip.tripid, bustrip.tripname, 
            bustrip.startdate, bustrip.enddate, 
            bustrip.country, bustrip.licenseplatenumber, bustrip.urlimage
        FROM bustrip
        WHERE bustrip.tripid NOT IN (SELECT tripid FROM booking)";

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
    </tr>


<?php endwhile; ?>

<?php
mysqli_free_result($result);
echo "</table>";
?>