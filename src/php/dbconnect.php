<?php
$mysqli = new mysqli('11.66.0.24', 'andrew23_CSCI332');

if ($mysqli->connect_errno) {
    echo "Errno: " . $mysqli->connect_errno . "</br>";
    echo "Error: " . $mysqli->connect_error . "</br>";
    exit;
}
?>
