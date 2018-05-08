<?php
require_once 'dbconnect.php';

$sql = "update Catalogs set CatalogID = '" . $_REQUEST['CatalogID'] . 
  "',Name='" . $_REQUEST['Name'] . "',Year='" . $_REQUEST['Year'] . "' where CatalogID=" . $_REQUEST['CatalogID'];  
 


if (!$result = $mysqli->query($sql)) {
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
    exit;

}

?>
<script>window.location='listCatalogs.php'; </script>
