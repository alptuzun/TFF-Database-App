<?php

include "config-dm.php"; // Makes mysql connection

$sql_statement = "SELECT * FROM players";

$result = mysqli_query($db, $sql_statement); // Executing query

while ($row = mysqli_fetch_assoc($result)) { // Iterating the result
    $player_id = $row['player_id'];
    $full_name = $row['full_name'];
    $goal_count = $row['goal_count'];
    $age = $row['age'];

    echo $player_id . " " . $full_name . " " . $goal_count . $age . "<br>";
}

?>