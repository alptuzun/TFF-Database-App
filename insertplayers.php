<?php 

include "config-dm.php"; 



if (!empty($_POST['full_name'])){ 
    $full_name = $_POST['full_name']; 
    $goal_count = $_POST['goal_count']; 
    $age = $_POST['age'];
    $birth_place = $_POST['birth_place'];
    
    $sql_statement = "INSERT INTO players (full_name, goal_count, age, birth_place) VALUES ('$full_name','$goal_count','$age','$birth_place')"; 

    $result = mysqli_query($db, $sql_statement);
    echo "Your result is: " . $result;
} 
else 
{
    echo "You did not enter your name.";
}



?>