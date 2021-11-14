<?php
 $dbhost = "localhost";
 $dbuser= "root";
 $dbpass = "cs3319";
 $dbname = "04_assign2db";
 $connection = mysqli_connect($dbhost, $dbuser,$dbpass,$dbname);
if (mysqli_connect_errno()) {
     die("database connection failed :" .
     mysqli_connect_error() .
     "(" . mysqli_connect_errno() . ")"
         );
    }



if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $connection->query("DELETE FROM bustrip WHERE tripid='$id'");

}


?>