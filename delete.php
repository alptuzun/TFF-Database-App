<?php
include "database.php";
$id = $_GET['id'];

$sql = "DELETE FROM user WHERE id=$id";

if ($mysqli->query($sql) === TRUE) {
  echo "Record deleted successfully '\r\n";
  echo "<td><a href='index.php'> Return to homepage!</a></td>";
} else {
  echo "Error deleting record: " . $mysqli->error;
}


?>