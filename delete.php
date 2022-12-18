<?php

include "config.php";

if (
    isset($_POST['award_id']) || isset($_POST['club_id']) || isset($_POST['club_managers_manager_id']) || isset($_POST['club_managers_club_id']) || isset($_POST['club_owns_stadium_id']) || isset($_POST['club_owns_club_id']) || isset($_POST['club_roster_club_id']) || isset($_POST['club_roster_player_id']) || isset($_POST['club_transfers_transfer_id']) || isset($_POST['club_transfers_club_id']) || isset($_POST['club_transfers_player_id']) || isset($_POST['cup_id']) || isset($_POST['cup_champions_cup_id']) || isset($_POST['cup_champions_club_id']) || isset($_POST['cup_champions_season_year']) || isset($_POST['league_id']) || isset($_POST['league_roster_league_id']) || isset($_POST['league_roster_club_id']) || isset($_POST['manager_id']) || isset($_POST['manager_award_award_id']) || isset($_POST['manager_award_manager_id']) || isset($_POST['match_id']) || isset($_POST['penalty_id']) || isset($_POST['player_id']) || isset($_POST['player_awards_award_id']) || isset($_POST['player_awards_player_id']) || isset($_POST['punished_players_penalty_id']) || isset($_POST['punished_players_player_id']) || isset($_POST['referee_id']) || isset($_POST['stadium_id']) || isset($_POST['transfer_id'])
) {


    if (!empty($_POST['player_id'])) {

        $player_id = $_POST['player_id'];
        $sql_statement = "DELETE FROM players WHERE player_id = $player_id";
        $result = mysqli_query($db, $sql_statement);
        echo "Your result is " . $result;


        $rows_affected = mysqli_affected_rows($db);

        // Print the number of rows affected
        echo "\n" . "Number of rows affected: " . $rows_affected . "\n";

    } else if (!empty($_POST['award_id'])) {


        $award_id = $_POST['award_id'];

        $sql_statement = "DELETE FROM awards WHERE Award_ID = $award_id";

        $rows_affected = mysqli_affected_rows($db);




        $result = mysqli_query($db, $sql_statement);
        echo "Your result is " . $result . "\n";



        // Print the number of rows affected
        echo "\n" . "Number of rows affected: " . $rows_affected . "\n";


    } else if (!empty($_POST['club_id'])) {


        $club_id = $_POST['club_id'];

        $sql_statement = "DELETE FROM clubs WHERE Club_ID = $club_id";

        $result = mysqli_query($db, $sql_statement);
        echo "Your result is " . $result;

        $rows_affected = mysqli_affected_rows($db);

        // Print the number of rows affected
        echo "\n" . "Number of rows affected: " . $rows_affected . "\n";


    } else if (!empty($_POST['club_managers_manager_id']) && !empty($_POST['club_managers_club_id'])) {


        $club_manager_id = $_POST['club_managers_manager_id'];
        $club_id = $_POST['club_managers_club_id'];


        $sql_statement = "DELETE FROM club_managers WHERE Club_ID = $club_id AND Manager_ID = $club_manager_id";

        $result = mysqli_query($db, $sql_statement);
        echo "Your result is " . $result;



        $rows_affected = mysqli_affected_rows($db);
        // Print the number of rows affected
        echo "\n" . "Number of rows affected: " . $rows_affected . "\n";


    } else if (!empty($_POST['club_owns_stadium_id']) && !empty($_POST['club_owns_club_id'])) {


        $stadium_id = $_POST['club_owns_stadium_id'];
        $club_id = $_POST['club_owns_club_id'];


        $sql_statement = "DELETE FROM club_owns WHERE Club_ID = $club_id AND Stadium_ID = $stadium_id";

        $result = mysqli_query($db, $sql_statement);
        echo "Your result is " . $result;


        $rows_affected = mysqli_affected_rows($db);

        // Print the number of rows affected
        echo "\n" . "Number of rows affected: " . $rows_affected . "\n";


    } else if (!empty($_POST['club_roster_club_id']) && !empty($_POST['club_roster_player_id'])) {


        $player_id = $_POST['club_roster_player_id'];
        $club_id = $_POST['club_roster_club_id'];


        $sql_statement = "DELETE FROM club_roster WHERE Club_ID = $club_id AND Player_ID = $player_id";

        $result = mysqli_query($db, $sql_statement);
        echo "Your result is " . $result;



        $rows_affected = mysqli_affected_rows($db);
        // Print the number of rows affected
        echo "\n" . "Number of rows affected: " . $rows_affected . "\n";


    } else if (!empty($_POST['club_transfers_transfer_id']) && !empty($_POST['club_transfers_club_id']) && !empty($_POST['club_transfers_player_id'])) {


        $player_id = $_POST['club_transfers_player_id'];
        $club_id = $_POST['club_transfers_club_id'];
        $transfer_id = $_POST['club_transfers_transfer_id'];


        $sql_statement = "DELETE FROM club_transfers WHERE Club_ID = $club_id AND Player_ID = $player_id AND Transfer_ID = $transfer_id";

        $result = mysqli_query($db, $sql_statement);
        echo "Your result is " . $result;


        $rows_affected = mysqli_affected_rows($db);
        // Print the number of rows affected
        echo "\n" . "Number of rows affected: " . $rows_affected . "\n";


    } else if (!empty($_POST['cup_id'])) {


        $cup_id = $_POST['cup_id'];

        $sql_statement = "DELETE FROM cups WHERE Cup_ID = $cup_id";

        $result = mysqli_query($db, $sql_statement);
        echo "Your result is " . $result;


        $rows_affected = mysqli_affected_rows($db);
        // Print the number of rows affected
        echo "\n" . "Number of rows affected: " . $rows_affected . "\n";


    } else if (!empty($_POST['cup_champions_cup_id']) && !empty($_POST['cup_champions_club_id']) && !empty($_POST['cup_champions_season_year'])) {


        $cup_id = $_POST['cup_champions_cup_id'];
        $club_id = $_POST['cup_champions_club_id'];
        $season_year = $_POST['cup_champions_season_year'];


        $sql_statement = "DELETE FROM cup_champions WHERE Club_ID = $club_id AND Cup_ID = $cup_id AND Season = $season_year";

        $result = mysqli_query($db, $sql_statement);
        echo "Your result is " . $result;


        $rows_affected = mysqli_affected_rows($db);
        // Print the number of rows affected
        echo "\n" . "Number of rows affected: " . $rows_affected . "\n";


    } else if (!empty($_POST['league_id'])) {


        $league_id = $_POST['league_id'];



        $sql_statement = "DELETE FROM leagues WHERE League_ID = $league_id";

        $result = mysqli_query($db, $sql_statement);
        echo "Your result is " . $result;



        $rows_affected = mysqli_affected_rows($db);
        // Print the number of rows affected
        echo "\n" . "Number of rows affected: " . $rows_affected . "\n";



    } else if (!empty($_POST['league_roster_league_id']) && !empty($_POST['league_roster_club_id'])) {


        $league_id = $_POST['league_roster_league_id'];
        $club_id = $_POST['league_roster_club_id'];


        $sql_statement = "DELETE FROM league_roster WHERE Club_ID = $club_id AND League_ID = $league_id";

        $result = mysqli_query($db, $sql_statement);
        echo "Your result is " . $result;


        $rows_affected = mysqli_affected_rows($db);
        // Print the number of rows affected
        echo "\n" . "Number of rows affected: " . $rows_affected . "\n";


    } else if (!empty($_POST['manager_id'])) {


        $manager_id = $_POST['manager_id'];

        $sql_statement = "DELETE FROM manager WHERE Manager_ID = $manager_id";

        $result = mysqli_query($db, $sql_statement);
        echo "Your result is " . $result;


        $rows_affected = mysqli_affected_rows($db);
        // Print the number of rows affected
        echo "\n" . "Number of rows affected: " . $rows_affected . "\n";


    } else if (!empty($_POST['manager_award_award_id']) && !empty($_POST['manager_award_manager_id'])) {


        $award_id = $_POST['manager_award_award_id'];
        $manager_id = $_POST['manager_award_manager_id'];

        $sql_statement = "DELETE FROM manager_awards WHERE Award_ID = $award_id AND Manager_ID = $manager_id";

        $result = mysqli_query($db, $sql_statement);
        echo "Your result is " . $result;



        $rows_affected = mysqli_affected_rows($db);
        // Print the number of rows affected
        echo "\n" . "Number of rows affected: " . $rows_affected . "\n";


    } else if (!empty($_POST['match_id'])) {


        $match_id = $_POST['match_id'];

        $sql_statement = "DELETE FROM `match` WHERE Match_ID = $match_id";

        $result = mysqli_query($db, $sql_statement);
        echo "Your result is " . $result;




        $rows_affected = mysqli_affected_rows($db);
        // Print the number of rows affected
        echo "\n" . "Number of rows affected: " . $rows_affected . "\n";


    } else if (!empty($_POST['penalty_id'])) {


        $penalty_id = $_POST['penalty_id'];

        $sql_statement = "DELETE FROM penalty WHERE Penalty_ID = $penalty_id";

        $result = mysqli_query($db, $sql_statement);
        echo "Your result is " . $result;



        $rows_affected = mysqli_affected_rows($db);
        // Print the number of rows affected
        echo "\n" . "Number of rows affected: " . $rows_affected . "\n";


    } else if (!empty($_POST['player_awards_award_id']) && !empty($_POST['player_awards_player_id'])) {


        $award_id = $_POST['player_awards_award_id'];
        $player_id = $_POST['player_awards_player_id'];


        $sql_statement = "DELETE FROM player_awards WHERE Award_ID = $award_id AND Player_ID = $player_id";

        $result = mysqli_query($db, $sql_statement);
        echo "Your result is " . $result;



        $rows_affected = mysqli_affected_rows($db);
        // Print the number of rows affected
        echo "\n" . "Number of rows affected: " . $rows_affected . "\n";


    } else if (!empty($_POST['punished_players_penalty_id']) && !empty($_POST['punished_players_player_id'])) {


        $penalty_id = $_POST['punished_players_penalty_id'];
        $player_id = $_POST['punished_players_player_id'];


        $sql_statement = "DELETE FROM punished_players WHERE Penalty_ID = $penalty_id AND Player_ID = $player_id";

        $result = mysqli_query($db, $sql_statement);
        echo "Your result is " . $result;



        $rows_affected = mysqli_affected_rows($db);
        // Print the number of rows affected
        echo "\n" . "Number of rows affected: " . $rows_affected . "\n";


    } else if (!empty($_POST['referee_id'])) {


        $referee_id = $_POST['referee_id'];

        $sql_statement = "DELETE FROM referees WHERE Referee_ID = $referee_id";

        $result = mysqli_query($db, $sql_statement);
        echo "Your result is " . $result;




        $rows_affected = mysqli_affected_rows($db);
        // Print the number of rows affected
        echo "\n" . "Number of rows affected: " . $rows_affected . "\n";


    } else if (!empty($_POST['stadium_id'])) {


        $stadium_id = $_POST['stadium_id'];

        $sql_statement = "DELETE FROM stadiums WHERE Stadium_ID = $stadium_id";

        $result = mysqli_query($db, $sql_statement);
        echo "Your result is " . $result . "\n";



        $rows_affected = mysqli_affected_rows($db);
        // Print the number of rows affected
        echo "\n" . "Number of rows affected: " . $rows_affected . "\n";


    } else if (!empty($_POST['transfer_id'])) {


        $transfer_id = $_POST['transfer_id'];

        $sql_statement = "DELETE FROM transfers WHERE Transfer_ID = $transfer_id";

        $result = mysqli_query($db, $sql_statement);
        echo "Your result is " . $result;



        $rows_affected = mysqli_affected_rows($db);
        // Print the number of rows affected
        echo "\n" . "Number of rows affected: " . $rows_affected . "\n";


    } else {
        echo "You should fill all the empty spaces!";
    }




} else {

    echo "No inputs were given try again.";
}

?>