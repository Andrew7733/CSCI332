<?php
require_once 'dbconnect.php';
$sql = "select * from Customer";
if (!$result = $mysqli->query($sql)) {
    echo "Errno: " . $mysqli->errno . "</br>";
    echo "Error: " . $mysqli->error . "</br>";
    exit;

}
echo '<table border=1>';
echo '<tr><th>CustomerID</th><th>Name</th><th>Address</th><th>Actions</th></tr>';
while($row = $result->fetch_assoc()) {
  echo '<tr>';
  echo '<td>' . $row['CustomerID'] . '</td>';
  echo '<td>' . $row['Name'] . '</td>';
  echo '<td>' . $row['Address'] . '</td>';
  echo "<td><a href='edtUsersClient.php?CustomerID=" . $row['CustomerID'] . "'>EDIT</a>" . ' ';
  echo "<a href='delUsersServer.php?CustomerID=" . $row['CustomerID'] . "'>DEL</a>" . '</td>';
  echo '</tr>';
}
echo '</table>';
echo "</br></br>";
?>
<a href='addUsersClient.php'>Add New</a>
