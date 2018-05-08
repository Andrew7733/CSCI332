<?php

require_once 'dbconnect.php';
$sql = "select * from Customer where CustomerID=" . $_REQUEST['CustomerID'];

if (!$result = $mysqli->query($sql)) {
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
    exit;

}
$row = $result->fetch_assoc();
?>

<form action='edtUsersServer.php'>
<input type="hidden" name="id" value="<?php echo $row['id']?>">
CustomerID<input name="CustomerID" value="<?php echo $row['CustomerID']?>"></br>
Name<input name="Name" value="<?php echo $row['Name']?>"></br>
Address<input name="Address"value="<?php echo $row['Address']?>"></br>
<input type="submit" value="Save">
</form>