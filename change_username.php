<?php


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    

    
    include "database.php";
    $id = $_GET['id'];




    $mysqli = require __DIR__ . "/database.php";
    
    $sql = sprintf("UPDATE user SET name = '%s' WHERE id=$id",
                   $mysqli->real_escape_string($_POST["name"]));
    
    $result = $mysqli->query($sql);
    
    if ($mysqli->query($sql) === TRUE) {
        echo "Name updated successfully '\r\n";
        echo "<td><a href='index.php'>Return to homepage!</a></td>";
      } else {
        echo "Error updating name: " . $mysqli->error;
      }

}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Change Username</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/light.min.css">
</head>
<body>
    
    <h1>Change Username</h1>

    
    <form method="post">
        <label for="name">New Name:</label>
        <input type="text" name="name" id="name"
               value="<?= htmlspecialchars($_POST["name"] ?? "") ?>">
        
        
        <button>Change Username</button>
    </form>
    
</body>
</html>








