<?php
require 'dbconnect.php';
$temp = $_REQUEST['StoreID'];
$sql = "SELECT Catalogs.CatalogID, Name, Year FROM Catalogs, StoreHasCatalog WHERE Catalogs.CatalogID = StoreHasCatalog.CatalogID AND StoreHasCatalog.StoreID = $temp";
if (!$result = $mysqli->query($sql)) {
    echo "Error: Our query failed to execute and here is why: </br>";
    echo "Query: " . $sql . "</br>";
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
    exit;
}
echo "<table border=1>";
echo "<tr><th>CatalogID</th><th>Name</th><th>Year</th><th>Actions</th></tr>";
while ($row = $result->fetch_assoc()) {
  echo "<tr>";
  echo "<td>" . $row["CatalogID"] . "</td>";
  echo "<td>" . $row["Name"] . "</td>";
  echo "<td>" . $row["Year"] . "</td>";
  echo "<td><a href='delCatalogServer.php?CatalogID=" . $row['CatalogID'] . "&StoreID=" . $temp . "'>Remove from Store</a>" . '</td>';
  echo "</tr>";

}
echo "</table>";
?>
