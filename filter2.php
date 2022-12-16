<?php

include "config-dm.php";

    if (isset($_POST['search_string'])) {
      /*$selected_table = $_POST['table'];
      // Connect to the database
      // Select the specified table*/
      $sql = "SELECT * FROM cups";
      $result = mysqli_query($db, $sql);
      // Print the results
      while ($row = $result->fetch_assoc()) {
        foreach($row as $ind => $val)
        {
            echo "Column name: $ind, Column Value: $val<br />";
        }
        echo "<hr />";
    }




     /* while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['col1'] . "</td>";
        echo "<td>" . $row['col2'] . "</td>";
        echo "<td>" . $row['col3'] . "</td>";
        echo "</tr>";
      }*/
    }
  ?>