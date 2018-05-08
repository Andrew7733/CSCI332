<?php

require_once 'dbconnect.php';

$sql = "select * from Catalogs where CatalogID=" . $_REQUEST['CatalogID'];

if (!$result = $mysqli->query($sql)) {
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
    exit;

}
$row = $result->fetch_assoc();
?>

<form action='edtCatalogServer.php'>
<input type="hidden" name="id" value="<?php echo $row['id']?>">
Catalog ID:<input name="CatalogID" value="<?php echo $row['CatalogID']?>"></br>
Catalog Name:<input name="Name" value="<?php echo $row['Name']?>"></br>
Catalog Year<input name="Year" value="<?php echo $row['Year']?>"></br>
<input type="submit" value="Save">
</form>
