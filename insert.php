<?php

include "config.php";

if (
    isset($_POST['award_season']) || isset($_POST['club_name']) || isset($_POST['championship_count']) || isset($_POST['club_managers_manager_id']) || isset($_POST['club_managers_club_id']) ||
    isset($_POST['birthPlace']) || isset($_POST['club_owns_stadium_id']) || isset($_POST['club_owns_club_id']) || isset($_POST['club_owns_stadium_name']) || isset($_POST['club_roster_club_id']) ||
    isset($_POST['club_roster_player_id']) || isset($_POST['club_transfers_transfer_id']) || isset($_POST['club_transfers_club_id']) || isset($_POST['club_transfers_player_id']) ||
    isset($_POST['club_transfers_season_number']) || isset($_POST['cups_last_champion']) || isset($_POST['cup_name']) || isset($_POST['cup_champions_cup_id']) ||
    isset($_POST['cup_champions_club_id']) || isset($_POST['birthPlace']) || isset($_POST['league_name']) || isset($_POST['team_count']) || isset($_POST['last_champion']) ||
    isset($_POST['prize_money']) || isset($_POST['league_roster_league_id']) || isset($_POST['league_roster_club_id']) || isset($_POST['league_roster_league_name']) ||
    isset($_POST['manager_full_name']) || isset($_POST['experience_years']) || isset($_POST['manager_award_award_id']) || isset($_POST['manager_award_manager_id']) ||
    isset($_POST['manager_award_season']) || isset($_POST['manager_award_award_type']) || isset($_POST['host_id']) || isset($_POST['guest_id']) || isset($_POST['match_referee_id']) ||
    isset($_POST['match_score']) || isset($_POST['match_datetime']) || isset($_POST['penalty_type']) || isset($_POST['penalty_length']) || isset($_POST['name']) || isset($_POST['goals']) ||
    isset($_POST['age']) || isset($_POST['birth_place']) || isset($_POST['player_awards_award_id']) || isset($_POST['player_awards_player_id']) || isset($_POST['player_awards_season']) ||
    isset($_POST['player_awards_awards_type']) || isset($_POST['punished_players_penalty_id']) || isset($_POST['punished_players_player_id']) || isset($_POST['referees_experience']) ||
    isset($_POST['referees_full_name']) || isset($_POST['stadium_name']) || isset($_POST['contract_date'])
) {



    if (!empty($_POST['full_name']) && !empty($_POST['goal_count']) && !empty($_POST['age']) && !empty($_POST['birth_place'])) {
        $full_name = $_POST['full_name'];
        $goal_count = $_POST['goal_count'];
        $age = $_POST['age'];
        $birth_place = $_POST['birth_place'];

        $sql_statement = "INSERT INTO players (full_name, goal_count, age, birth_place) VALUES ('$full_name','$goal_count','$age','$birth_place')";

        $result = mysqli_query($db, $sql_statement);
        echo "Your result is: " . $result;

    } else if (!empty($_POST['Award_ID']) && !empty($_POST['Season'])) {
        $award_id = $_POST['Award_ID'];
        $season = $_POST['Season'];


        $sql_statement = "INSERT INTO awards (Award_ID, Season) VALUES ('$award_id','$season')";

        $result = mysqli_query($db, $sql_statement);
        echo "Your result is: " . $result;

    } else if (!empty($_POST['Club_ID']) && !empty($_POST['Club_Name']) && !empty($_POST['Championship_Count'])) {

        $club_id = $_POST['Club_ID'];
        $club_name = $_POST['Club_Name'];
        $championship_count = $_POST['Championship_Count'];


        $sql_statement = "INSERT INTO clubs (Club_ID, Club_Name, Championship_Count) VALUES ('$club_id','$club_name','$championship_count')";

        $result = mysqli_query($db, $sql_statement);
        echo "Your result is: " . $result;

    } else if (!empty($_POST['Manager_ID']) && !empty($_POST['Club_ID']) && !empty($_POST['Tenure'])) {

        $manager_id = $_POST['Manager_ID'];
        $club_id = $_POST['Club_ID'];
        $tenure = $_POST['Tenure'];



        $sql_statement = "INSERT INTO club_managers (Manager_ID, Club_ID, Tenure) VALUES ('$manager_id','$club_id','$tenure')";

        $result = mysqli_query($db, $sql_statement);
        echo "Your result is: " . $result;


    } else if (!empty($_POST['Stadium_ID']) && !empty($_POST['Club_ID']) && !empty($_POST['Stadium_Name'])) {

        $stadium_id = $_POST['Stadium_ID'];
        $club_id = $_POST['Club_ID'];
        $stadium_name = $_POST['Stadium_Name'];



        $sql_statement = "INSERT INTO club_owns (Stadium_ID, Club_ID, Stadium_Name) VALUES ('$stadium_id','$club_id','$stadium_name')";

        $result = mysqli_query($db, $sql_statement);
        echo "Your result is: " . $result;


    } else if (!empty($_POST['Club_ID']) && !empty($_POST['Player_ID'])) {

        $club_id = $_POST['Club_ID'];
        $player_id = $_POST['Player_ID'];



        $sql_statement = "INSERT INTO club_roster (Club_ID, Player_ID) VALUES ('$club_id','$player_id')";

        $result = mysqli_query($db, $sql_statement);
        echo "Your result is: " . $result;


    } else if (!empty($_POST['Transfer_ID']) && !empty($_POST['Club_ID']) && !empty($_POST['Player_ID']) && !empty($_POST['Season_Number'])) {

        $transfer_id = $_POST['Transfer_ID'];
        $club_id = $_POST['Club_ID'];
        $player_id = $_POST['Player_ID'];
        $season_number = $_POST['Season_Number'];


        $sql_statement = "INSERT INTO club_transfers (Transfer_ID, Club_ID, Player_ID, Season_Number) VALUES ('$transfer_id','$club_id','$player_id','$season_number')";

        $result = mysqli_query($db, $sql_statement);
        echo "Your result is: " . $result;


    } else if (!empty($_POST['Cup_ID']) && !empty($_POST['Last_Champion']) && !empty($_POST['Cup_Name'])) {

        $cup_id = $_POST['Cup_ID'];
        $last_champion = $_POST['Last_Champion'];
        $cup_name = $_POST['Cup_Name'];


        $sql_statement = "INSERT INTO cups (Cup_ID, Last_Champion, Cup_Name) VALUES ('$cup_id','$last_champion','$cup_name')";

        $result = mysqli_query($db, $sql_statement);
        echo "Your result is: " . $result;


    } else if (!empty($_POST['Cup_ID']) && !empty($_POST['Club_ID']) && !empty($_POST['Season'])) {

        $cup_id = $_POST['Cup_ID'];
        $club_id = $_POST['Club_ID'];
        $season = $_POST['Season'];


        $sql_statement = "INSERT INTO cups (Cup_ID, Club_ID, Season) VALUES ('$cup_id','$club_id','$season')";

        $result = mysqli_query($db, $sql_statement);
        echo "Your result is: " . $result;


    } else if (!empty($_POST['League_ID']) && !empty($_POST['Name']) && !empty($_POST['Team_Count']) && !empty($_POST['Last_Champion']) && !empty($_POST['Prize_Money'])) {

        $league_id = $_POST['League_ID'];
        $name = $_POST['Name'];
        $team_count = $_POST['Team_Count'];
        $last_champion = $_POST['Last_Champion'];
        $prize_money = $_POST['Prize_Money'];


        $sql_statement = "INSERT INTO leagues (League_ID, Name, Team_Count, Last_Champion, Prize_Money) VALUES ('$league_id','$name','$team_count', '$last_champion', '$prize_money')";

        $result = mysqli_query($db, $sql_statement);
        echo "Your result is: " . $result;


    } else if (!empty($_POST['League_ID']) && !empty($_POST['Club_ID']) && !empty($_POST['League_Name'])) {

        $league_id = $_POST['League_ID'];
        $club_id = $_POST['Club_ID'];
        $league_name = $_POST['League_Name'];


        $sql_statement = "INSERT INTO league_roster (League_ID, Club_ID, League_Name) VALUES ('$league_id','$club_id','$league_name')";

        $result = mysqli_query($db, $sql_statement);
        echo "Your result is: " . $result;


    } else if (!empty($_POST['Award_ID']) && !empty($_POST['Manager_ID']) && !empty($_POST['Season']) && !empty($_POST['Award_Type'])) {

        $award_id = $_POST['Award_ID'];
        $manager_id = $_POST['Manager_ID'];
        $season = $_POST['Season'];
        $award_type = $_POST['Award_Type'];


        $sql_statement = "INSERT INTO manager_awards (Award_ID, Manager_ID, Season, Award_Type) VALUES ('$award_id', '$manager_id','$season','$award_type')";

        $result = mysqli_query($db, $sql_statement);
        echo "Your result is: " . $result;


    } else if (!empty($_POST['Match_ID']) && !empty($_POST['Host_ID']) && !empty($_POST['Guest_ID']) && !empty($_POST['Referee_ID']) && !empty($_POST['Score']) && !empty($_POST['Date_Time'])) {

        $match_id = $_POST['Match_ID'];
        $host_id = $_POST['Host_ID'];
        $guest_id = $_POST['Guest_ID'];
        $referee_id = $_POST['Referee_ID'];
        $score = $_POST['Score'];
        $date_time = $_POST['Date_Time'];


        $sql_statement = "INSERT INTO match (Match_ID, Host_ID, Guest_ID, Referee_ID, Score, Date_Time) VALUES ('$match_id', '$host_id','$guest_id','$referee_id','$score','$date_time')";

        $result = mysqli_query($db, $sql_statement);
        echo "Your result is: " . $result;


    } else if (!empty($_POST['Penalty_ID']) && !empty($_POST['Penalty_Type']) && !empty($_POST['Penalty_Length'])) {

        $penalty_id = $_POST['Penalty_ID'];
        $penalty_type = $_POST['Penalty_Type'];
        $penalty_length = $_POST['Penalty_Length'];


        $sql_statement = "INSERT INTO league_roster (Penalty_ID, Penalty_Type, Penalty_Length) VALUES ('$penalty_id','$penalty_type','$penalty_length')";

        $result = mysqli_query($db, $sql_statement);
        echo "Your result is: " . $result;


    } else if (!empty($_POST['Award_ID']) && !empty($_POST['Player_ID']) && !empty($_POST['Season']) && !empty($_POST['Award_Type'])) {

        $award_id = $_POST['Award_ID'];
        $player_id = $_POST['Player_ID'];
        $season = $_POST['Season'];
        $award_type = $_POST['Award_Type'];


        $sql_statement = "INSERT INTO player_awards (Award_ID, Player_ID, Season, Award_Type) VALUES ('$award_id', '$player_id','$season','$award_type')";

        $result = mysqli_query($db, $sql_statement);
        echo "Your result is: " . $result;


    } else if (!empty($_POST['Penalty_ID']) && !empty($_POST['Player_ID'])) {

        $penalty_id = $_POST['Penalty_ID'];
        $player_id = $_POST['Player_ID'];



        $sql_statement = "INSERT INTO punished_players (Penalty_ID, Player_ID) VALUES ('$penalty_id','$player_id')";

        $result = mysqli_query($db, $sql_statement);
        echo "Your result is: " . $result;


    } else if (!empty($_POST['Referee_ID']) && !empty($_POST['Year_Of_Experience']) && !empty($_POST['Full_Name'])) {

        $referee_id = $_POST['Referee_ID'];
        $year_of_experience = $_POST['Year_Of_Experience'];
        $full_name = $_POST['Full_Name'];


        $sql_statement = "INSERT INTO referees (Referee_ID, Year_Of_Experience, Full_Name) VALUES ('$referee_id','$year_of_experience','$full_name')";

        $result = mysqli_query($db, $sql_statement);
        echo "Your result is: " . $result;


    } else if (!empty($_POST['Stadium_ID']) && !empty($_POST['Stadium_Name'])) {

        $stadium_id = $_POST['Stadium_ID'];
        $stadium_name = $_POST['Stadium_Name'];



        $sql_statement = "INSERT INTO stadiums (Stadium_ID, Stadium_Name) VALUES ('$stadium_id','$stadium_name')";

        $result = mysqli_query($db, $sql_statement);
        echo "Your result is: " . $result;


    } else if (!empty($_POST['Transfer_ID']) && !empty($_POST['Contract_Date'])) {

        $transfer_id = $_POST['Transfer_ID'];
        $contract_date = $_POST['Contract_Date'];



        $sql_statement = "INSERT INTO transfers (Transfer_ID, Contract_Date) VALUES ('$transfer_id','$contract_date')";

        $result = mysqli_query($db, $sql_statement);
        echo "Your result is: " . $result;


    } else {
        echo "You should fill all the empty spaces!";
    }




} else {
    echo "No inputs were given try again.";
}



?>