<?php
require_once 'dbconnect.php';
$sql = "select * from Stores";
if (!$result = $mysqli->query($sql)) {
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
    exit;

}
echo 'Stores View';
echo '<table border=1>';
echo '<tr><th>Store Name</th><th>Address</th><th>Profit Margin</th><th>StoreID</th><th>View Catalogs</th></tr>';
while($row = $result->fetch_assoc()) {
  echo '<tr>';
  echo '<td>' . $row['Name'] . '</td>';
  echo '<td>' . $row['Address'] . '</td>';
  echo '<td>' . $row['Profit Margin'] . '</td>';
  echo '<td>' . $row['StoreID'] . '</td>';
  echo "<td><a href='listCatalogs.php?StoreID=" . $row['StoreID'] . "'>View</a></td></tr>";
}
echo '</table>';
?>