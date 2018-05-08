<?php
require_once 'dbconnect.php';
$temp=$_REQUEST['StoreID'];
$sql = "DELETE FROM StoreHasCatalog WHERE CatalogID=" . $_REQUEST['CatalogID'] . " AND StoreID=" . $_REQUEST['StoreID'];
if (!$result = $mysqli->query($sql)) {
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
    exit;

}

?>
<script>
var StoreID = "<?php echo $temp ?>";
  window.location.href = "listCatalogs.php?StoreID=" + StoreID;
</script>
