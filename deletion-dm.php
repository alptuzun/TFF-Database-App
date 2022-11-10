<?php

include "config-dm.php";

if (!empty($_POST['player_id'])) 
{
    $player_id = $_POST['player_id'];
    $sql_statement = "DELETE FROM players WHERE player_id = $player_id";
    $result = mysqli_query($db, $sql_statement);
    echo "Your result is " . $result;
}

?>