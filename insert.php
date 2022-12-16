<?php 

include "config-dm.php"; 

if (isset($_POST['award_season']) || isset($_POST['club_name']) || isset($_POST['championship_count']) || isset($_POST['club_managers_manager_id']) || isset($_POST['club_managers_club_id']) ||
isset($_POST['birthPlace']) || isset($_POST['club_owns_stadium_id']) || isset($_POST['club_owns_club_id']) || isset($_POST['club_owns_stadium_name']) || isset($_POST['club_roster_club_id']) || 
isset($_POST['club_roster_player_id']) ||isset($_POST['club_transfers_transfer_id']) || isset($_POST['club_transfers_club_id']) || isset($_POST['club_transfers_player_id']) || 
isset($_POST['club_transfers_season_number']) || isset($_POST['cups_last_champion']) || isset($_POST['cup_name']) ||isset($_POST['cup_champions_cup_id']) || 
isset($_POST['cup_champions_club_id']) || isset($_POST['birthPlace']) || isset($_POST['league_name']) || isset($_POST['team_count']) || isset($_POST['last_champion']) ||
isset($_POST['prize_money']) || isset($_POST['league_roster_league_id']) || isset($_POST['league_roster_club_id']) || isset($_POST['league_roster_league_name']) ||
isset($_POST['manager_full_name']) || isset($_POST['experience_years']) || isset($_POST['manager_award_award_id']) || isset($_POST['manager_award_manager_id']) || 
isset($_POST['manager_award_season']) || isset($_POST['manager_award_award_type']) || isset($_POST['host_id']) || isset($_POST['guest_id']) || isset($_POST['match_referee_id']) ||
isset($_POST['match_score']) || isset($_POST['match_datetime']) || isset($_POST['penalty_type']) || isset($_POST['penalty_length'])|| isset($_POST['name']) || isset($_POST['goals']) || 
isset($_POST['age']) || isset($_POST['birth_place']) || isset($_POST['player_awards_award_id']) || isset($_POST['player_awards_player_id'])|| isset($_POST['player_awards_season']) || 
isset($_POST['player_awards_awards_type']) || isset($_POST['punished_players_penalty_id']) || isset($_POST['punished_players_player_id']) || isset($_POST['referees_experience']) || 
isset($_POST['referees_full_name'])|| isset($_POST['stadium_name']) || isset($_POST['contract_date'])){
    
    

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
    echo "No inputs were given try again.";
}



?>