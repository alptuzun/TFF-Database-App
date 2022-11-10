<?php


include "config-dm.php";

?>

<form action="delete.php" method="POST">
<select name="player_id">

<?php

$sql_command = "SELECT player_id, player_name FROM players";

$myresult = mysqli_query($db, $sql_command);

while ($id_rows = mysqli_fetch_assoc($myresult)) {
    $player_id = $id_rows['player_id'];
    $player_name = $id_rows['bname'];
    echo "<option value=$player_id>" . $player_name . " - " . $player_id . "</option>";
}

?>

</select>
<button>DELETE</button>
</form>