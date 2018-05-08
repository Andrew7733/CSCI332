<?php
require_once 'dbconnect.php';

$sql = "update Customer set CustomerID = '" . $_REQUEST['CustomerID'] . 
  "',Name='" . $_REQUEST['Name'] . "',Address='" . $_REQUEST['Address'] . "' where CustomerID=" . $_REQUEST['CustomerID'];  
 


if (!$result = $mysqli->query($sql)) {
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
    exit;

}

?>
<script>window.location='listUsers.php'; </script>