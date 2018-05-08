<?php
$username="andrew23_admin";
$password="thisisfor332";
$database="andrew23_CSCI332";

$mysqli = new mysqli("127.0.0.1", $username, $password, $database);


if ($mysqli->connect_errno) {
    echo "Errno: " . $mysqli->connect_errno . "</br>";
    echo "Error: " . $mysqli->connect_error . "</br>";
    exit;
}
?>
