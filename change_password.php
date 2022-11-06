<?php


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    

    
    include "database.php";
    $id = $_GET['id'];




    $mysqli = require __DIR__ . "/database.php";
    
    $sql = sprintf("UPDATE user SET password_hash = '%s' WHERE id=$id",
                   $mysqli->real_escape_string(password_hash($_POST["pass"], PASSWORD_DEFAULT)));
    
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
    <title>Change Password</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/light.min.css">
</head>
<body>
    
    <h1>Change Password</h1>

    
    <form method="post">
        <label for="password">Password:</label>
        <input type="text" name="password" id="password"
               value="<?= htmlspecialchars($_POST["pass"] ?? "") ?>">
        
        
        <button>Change Password</button>
    </form>
    
</body>
</html>








