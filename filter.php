<?php

include "config-dm.php";

if(isset($_GET['lower_age']) && isset($_GET['higher_age'])) {
    $int_1=$_GET['lower_age'];  // This variable is created for the numeric test 
    $int_2=$_GET['higher_age']; // This variable is created for the numeric test 

    $min = $int_1 ;     // To be used in the filter
    $max = $int_2 ;    //  To be used in the filter

    

    if($lower_age <= $higher_age) {   // Check if lower age is smaller or equal to the higher age

        if (filter_var($int_1, FILTER_VALIDATE_INT)!== false && filter_var($int_2, FILTER_VALIDATE_INT)!== false ) { // Check if the given input is numeric, if not print an error!

            echo("Variable is an integer");

            //Actual Filter Starts Here

            $sql_statement = "SELECT * FROM players WHERE $int_1 <= age  AND $int_2 >= age";
            $result = mysqli_query($db, $sql_statement);
        
            while ($row = mysqli_fetch_assoc($result)) { // Iterating the result
                $player_id = $row['player_id'];
                $full_name = $row['full_name'];
                $goal_count = $row['goal_count'];
                $age = $row['age'];
        
                echo $player_id . " " . $full_name . " " . $goal_count . " " . $age . "<br>";
            }   
        

        } else { //If non-numeric input is given in the filter, print this:
            echo("Variable is not an integer");
        }
    } else { //If lower_age is not smaller or equal to the higher age, print this:
        echo("Lower age cannot be higher than the higher age! Please enter again."); }
}