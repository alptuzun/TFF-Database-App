<?php

include "config.php";

if (isset($_GET['awards_form'])) {
    $lower = !empty($_GET['lower_award_season']) ? $_GET['lower_award_season'] : 1923;
    $higher = !empty($_GET['higher_award_season']) ? $_GET['higher_award_season'] : 2023;

    if($lower <= $higher) {
        $sql_statement = "SELECT * FROM awards WHERE $lower <= Season AND $higher >= Season";
        $result = mysqli_query($db, $sql_statement);
        if (mysqli_num_rows($result) > 0) {
            // Start the table
            echo "<table border='1'>";

            // Print the table headers
            $row = mysqli_fetch_assoc($result);
            echo "<tr>";
            foreach($row as $key => $value) {
                echo "<th>" . $key . "</th>";
            }
            echo "</tr>";

            // Print the table rows
            mysqli_data_seek($result, 0); // Reset the result pointer to the beginning
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                foreach($row as $key => $value) {
                    echo "<td>" . $value . "</td>";
                }
                echo "</tr>";
            }

            // End the table
            echo "</table>";
        } else {
            echo "No records found.";
        }
    }
    else {
        echo("Lower value cannot be higher than the higher value! Please enter again.");
    }
    
} else if (isset($_GET['clubs_form'])) {
    $name = $_GET['club_name'];
    $lower = !empty($_GET['lower_championship_count']) ? $_GET['lower_championship_count'] : 0;
    $higher = !empty($_GET['higher_championship_count']) ? $_GET['higher_championship_count'] : 100;

    if($lower <= $higher) {
        $sql_statement = "SELECT * FROM clubs WHERE $lower <= Championship_count AND $higher >= Championship_count AND Club_Name LIKE '%$name%'";
        $result = mysqli_query($db, $sql_statement);
        if (mysqli_num_rows($result) > 0) {
            // Start the table
            echo "<table border='1'>";

            // Print the table headers
            $row = mysqli_fetch_assoc($result);
            echo "<tr>";
            foreach($row as $key => $value) {
                echo "<th>" . $key . "</th>";
            }
            echo "</tr>";

            // Print the table rows
            mysqli_data_seek($result, 0); // Reset the result pointer to the beginning
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                foreach($row as $key => $value) {
                    echo "<td>" . $value . "</td>";
                }
                echo "</tr>";
            }

            // End the table
            echo "</table>";
        } else {
            echo "No records found.";
        }
    }
    else {
        echo("Lower value cannot be higher than the higher value! Please enter again.");
    }
    
} else if (isset($_GET['club_managers_form'])) {
    $manager_name = $_GET['club_managers_manager_full_name'];
    $lower_experince = !empty($_GET['lower_club_managers_manager_experience_years']) ? $_GET['lower_club_managers_manager_experience_years'] : 0;
    $higher_experience = !empty($_GET['higher_club_managers_manager_experience_years']) ? $_GET['higher_club_managers_manager_experience_years'] : 50;
    $club_name = $_GET['club_managers_club_full_name'];
    $lower_championship = !empty($_GET['lower_club_managers_manager_experience_years']) ? $_GET['lower_club_managers_manager_experience_years'] : 0;
    $higher_championship = !empty($_GET['higher_club_managers_manager_experience_years']) ? $_GET['higher_club_managers_manager_experience_years'] : 100;

    if(($lower_experince <= $higher_experience) && ($lower_championship <= $higher_championship)) {
        $sql_statement = "SELECT manager.Manager_ID, manager.Full_Name, manager.Experience_Years, club_managers.Tenure, clubs.Club_ID, clubs.Club_Name, clubs.Championship_Count   FROM manager NATURAL JOIN clubs NATURAL JOIN club_managers WHERE $lower_experince <= experience_years AND $higher_experience >= experience_years AND Club_Name LIKE '%$club_name%' AND $lower_championship <= Championship_count AND $higher_championship >= Championship_count";
        $result = mysqli_query($db, $sql_statement);
        if (mysqli_num_rows($result) > 0) {
            // Start the table
            echo "<table border='1'>";

            // Print the table headers
            $row = mysqli_fetch_assoc($result);
            echo "<tr>";
            foreach($row as $key => $value) {
                echo "<th>" . $key . "</th>";
            }
            echo "</tr>";

            // Print the table rows
            mysqli_data_seek($result, 0); // Reset the result pointer to the beginning
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                foreach($row as $key => $value) {
                    echo "<td>" . $value . "</td>";
                }
                echo "</tr>";
            }

            // End the table
            echo "</table>";
        } else {
            echo "No records found.";
        }
    }
    else {
        echo("Lower value cannot be higher than the higher value! Please enter again.");
    }
    
} else if (!empty($_POST['club_managers_manager_id']) && !empty($_POST['club_managers_club_id']) && !empty($_POST['club_managers_tenure'])) {

    $manager_id = $_POST['club_managers_manager_id'];
    $club_id = $_POST['club_managers_club_id'];
    $tenure = $_POST['club_managers_tenure'];



    $sql_statement = "INSERT INTO club_managers (Manager_ID, Club_ID, Tenure) VALUES ('$manager_id','$club_id','$tenure')";

    $result = mysqli_query($db, $sql_statement);
    echo "Your result is: " . $result;


} else if (!empty($_POST['club_owns_stadium_id']) && !empty($_POST['club_owns_club_id']) && !empty($_POST['club_owns_stadium_name'])) {

    $stadium_id = $_POST['club_owns_stadium_id'];
    $club_id = $_POST['club_owns_club_id'];
    $stadium_name = $_POST['club_owns_stadium_name'];



    $sql_statement = "INSERT INTO club_owns (Stadium_ID, Club_ID, Stadium_Name) VALUES ('$stadium_id','$club_id','$stadium_name')";

    $result = mysqli_query($db, $sql_statement);
    echo "Your result is: " . $result;


} else if (!empty($_POST['club_roster_club_id']) && !empty($_POST['club_roster_player_id'])) {

    $club_id = $_POST['club_roster_club_id'];
    $player_id = $_POST['club_roster_player_id'];



    $sql_statement = "INSERT INTO club_roster (Club_ID, Player_ID) VALUES ('$club_id','$player_id')";

    $result = mysqli_query($db, $sql_statement);
    echo "Your result is: " . $result;


} else if (!empty($_POST['club_transfers_transfer_id']) && !empty($_POST['club_transfers_club_id']) && !empty($_POST['club_transfers_player_id']) && !empty($_POST['club_transfers_season_number'])) {

    $transfer_id = $_POST['club_transfers_transfer_id'];
    $club_id = $_POST['club_transfers_club_id'];
    $player_id = $_POST['club_transfers_player_id'];
    $season_number = $_POST['club_transfers_season_number'];


    $sql_statement = "INSERT INTO club_transfers (Transfer_ID, Club_ID, Player_ID, Season_Number) VALUES ('$transfer_id','$club_id','$player_id','$season_number')";

    $result = mysqli_query($db, $sql_statement);
    echo "Your result is: " . $result;


} else if (!empty($_POST['cups_last_champion']) && !empty($_POST['cup_name'])) {


    $last_champion = $_POST['cups_last_champion'];
    $cup_name = $_POST['cup_name'];


    $sql_statement = "INSERT INTO cups (Last_Champion, Cup_Name) VALUES ('$last_champion','$cup_name')";

    $result = mysqli_query($db, $sql_statement);
    echo "Your result is: " . $result;


} else if (!empty($_POST['cup_champions_cup_id']) && !empty($_POST['cup_champions_club_id']) && !empty($_POST['cup_champions_season'])) {

    $cup_id = $_POST['cup_champions_cup_id'];
    $club_id = $_POST['cup_champions_club_id'];
    $season = $_POST['cup_champions_season'];


    $sql_statement = "INSERT INTO cups (Cup_ID, Club_ID, Season) VALUES ('$cup_id','$club_id','$season')";

    $result = mysqli_query($db, $sql_statement);
    echo "Your result is: " . $result;


} else if (!empty($_POST['league_name']) && !empty($_POST['team_count']) && !empty($_POST['last_champion']) && !empty($_POST['prize_money'])) {


    $league_name = $_POST['league_name'];
    $team_count = $_POST['team_count'];
    $last_champion = $_POST['last_champion'];
    $prize_money = $_POST['prize_money'];


    //'Name' might caues a problem, if this is the case, change 'Name' to 'League_Name' in mySQL and here
    $sql_statement = "INSERT INTO leagues (League_Name, Team_Count, Last_Champion, Prize_Money) VALUES ('$league_name','$team_count', '$last_champion', '$prize_money')";

    $result = mysqli_query($db, $sql_statement);
    echo "Your result is: " . $result;


} else if (!empty($_POST['league_roster_league_id']) && !empty($_POST['league_roster_club_id']) && !empty($_POST['league_roster_league_name'])) {

    $league_id = $_POST['league_roster_league_id'];
    $club_id = $_POST['league_roster_club_id'];
    $league_name = $_POST['league_roster_league_name'];


    $sql_statement = "INSERT INTO league_roster (League_ID, Club_ID, League_Name) VALUES ('$league_id','$club_id','$league_name')";

    $result = mysqli_query($db, $sql_statement);
    echo "Your result is: " . $result;


} else if (!empty($_POST['manager_full_name']) && !empty($_POST['experience_years'])) {

    $manager_name = $_POST['manager_full_name'];
    $experience_years = $_POST['experience_years'];


    $sql_statement = "INSERT INTO manager (Full_Name, Experience_Years) VALUES ('$manager_name','$experience_years')";

    $result = mysqli_query($db, $sql_statement);
    echo "Your result is: " . $result;




} else if (!empty($_POST['manager_award_award_id']) && !empty($_POST['manager_award_manager_id']) && !empty($_POST['manager_award_season']) && !empty($_POST['manager_award_award_type'])) {

    $award_id = $_POST['manager_award_award_id'];
    $manager_id = $_POST['manager_award_manager_id'];
    $season = $_POST['manager_award_season'];
    $award_type = $_POST['manager_award_award_type'];


    $sql_statement = "INSERT INTO manager_awards (Award_ID, Manager_ID, Season, Award_Type) VALUES ('$award_id', '$manager_id','$season','$award_type')";

    $result = mysqli_query($db, $sql_statement);
    echo "Your result is: " . $result;


} else if (!empty($_POST['host_id']) && !empty($_POST['guest_id']) && !empty($_POST['match_referee_id']) && !empty($_POST['match_score']) && !empty($_POST['match_datetime'])) {

    $host_id = $_POST['host_id'];
    $guest_id = $_POST['guest_id'];
    $referee_id = $_POST['match_referee_id'];
    $score = $_POST['match_score'];
    $date_time = $_POST['match_datetime'];


    $sql_statement = "INSERT INTO match (Host_ID, Guest_ID, Referee_ID, Score, Date_Time) VALUES ('$host_id','$guest_id','$referee_id','$score','$date_time')";

    $result = mysqli_query($db, $sql_statement);
    echo "Your result is: " . $result;


} else if (!empty($_POST['penalty_type']) && !empty($_POST['penalty_length'])) {

    $penalty_type = $_POST['penalty_type'];
    $penalty_length = $_POST['penalty_length'];


    $sql_statement = "INSERT INTO league_roster (Penalty_Type, Penalty_Length) VALUES ('$penalty_type','$penalty_length')";

    $result = mysqli_query($db, $sql_statement);
    echo "Your result is: " . $result;


} else if (!empty($_POST['player_awards_award_id']) && !empty($_POST['player_awards_player_id']) && !empty($_POST['player_awards_season']) && !empty($_POST['player_awards_awards_type'])) {

    $award_id = $_POST['player_awards_award_id'];
    $player_id = $_POST['player_awards_player_id'];
    $season = $_POST['player_awards_season'];
    $award_type = $_POST['player_awards_awards_type'];


    $sql_statement = "INSERT INTO player_awards (Award_ID, Player_ID, Season, Award_Type) VALUES ('$award_id', '$player_id','$season','$award_type')";

    $result = mysqli_query($db, $sql_statement);
    echo "Your result is: " . $result;


} else if (!empty($_POST['punished_players_penalty_id']) && !empty($_POST['punished_players_player_id'])) {

    $penalty_id = $_POST['punished_players_penalty_id'];
    $player_id = $_POST['punished_players_player_id'];



    $sql_statement = "INSERT INTO punished_players (Penalty_ID, Player_ID) VALUES ('$penalty_id','$player_id')";

    $result = mysqli_query($db, $sql_statement);
    echo "Your result is: " . $result;


} else if (!empty($_POST['referees_experience']) && !empty($_POST['referees_full_name'])) {

    $year_of_experience = $_POST['referees_experience'];
    $full_name = $_POST['referees_full_name'];


    $sql_statement = "INSERT INTO referees (Year_Of_Experience, Full_Name) VALUES ('$year_of_experience','$full_name')";

    $result = mysqli_query($db, $sql_statement);
    echo "Your result is: " . $result;


} else if (!empty($_POST['stadium_name'])) {

    $stadium_name = $_POST['stadium_name'];



    $sql_statement = "INSERT INTO stadiums (Stadium_Name) VALUES ('$stadium_name')";

    $result = mysqli_query($db, $sql_statement);
    echo "Your result is: " . $result;


} else if (!empty($_POST['contract_date'])) {

    $contract_date = $_POST['contract_date'];



    $sql_statement = "INSERT INTO transfers (Contract_Date) VALUES ('$contract_date')";

    $result = mysqli_query($db, $sql_statement);
    echo "Your result is: " . $result;


} else {
    echo "You should fill all the empty spaces!";
}
    
?>