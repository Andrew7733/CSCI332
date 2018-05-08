<?php
require_once 'dbconnect.php';

$sql = "insert into Customer(CustomerID,Name,Address) VALUES ('" . $_REQUEST['CustomerID'] . 
  "','" . $_REQUEST['Name'] . "','" . $_REQUEST['Address'] . "')";

if (!$result = $mysqli->query($sql)) {
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
    exit;

}

?>
<script>window.location='listUsers.php'; </script>