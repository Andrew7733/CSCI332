<?php
require_once 'dbconnect.php';
$sql = "select * from Orders";
if (!$result = $mysqli->query($sql)) {
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
    exit;

}
echo '<table border=1>';
echo '<tr><th>CustomerID</th><th>Order Number</th><th>Total</tr>';
while($row = $result->fetch_assoc()) {
  echo '<tr>';
  echo '<td>' . $row['CustomerID'] . '</td>';
  echo '<td>' . $row['OrderNumber'] . '</td>';
  echo '<td>' . "$" . $row['Total'] . '</td>';
  echo '</tr>';
}
echo '</table>';

?>
