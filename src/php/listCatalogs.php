<?php
require 'dbconnect.php';

$sql = "SELECT * from Catalogs";
if (!$result = $mysqli->query($sql)) {
    echo "Error: Our query failed to execute and here is why: </br>";
    echo "Query: " . $sql . "</br>";
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
    exit;
}
echo "<table border=1>";
echo "<tr><th>CatalogID</th><th>Name</th><th>Year</th></tr>";
while ($s = $result->fetch_assoc()) {
  echo "<tr>";
  echo "<td>" . $s["CatalogID"] . "</td>";
  echo "<td>" . $s["Name"] . "</td>";
  echo "<td>" . $s["Year"] . "</td>";
  echo "<td>";
  echo "<a href='delCatalogServer.php?id=" . $s["id"] . "'>DEL</a> ";
  echo "<a href='edtCatalogClient.php?id=" . $s["id"] . "'>EDT</a>";
  echo "</td>";
  echo "</tr>";

}
echo "</table>";
?>
