<?php
include "database.php";
$id = $_GET['id'];

$sql = "UPDATE users SET name = '$name' WHERE id = id=$id";
if ($mysqli->query($sql) === TRUE) {
  echo "Name updated successfully '\r\n";
  echo "<td><a href='index.php'> <p></p> Return to homepage!</a></td>";
} else {
  echo "Error updating name: " . $mysqli->error;
}


?>