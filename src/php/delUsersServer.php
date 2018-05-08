<?php
require_once 'dbconnect.php';

$sql = "delete from Customer where CustomerID=" . $_REQUEST['CustomerID'];

if (!$result = $mysqli->query($sql)) {
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
    exit;

}

?>
<script>window.location='listUsers.php'; </script>