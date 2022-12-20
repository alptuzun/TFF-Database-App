<?php

include "config.php";

if (isset($_GET['awards_form'])) {
    $lower = !empty($_GET['lower_award_season']) ? $_GET['lower_award_season'] : 1923;
    $higher = !empty($_GET['higher_award_season']) ? $_GET['higher_award_season'] : 2023;

    if ($lower <= $higher) {
        $sql_statement = "SELECT * FROM awards WHERE $lower <= Season AND $higher >= Season";
        $result = mysqli_query($db, $sql_statement);
        if (mysqli_num_rows($result) > 0) {
    // Start the table
    echo "<table border='1'>";

    // Print the table headers
    $row = mysqli_fetch_assoc($result);
    echo "<tr>";
    foreach ($row as $key => $value) {
        echo "<th>" . $key . "</th>";
    }
    echo "</tr>";

    // Print the table rows
    mysqli_data_seek($result, 0); // Reset the result pointer to the beginning
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        foreach ($row as $key => $value) {
            if (is_null($value)) {
                echo "<td>Deleted</td>";
            } else {
                echo "<td>" . $value . "</td>";
            }
        }
        echo "</tr>";
    }

    // End the table
    echo "</table>";
} else {
            echo "No records found.";
        }
    } else {
        echo ("Lower value cannot be higher than the higher value! Please enter again.");
    }

} else if (isset($_GET['clubs_form'])) {
    $name = $_GET['club_name'];
    $lower = !empty($_GET['lower_championship_count']) ? $_GET['lower_championship_count'] : 0;
    $higher = !empty($_GET['higher_championship_count']) ? $_GET['higher_championship_count'] : 100;

    if ($lower <= $higher) {
        $sql_statement = "SELECT * FROM clubs WHERE $lower <= Championship_Count AND $higher >= Championship_Count AND Club_Name LIKE '%$name%'";
        $result = mysqli_query($db, $sql_statement);
        if (mysqli_num_rows($result) > 0) {
    // Start the table
    echo "<table border='1'>";

    // Print the table headers
    $row = mysqli_fetch_assoc($result);
    echo "<tr>";
    foreach ($row as $key => $value) {
        echo "<th>" . $key . "</th>";
    }
    echo "</tr>";

    // Print the table rows
    mysqli_data_seek($result, 0); // Reset the result pointer to the beginning
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        foreach ($row as $key => $value) {
            if (is_null($value)) {
                echo "<td>Deleted</td>";
            } else {
                echo "<td>" . $value . "</td>";
            }
        }
        echo "</tr>";
    }

    // End the table
    echo "</table>";
} else {
            echo "No records found.";
        }
    } else {
        echo ("Lower value cannot be higher than the higher value! Please enter again.");
    }

} else if (isset($_GET['club_managers_form'])) {
    $manager_name = $_GET['club_managers_manager_full_name'];
    $lower_experince = !empty($_GET['lower_club_managers_manager_experience_years']) ? $_GET['lower_club_managers_manager_experience_years'] : 0;
    $higher_experience = !empty($_GET['higher_club_managers_manager_experience_years']) ? $_GET['higher_club_managers_manager_experience_years'] : 50;
    $club_name = $_GET['club_managers_club_full_name'];
    $lower_championship = !empty($_GET['lower_club_managers_manager_experience_years']) ? $_GET['lower_club_managers_manager_experience_years'] : 0;
    $higher_championship = !empty($_GET['higher_club_managers_manager_experience_years']) ? $_GET['higher_club_managers_manager_experience_years'] : 100;

    if (($lower_experince <= $higher_experience) && ($lower_championship <= $higher_championship)) {
        $sql_statement = "SELECT manager.Manager_ID, manager.Full_Name, manager.Experience_Years, club_managers.Tenure, clubs.Club_ID, clubs.Club_Name, clubs.Championship_Count   FROM manager NATURAL JOIN clubs NATURAL JOIN club_managers WHERE $lower_experince <= experience_years AND $higher_experience >= experience_years AND Club_Name LIKE '%$club_name%' AND $lower_championship <= Championship_count AND $higher_championship >= Championship_count";
        $result = mysqli_query($db, $sql_statement);
        if (mysqli_num_rows($result) > 0) {
            // Start the table
            echo "<table border='1'>";
        
            // Print the table headers
            $row = mysqli_fetch_assoc($result);
            echo "<tr>";
            foreach ($row as $key => $value) {
                echo "<th>" . $key . "</th>";
            }
            echo "</tr>";
        
            // Print the table rows
            mysqli_data_seek($result, 0); // Reset the result pointer to the beginning
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                foreach ($row as $key => $value) {
                    if (is_null($value)) {
                        echo "<td>Deleted</td>";
                    } else {
                        echo "<td>" . $value . "</td>";
                    }
                }
                echo "</tr>";
            }
        
            // End the table
            echo "</table>";
        } else {
            echo "No records found.";
        }
    } else {
        echo ("Lower value cannot be higher than the higher value! Please enter again.");
    }

} else if (isset($_GET['club_owns_form'])) {

    $stadium_name = $_GET['club_owns_stadium_name'];

    $club_name = $_GET['club_owns_club_name'];


    $lower_championship = !empty($_GET['lower_club_owns_club_championship_count']) ? $_GET['lower_club_owns_club_championship_count'] : 0;
    $higher_championship = !empty($_GET['higher_club_owns_club_championship_count']) ? $_GET['higher_club_owns_club_championship_count'] : 99999;

    if (($lower_championship <= $higher_championship)) {
        $sql_statement = "SELECT stadiums.Stadium_Name, stadiums.Stadium_ID, clubs.Club_ID, clubs.Club_Name, clubs.Championship_Count FROM stadiums NATURAL JOIN clubs NATURAL JOIN club_owns WHERE Stadium_Name LIKE '%$stadium_name%' AND Club_Name LIKE '%$club_name%' AND $lower_championship <= Championship_count AND $higher_championship >= Championship_count";
        $result = mysqli_query($db, $sql_statement);
        if (mysqli_num_rows($result) > 0) {
    // Start the table
    echo "<table border='1'>";

    // Print the table headers
    $row = mysqli_fetch_assoc($result);
    echo "<tr>";
    foreach ($row as $key => $value) {
        echo "<th>" . $key . "</th>";
    }
    echo "</tr>";

    // Print the table rows
    mysqli_data_seek($result, 0); // Reset the result pointer to the beginning
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        foreach ($row as $key => $value) {
            if (is_null($value)) {
                echo "<td>Deleted</td>";
            } else {
                echo "<td>" . $value . "</td>";
            }
        }
        echo "</tr>";
    }

    // End the table
    echo "</table>";
} else {
            echo "No records found.";
        }
    } else {
        echo ("Lower value cannot be higher than the higher value! Please enter again.");
    }

} else if (isset($_GET['club_roster_form'])) {

    $club_name = $_GET['club_roster_club_name'];

    $player_full_name = $_GET['club_roster_player_name'];

    $lower_goal_count = !empty($_GET['lower_club_roster_player_goal_count']) ? $_GET['lower_club_roster_player_goal_count'] : 0;
    $higher_goal_count = !empty($_GET['higher_club_roster_player_goal_count']) ? $_GET['higher_club_roster_player_goal_count'] : 99999;

    $lower_player_age = !empty($_GET['lower_club_roster_player_age']) ? $_GET['lower_club_roster_player_age'] : 0;
    $higher_player_age = !empty($_GET['higher_club_roster_player_age']) ? $_GET['higher_club_roster_player_age'] : 99999;

    $player_birth_place = $_GET['club_roster_player_birth_place'];

    $lower_championship = !empty($_GET['lower_club_roster_club_championship_count']) ? $_GET['lower_club_roster_club_championship_count'] : 0;
    $higher_championship = !empty($_GET['higher_club_roster_club_championship_count']) ? $_GET['higher_club_roster_club_championship_count'] : 99999;

    if (($lower_goal_count <= $higher_goal_count) && ($lower_player_age <= $higher_player_age) && ($lower_championship <= $higher_championship)) {
        $sql_statement = "SELECT players.Player_ID, players.Full_Name, players.Goal_Count, players.Birth_Place, clubs.Club_ID, clubs.Club_Name, clubs.Championship_Count   FROM players NATURAL JOIN clubs NATURAL JOIN club_roster WHERE Birth_Place LIKE '%$player_birth_place%' AND Full_Name LIKE '%$player_full_name%' AND Club_Name LIKE '%$club_name%' AND $lower_championship <= Championship_count AND $higher_championship >= Championship_count";
        $result = mysqli_query($db, $sql_statement);
        if (mysqli_num_rows($result) > 0) {
    // Start the table
    echo "<table border='1'>";

    // Print the table headers
    $row = mysqli_fetch_assoc($result);
    echo "<tr>";
    foreach ($row as $key => $value) {
        echo "<th>" . $key . "</th>";
    }
    echo "</tr>";

    // Print the table rows
    mysqli_data_seek($result, 0); // Reset the result pointer to the beginning
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        foreach ($row as $key => $value) {
            if (is_null($value)) {
                echo "<td>Deleted</td>";
            } else {
                echo "<td>" . $value . "</td>";
            }
        }
        echo "</tr>";
    }

    // End the table
    echo "</table>";
} else {
            echo "No records found.";
        }
    } else {
        echo ("Lower value cannot be higher than the higher value! Please enter again.");
    }

} else if (isset($_GET['club_transfers_form'])) {


    $club_name = $_GET['club_transfers_club_name'];

    $player_full_name = $_GET['club_transfers_player_full_name'];

    $lower_goal_count = !empty($_GET['lower_club_transfers_player_goal_count']) ? $_GET['lower_club_transfers_player_goal_count'] : 0;
    $higher_goal_count = !empty($_GET['higher_club_transfers_player_goal_count']) ? $_GET['higher_club_transfers_player_goal_count'] : 99999;

    $lower_player_age = !empty($_GET['lower_club_transfers_player_age']) ? $_GET['lower_club_transfers_player_age'] : 0;
    $higher_player_age = !empty($_GET['higher_club_transfers_player_age']) ? $_GET['higher_club_transfers_player_age'] : 99999;

    $player_birth_place = $_GET['club_transfers_player_birth_place'];

    $lower_season_number = !empty($_GET['lower_club_transfers_season_number']) ? $_GET['lower_club_transfers_season_number'] : 0;
    $higher_season_number = !empty($_GET['higher_club_transfers_season_number']) ? $_GET['higher_club_transfers_season_number'] : 99999;

    $lowerDate = !empty($_GET['lower_club_transfers_transfer_date']) ? $_GET['lower_club_transfers_transfer_date'] : date('Y-m-d\TH:i', strtotime('1950-01-01 00:00'));
    $higherDate = !empty($_GET['higher_club_transfers_transfer_date']) ? $_GET['higher_club_transfers_transfer_date'] : date('Y-m-d\TH:i', strtotime('2030-01-01 00:00'));

    $lowerDate = DateTime::createFromFormat('Y-m-d\TH:i', $lowerDate);
    $higherDate = DateTime::createFromFormat('Y-m-d\TH:i', $higherDate);
    $lowerDateString = $lowerDate->format('Y-m-d\TH:i');
    $higherDateString = $higherDate->format('Y-m-d\TH:i');

    /*
    $lower_championship = !empty($_GET['lower_club_transfers_club_championship_count']) ? $_GET['lower_club_transfers_club_championship_count'] : 0;
    $higher_championship = !empty($_GET['higher_club_transfers_club_championship_count']) ? $_GET['higher_club_transfers_club_championship_count'] : 99999;
    */

    if (($lower_goal_count <= $higher_goal_count) && ($lower_player_age <= $higher_player_age) && ($lower_season_number <= $higher_season_number)) {
        $sql_statement = "SELECT transfers.Transfer_ID, transfers.Contract_Date, club_transfers.Season_Number, clubs.Club_ID, clubs.Club_Name, players.player_ID, players.full_name, players.goal_count, players.age, players.birth_place FROM transfers NATURAL JOIN clubs NATURAL JOIN club_transfers NATURAL JOIN players WHERE Club_Name LIKE '%$club_name%' AND full_name LIKE '%$player_full_name%' AND $lower_goal_count <= goal_count AND $higher_goal_count >= goal_count AND $lower_player_age <= age AND $higher_player_age >= age AND birth_place LIKE '%$player_birth_place%' AND $lower_season_number <= Season_Number AND $higher_season_number >= Season_Number AND '$lowerDateString' <= Contract_Date AND '$higherDateString' >= Contract_Date";
        $result = mysqli_query($db, $sql_statement);
        if (mysqli_num_rows($result) > 0) {
    // Start the table
    echo "<table border='1'>";

    // Print the table headers
    $row = mysqli_fetch_assoc($result);
    echo "<tr>";
    foreach ($row as $key => $value) {
        echo "<th>" . $key . "</th>";
    }
    echo "</tr>";

    // Print the table rows
    mysqli_data_seek($result, 0); // Reset the result pointer to the beginning
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        foreach ($row as $key => $value) {
            if (is_null($value)) {
                echo "<td>Deleted</td>";
            } else {
                echo "<td>" . $value . "</td>";
            }
        }
        echo "</tr>";
    }

    // End the table
    echo "</table>";
} else {
            echo "No records found.";
        }
    } else {
        echo ("Lower value cannot be higher than the higher value! Please enter again.");
    }

} else if (isset($_GET['cups_form'])) {
    //$name = $_GET['cup_name'];
    $lastChampion = $_GET['cups_last_champion'];
    $name = $_GET['cup_name'];


    $sql_statement = "SELECT * FROM cups WHERE Last_Champion LIKE '%$lastChampion%' AND Cup_Name LIKE '%$name%'";
    $result = mysqli_query($db, $sql_statement);
    if (mysqli_num_rows($result) > 0) {
        // Start the table
        echo "<table border='1'>";

        // Print the table headers
        $row = mysqli_fetch_assoc($result);
        echo "<tr>";
        foreach ($row as $key => $value) {
            echo "<th>" . $key . "</th>";
        }
        echo "</tr>";

        // Print the table rows
        mysqli_data_seek($result, 0); // Reset the result pointer to the beginning
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            foreach ($row as $key => $value) {
                echo "<td>" . $value . "</td>";
            }
            echo "</tr>";
        }

        // End the table
        echo "</table>";
    } else {
        echo "No records found.";
    }


} else if (isset($_GET['cup_champions_form'])) {
    $cupName = $_GET['cup_champions_cup_name'];
    $clubName = $_GET['cup_champions_club_name'];
    
    $lowerChampionshipCount = !empty($_GET['lower_cup_champions_club_championship_count']) ? $_GET['lower_cup_champions_club_championship_count'] : 0;
    $higherChampionshipCount = !empty($_GET['higher_cup_champions_club_championship_count']) ? $_GET['higher_cup_champions_club_championship_count'] : 100;
    $lowerSeason = !empty($_GET['lower_cup_champions_season']) ? $_GET['lower_cup_champions_season'] : 0;
    $higherSeason = !empty($_GET['higher_cup_champions_season']) ? $_GET['higher_cup_champions_season'] : 3000;
    
    if (($lowerChampionshipCount <= $higherChampionshipCount) && ($lowerSeason <= $higherSeason)) {
        $sql_statement = "SELECT cup_champions.Season, cups.Cup_ID, cups.Cup_Name, clubs.Club_ID, clubs.Club_Name, clubs.Championship_Count FROM cup_champions NATURAL JOIN clubs NATURAL JOIN cups
        WHERE $lowerChampionshipCount <= clubs.Championship_Count AND $higherChampionshipCount >= clubs.Championship_Count AND $lowerSeason <= cup_champions.Season AND $higherSeason >= cup_champions.Season
        AND cups.Cup_Name LIKE '%$cupName%' AND clubs.Club_Name LIKE '%$clubName%'";
        $result = mysqli_query($db, $sql_statement);
        if (mysqli_num_rows($result) > 0) {
    // Start the table
    echo "<table border='1'>";

    // Print the table headers
    $row = mysqli_fetch_assoc($result);
    echo "<tr>";
    foreach ($row as $key => $value) {
        echo "<th>" . $key . "</th>";
    }
    echo "</tr>";

    // Print the table rows
    mysqli_data_seek($result, 0); // Reset the result pointer to the beginning
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        foreach ($row as $key => $value) {
            if (is_null($value)) {
                echo "<td>Deleted</td>";
            } else {
                echo "<td>" . $value . "</td>";
            }
        }
        echo "</tr>";
    }

    // End the table
    echo "</table>";
} else {
            echo "No records found.";
        }
    } else {
        echo ("Lower value cannot be higher than the higher value! Please enter again.");
    }

} else if (isset($_GET['leagues_form'])) {
    $league_name = $_GET['league_name'];
    $lastChampion = $_GET['last_champion'];
    
    $lowerTeamCount = !empty($_GET['lower_team_count']) ? $_GET['lower_team_count'] : 0;
    $higherTeamCount = !empty($_GET['higher_team_count']) ? $_GET['higher_team_count'] : 100;
    $lowerPrizeMoney = !empty($_GET['lower_prize_money']) ? $_GET['lower_prize_money'] : 0;
    $higherPrizeMoney = !empty($_GET['higher_prize_money']) ? $_GET['higher_prize_money'] : 100000000;
    
    if (($lowerTeamCount <= $lowerTeamCount) && ($lowerPrizeMoney <= $higherPrizeMoney)) {
        $sql_statement = "SELECT * FROM leagues WHERE $lowerTeamCount <= leagues.Team_Count AND $higherTeamCount >= leagues.Team_Count AND $lowerPrizeMoney <= leagues.Prize_Money AND $higherPrizeMoney >= leagues.Prize_Money
        AND leagues.League_Name LIKE '%$league_name%' AND leagues.Last_Champion LIKE '%$lastChampion%'";
        $result = mysqli_query($db, $sql_statement);
        if (mysqli_num_rows($result) > 0) {
    // Start the table
    echo "<table border='1'>";

    // Print the table headers
    $row = mysqli_fetch_assoc($result);
    echo "<tr>";
    foreach ($row as $key => $value) {
        echo "<th>" . $key . "</th>";
    }
    echo "</tr>";

    // Print the table rows
    mysqli_data_seek($result, 0); // Reset the result pointer to the beginning
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        foreach ($row as $key => $value) {
            if (is_null($value)) {
                echo "<td>Deleted</td>";
            } else {
                echo "<td>" . $value . "</td>";
            }
        }
        echo "</tr>";
    }

    // End the table
    echo "</table>";
} else {
            echo "No records found.";
        }
    } else {
        echo ("Lower value cannot be higher than the higher value! Please enter again.");
    }

} else if (isset($_GET['league_roster_form'])) {
    $league_name = $_GET['league_roster_league_name'];
    $lastChampion = $_GET['league_roster_last_champion'];
    $clubName = $_GET['league_roster_club_name'];
   
    $lowerTeamCount = !empty($_GET['lower_league_roster_league_team_count']) ? $_GET['lower_league_roster_league_team_count'] : 0;
    $higherTeamCount = !empty($_GET['higher_league_roster_league_team_count']) ? $_GET['higher_league_roster_league_team_count'] : 100;
    $lowerPrizeMoney = !empty($_GET['lower_league_roster_league_prize_money']) ? $_GET['lower_league_roster_league_prize_money'] : 0;
    $higherPrizeMoney = !empty($_GET['higher_league_roster_league_prize_money']) ? $_GET['higher_league_roster_league_prize_money'] : 100000000;
    $lowerChampionshipCount = !empty($_GET['lower_league_roster_club_championship_count']) ? $_GET['lower_league_roster_club_championship_count'] : 0;
    $higherChampionshipCount = !empty($_GET['higher_league_roster_club_championship_count']) ? $_GET['higher_league_roster_club_championship_count'] : 100;
    

    if (($lowerTeamCount <= $lowerTeamCount) && ($lowerPrizeMoney <= $higherPrizeMoney) && ($lowerChampionshipCount <= $higherChampionshipCount) ) {
        $sql_statement = "SELECT league_roster.League_ID, clubs.Club_Name, clubs.Club_ID, clubs.Championship_Count, leagues.League_Name, leagues.Team_Count, leagues.Last_Champion, leagues.Prize_Money FROM league_roster INNER JOIN leagues ON league_roster.League_ID = leagues.League_ID INNER JOIN clubs ON league_roster.Club_ID = clubs.Club_ID WHERE $lowerTeamCount <= leagues.Team_Count AND $higherTeamCount >= leagues.Team_Count AND $lowerPrizeMoney <= leagues.Prize_Money AND $higherPrizeMoney >= leagues.Prize_Money AND $lowerChampionshipCount <= clubs.Championship_Count AND $higherChampionshipCount >= clubs.Championship_Count
        AND leagues.League_Name LIKE '%$league_name%' AND leagues.Last_Champion LIKE '%$lastChampion%' AND clubs.Club_Name LIKE '%$clubName%'";
        $result = mysqli_query($db, $sql_statement);
        if (mysqli_num_rows($result) > 0) {
    // Start the table
    echo "<table border='1'>";

    // Print the table headers
    $row = mysqli_fetch_assoc($result);
    echo "<tr>";
    foreach ($row as $key => $value) {
        echo "<th>" . $key . "</th>";
    }
    echo "</tr>";

    // Print the table rows
    mysqli_data_seek($result, 0); // Reset the result pointer to the beginning
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        foreach ($row as $key => $value) {
            if (is_null($value)) {
                echo "<td>Deleted</td>";
            } else {
                echo "<td>" . $value . "</td>";
            }
        }
        echo "</tr>";
    }

    // End the table
    echo "</table>";
} else {
            echo "No records found.";
        }
    } else {
        echo ("Lower value cannot be higher than the higher value! Please enter again.");
    }

}  else if (isset($_GET['manager_form'])) {
    $managerName = $_GET['manager_full_name'];
    $lowerExperience = !empty($_GET['lower_experience_years']) ? $_GET['lower_experience_years'] : 0;
    $higherExperience = !empty($_GET['higher_experience_years']) ? $_GET['higher_experience_years'] : 100;

    if ($lowerExperience <= $higherExperience) {
        $sql_statement = "SELECT * FROM manager WHERE $lowerExperience <= Experience_Years AND $higherExperience >= Experience_Years AND Full_Name LIKE '%$managerName%'";
        $result = mysqli_query($db, $sql_statement);
        if (mysqli_num_rows($result) > 0) {
    // Start the table
    echo "<table border='1'>";

    // Print the table headers
    $row = mysqli_fetch_assoc($result);
    echo "<tr>";
    foreach ($row as $key => $value) {
        echo "<th>" . $key . "</th>";
    }
    echo "</tr>";

    // Print the table rows
    mysqli_data_seek($result, 0); // Reset the result pointer to the beginning
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        foreach ($row as $key => $value) {
            if (is_null($value)) {
                echo "<td>Deleted</td>";
            } else {
                echo "<td>" . $value . "</td>";
            }
        }
        echo "</tr>";
    }

    // End the table
    echo "</table>";
} else {
            echo "No records found.";
        }
    } else {
        echo ("Lower value cannot be higher than the higher value! Please enter again.");
    }

} else if (isset($_GET['manager_awards_form'])) {

    $manager_name = $_GET['manager_award_manager_full_name'];

    $lower_experince = !empty($_GET['lower_manager_award_experience_years']) ? $_GET['lower_manager_award_experience_years'] : 0;
    $higher_experience = !empty($_GET['higher_manager_award_experience_years']) ? $_GET['higher_manager_award_experience_years'] : 99999;

    $award_type = $_GET['manager_award_award_type'];

    $lower_award_season = !empty($_GET['lower_manager_award_season']) ? $_GET['lower_manager_award_season'] : 0;
    $higher_award_season = !empty($_GET['higher_manager_award_season']) ? $_GET['higher_manager_award_season'] : 99999999999;

    if (($lower_experince <= $higher_experience) && ($lower_award_season <= $higher_award_season)) {

        $sql_statement = "SELECT awards.Award_ID, awards.Season, manager.Manager_ID, manager.Full_Name, manager.Experience_Years, manager_awards.Season, manager_awards.Award_Type FROM awards NATURAL JOIN manager NATURAL JOIN manager_awards WHERE $lower_experince <= experience_years AND $higher_experience >= experience_years AND full_name LIKE '%$manager_name%' AND Award_Type LIKE '%$award_type%' AND $lower_award_season <= Season AND $higher_award_season >= Season";

        $result = mysqli_query($db, $sql_statement);

        if (mysqli_num_rows($result) > 0) {
    // Start the table
    echo "<table border='1'>";

    // Print the table headers
    $row = mysqli_fetch_assoc($result);
    echo "<tr>";
    foreach ($row as $key => $value) {
        echo "<th>" . $key . "</th>";
    }
    echo "</tr>";

    // Print the table rows
    mysqli_data_seek($result, 0); // Reset the result pointer to the beginning
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        foreach ($row as $key => $value) {
            if (is_null($value)) {
                echo "<td>Deleted</td>";
            } else {
                echo "<td>" . $value . "</td>";
            }
        }
        echo "</tr>";
    }

    // End the table
    echo "</table>";
} else {
            echo "No records found.";
        }
    } else {
        echo ("Lower value cannot be higher than the higher value! Please enter again.");
    }

} else if (isset($_GET['match_form'])) {
    $hostID = $_GET['host_club_name'];
    $guestID = $_GET['guest_club_name'];
    $refereeID = $_GET['match_referee_name'];
    $matchScore = $_GET['match_score'];
    $lowerDate = !empty($_GET['lower_match_datetime']) ? $_GET['lower_match_datetime'] : date('Y-m-d\TH:i', strtotime("1950-01-01 00:00:00"));
    $higherDate = !empty($_GET['higher_match_datetime']) ? $_GET['higher_match_datetime'] : date('Y-m-d\TH:i', strtotime("2030-01-01 00:00:00"));

    $lowerDate = DateTime::createFromFormat('Y-m-d\TH:i', $lowerDate);
    $higherDate = DateTime::createFromFormat('Y-m-d\TH:i', $higherDate);
    $lowerDateString = $lowerDate->format('Y-m-d\TH:i');
    $higherDateString = $higherDate->format('Y-m-d\TH:i');

    if ($lowerDate <= $higherDate) {
        $sql_statement = "SELECT Match_ID, host.Club_Name AS Host_Name, host.Club_ID AS Host_Club_ID, guest.Club_Name as Guest_name, guest.Club_ID as Guest_Club_ID, referees.Full_Name as Referee_Name, Referee_ID, Score, Date_Time FROM `match` INNER JOIN clubs AS host ON host.Club_ID = match.Host_ID INNER JOIN clubs as guest ON guest.Club_ID = match.Guest_ID NATURAL JOIN referees
        WHERE host.Club_Name LIKE '%$hostID%' AND guest.Club_Name LIKE '%$guestID%' AND referees.Full_Name LIKE '%$refereeID%' AND Score LIKE '%$matchScore%' AND '$lowerDateString' <= Date_Time AND '$higherDateString' >= Date_Time ";
        $result = mysqli_query($db, $sql_statement);
        if (mysqli_num_rows($result) > 0) {
    // Start the table
    echo "<table border='1'>";

    // Print the table headers
    $row = mysqli_fetch_assoc($result);
    echo "<tr>";
    foreach ($row as $key => $value) {
        echo "<th>" . $key . "</th>";
    }
    echo "</tr>";

    // Print the table rows
    mysqli_data_seek($result, 0); // Reset the result pointer to the beginning
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        foreach ($row as $key => $value) {
            if (is_null($value)) {
                echo "<td>Deleted</td>";
            } else {
                echo "<td>" . $value . "</td>";
            }
        }
        echo "</tr>";
    }

    // End the table
    echo "</table>";
} else {
            echo "No records found.";
        }
    } else {
        echo ("Lower value cannot be higher than the higher value! Please enter again.");
    }

} else if (isset($_GET['penalty_form'])) {
    $penaltyType = $_GET['penalty_type'];
    $lowerPenalty = !empty($_GET['lower_penalty_length']) ? $_GET['lower_penalty_length'] : 0;
    $higherPenalty = !empty($_GET['higher_penalty_length']) ? $_GET['higher_penalty_length'] : 100;

    if ($lowerPenalty <= $higherPenalty) {
        $sql_statement = "SELECT * FROM penalty WHERE $lowerPenalty <= Penalty_Length AND $higherPenalty >= Penalty_Length AND Penalty_Type LIKE '%$penaltyType%'";
        $result = mysqli_query($db, $sql_statement);
        if (mysqli_num_rows($result) > 0) {
    // Start the table
    echo "<table border='1'>";

    // Print the table headers
    $row = mysqli_fetch_assoc($result);
    echo "<tr>";
    foreach ($row as $key => $value) {
        echo "<th>" . $key . "</th>";
    }
    echo "</tr>";

    // Print the table rows
    mysqli_data_seek($result, 0); // Reset the result pointer to the beginning
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        foreach ($row as $key => $value) {
            if (is_null($value)) {
                echo "<td>Deleted</td>";
            } else {
                echo "<td>" . $value . "</td>";
            }
        }
        echo "</tr>";
    }

    // End the table
    echo "</table>";
} else {
            echo "No records found.";
        }
    } else {
        echo ("Lower value cannot be higher than the higher value! Please enter again.");
    }

} else if (isset($_GET['players_form'])) {
    $playerName = $_GET['full_name'];
    $birthPlace = $_GET['birth_place'];
    $lowerGoalCount = !empty($_GET['lower_goal_count']) ? $_GET['lower_goal_count'] : 0;
    $higherGoalCount = !empty($_GET['higher_goal_count']) ? $_GET['higher_goal_count'] : 10000;
    $lowerAge = !empty($_GET['lower_age']) ? $_GET['lower_age'] : 0;
    $higherAge = !empty($_GET['higher_age']) ? $_GET['higher_age'] : 100;

    if ($lowerGoalCount <= $higherGoalCount && $lowerAge <= $higherAge) {
        $sql_statement = "SELECT * FROM players WHERE $lowerGoalCount <= goal_count AND $higherGoalCount >= goal_count AND full_name LIKE '%$playerName%' AND $lowerAge <= age AND $higherAge >= age AND birth_place LIKE '%$birthPlace%'";
        $result = mysqli_query($db, $sql_statement);
        if (mysqli_num_rows($result) > 0) {
    // Start the table
    echo "<table border='1'>";

    // Print the table headers
    $row = mysqli_fetch_assoc($result);
    echo "<tr>";
    foreach ($row as $key => $value) {
        echo "<th>" . $key . "</th>";
    }
    echo "</tr>";

    // Print the table rows
    mysqli_data_seek($result, 0); // Reset the result pointer to the beginning
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        foreach ($row as $key => $value) {
            if (is_null($value)) {
                echo "<td>Deleted</td>";
            } else {
                echo "<td>" . $value . "</td>";
            }
        }
        echo "</tr>";
    }

    // End the table
    echo "</table>";
} else {
            echo "No records found.";
        }
    } else {
        echo ("Lower value cannot be higher than the higher value! Please enter again.");
    }

} else if (isset($_GET['player_awards_form'])) {
    $awardsType = $_GET['player_awards_awards_type'];
    $fullName = $_GET['player_awards_player_full_name'];
    $lowerGoalCount = !empty($_GET['lower_player_awards_player_goal_count']) ? $_GET['lower_player_awards_player_goal_count'] : 0;
    $higherGoalCount = !empty($_GET['higher_player_awards_player_goal_count']) ? $_GET['higher_player_awards_player_goal_count'] : 10000;
    $lowerAge = !empty($_GET['lower_player_awards_player_age']) ? $_GET['lower_player_awards_player_age'] : 0;
    $higherAge = !empty($_GET['higher_player_awards_player_age']) ? $_GET['higher_player_awards_player_age'] : 10000;
    $birthPlace = $_GET['player_awards_player_birth_place'];
    $seasonYear = $_GET['player_awards_season'];


    if (($lowerGoalCount <= $higherGoalCount) && ($lowerAge <= $higherAge)) {
        $sql_statement = "SELECT awards.Award_ID, awards.Season, player_awards.Season, player_awards.Award_Type, players.player_ID, players.full_name, players.goal_count, players.age, players.birth_place   FROM players NATURAL JOIN player_awards NATURAL JOIN awards WHERE Award_Type LIKE '%$awardsType%' AND $lowerGoalCount <= Goal_Count AND $higherGoalCount >= Goal_Count AND $higherAge >= age AND $lowerAge <= age AND Birth_Place LIKE '%$birthPlace%' AND full_name LIKE '%$fullName%'";
        $result = mysqli_query($db, $sql_statement);
        if (mysqli_num_rows($result) > 0) {
    // Start the table
    echo "<table border='1'>";

    // Print the table headers
    $row = mysqli_fetch_assoc($result);
    echo "<tr>";
    foreach ($row as $key => $value) {
        echo "<th>" . $key . "</th>";
    }
    echo "</tr>";

    // Print the table rows
    mysqli_data_seek($result, 0); // Reset the result pointer to the beginning
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        foreach ($row as $key => $value) {
            if (is_null($value)) {
                echo "<td>Deleted</td>";
            } else {
                echo "<td>" . $value . "</td>";
            }
        }
        echo "</tr>";
    }

    // End the table
    echo "</table>";
} else {
            echo "No records found.";
        }
    } else {
        echo ("Lower value cannot be higher than the higher value! Please enter again.");
    }

} else if (isset($_GET['punished_players_form'])) {
    $penaltyType = $_GET['punished_players_penalty_type'];
    $lowerLength = !empty($_GET['lower_punished_players_penalty_length']) ? $_GET['lower_punished_players_penalty_length'] : 0;
    $higherLength = !empty($_GET['higher_punished_players_penalty_length']) ? $_GET['higher_punished_players_penalty_length'] : 50;
    $fullName = $_GET['punished_players_player_full_name'];
    $lowerGoalCount = !empty($_GET['lower_punished_players_player_goal_count']) ? $_GET['lower_punished_players_player_goal_count'] : 0;
    $higherGoalCount = !empty($_GET['higher_punished_players_player_goal_count']) ? $_GET['higher_punished_players_player_goal_count'] : 10000;
    $lowerAge = !empty($_GET['lower_punished_players_player_age']) ? $_GET['lower_punished_players_player_age'] : 0;
    $higherAge = !empty($_GET['higher_punished_players_player_age']) ? $_GET['higher_punished_players_player_age'] : 10000;
    $birthPlace = $_GET['punished_players_player_birth_place'];


    if (($lowerLength <= $higherLength) && ($lowerGoalCount <= $higherGoalCount) && ($lowerAge <= $higherAge)) {
        $sql_statement = "SELECT penalty.Penalty_ID, penalty.Penalty_Type, penalty.Penalty_Length, players.player_ID, players.full_name, players.goal_count, players.age, players.birth_place   FROM players NATURAL JOIN punished_players NATURAL JOIN penalty WHERE $lowerLength <= Penalty_Length AND $higherLength >= Penalty_Length AND Penalty_Type LIKE '%$penaltyType%' AND $lowerGoalCount <= Goal_Count AND $higherGoalCount >= Goal_Count AND $higherAge >= age AND $lowerAge <= age AND Birth_Place LIKE '%$birthPlace%' AND full_name LIKE '%$fullName%'";
        $result = mysqli_query($db, $sql_statement);
        if (mysqli_num_rows($result) > 0) {
    // Start the table
    echo "<table border='1'>";

    // Print the table headers
    $row = mysqli_fetch_assoc($result);
    echo "<tr>";
    foreach ($row as $key => $value) {
        echo "<th>" . $key . "</th>";
    }
    echo "</tr>";

    // Print the table rows
    mysqli_data_seek($result, 0); // Reset the result pointer to the beginning
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        foreach ($row as $key => $value) {
            if (is_null($value)) {
                echo "<td>Deleted</td>";
            } else {
                echo "<td>" . $value . "</td>";
            }
        }
        echo "</tr>";
    }

    // End the table
    echo "</table>";
} else {
            echo "No records found.";
        }
    } else {
        echo ("Lower value cannot be higher than the higher value! Please enter again.");
    }

} else if (isset($_GET['referees_form'])) {
    $refereeName = $_GET['referees_full_name'];
    $lowerExperience = !empty($_GET['lower_referees_experience']) ? $_GET['lower_referees_experience'] : 0;
    $higherExperience = !empty($_GET['higher_referees_experience']) ? $_GET['higher_referees_experience'] : 100;

    if ($lowerExperience <= $higherExperience) {
        $sql_statement = "SELECT * FROM referees WHERE $lowerExperience <= Year_Of_Experience AND $higherExperience >= Year_Of_Experience AND Full_Name LIKE '%$refereeName%'";
        $result = mysqli_query($db, $sql_statement);
        if (mysqli_num_rows($result) > 0) {
    // Start the table
    echo "<table border='1'>";

    // Print the table headers
    $row = mysqli_fetch_assoc($result);
    echo "<tr>";
    foreach ($row as $key => $value) {
        echo "<th>" . $key . "</th>";
    }
    echo "</tr>";

    // Print the table rows
    mysqli_data_seek($result, 0); // Reset the result pointer to the beginning
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        foreach ($row as $key => $value) {
            if (is_null($value)) {
                echo "<td>Deleted</td>";
            } else {
                echo "<td>" . $value . "</td>";
            }
        }
        echo "</tr>";
    }

    // End the table
    echo "</table>";
} else {
            echo "No records found.";
        }
    } else {
        echo ("Lower value cannot be higher than the higher value! Please enter again.");
    }

} else if (isset($_GET['stadiums_form'])) {

    $stadiumName = $_GET['stadium_name'];



    $sql_statement = "SELECT * FROM stadiums WHERE Stadium_Name LIKE '%$stadiumName%'";
    $result = mysqli_query($db, $sql_statement);
    if (mysqli_num_rows($result) > 0) {
        // Start the table
        echo "<table border='1'>";

        // Print the table headers
        $row = mysqli_fetch_assoc($result);
        echo "<tr>";
        foreach ($row as $key => $value) {
            echo "<th>" . $key . "</th>";
        }
        echo "</tr>";

        // Print the table rows
        mysqli_data_seek($result, 0); // Reset the result pointer to the beginning
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            foreach ($row as $key => $value) {
                echo "<td>" . $value . "</td>";
            }
            echo "</tr>";
        }

        // End the table
        echo "</table>";
    } else {
        echo "No records found.";

    }

} else if (isset($_GET['transfers_form'])) {


    $lowerDate = !empty($_GET['lower_contract_date']) ? $_GET['lower_contract_date'] : date('Y-m-d\TH:i', strtotime('1950-01-01 00:00'));
    $higherDate = !empty($_GET['higher_contract_date']) ? $_GET['higher_contract_date'] : date('Y-m-d\TH:i', strtotime('2030-01-01 00:00'));

    $lowerDate = DateTime::createFromFormat('Y-m-d\TH:i', $lowerDate);
    $higherDate = DateTime::createFromFormat('Y-m-d\TH:i', $higherDate);
    $lowerDateString = $lowerDate->format('Y-m-d\TH:i');
    $higherDateString = $higherDate->format('Y-m-d\TH:i');


    // date_create('31 Oct 1950 4:45am') date_create('31 Oct 2030 4:45am')

    if ($higherDate >= $lowerDate) {
        $sql_statement = "SELECT * FROM transfers WHERE '$lowerDateString' <= Contract_Date AND '$higherDateString' >= Contract_Date";
        $result = mysqli_query($db, $sql_statement);
        if (mysqli_num_rows($result) > 0) {
    // Start the table
    echo "<table border='1'>";

    // Print the table headers
    $row = mysqli_fetch_assoc($result);
    echo "<tr>";
    foreach ($row as $key => $value) {
        echo "<th>" . $key . "</th>";
    }
    echo "</tr>";

    // Print the table rows
    mysqli_data_seek($result, 0); // Reset the result pointer to the beginning
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        foreach ($row as $key => $value) {
            if (is_null($value)) {
                echo "<td>Deleted</td>";
            } else {
                echo "<td>" . $value . "</td>";
            }
        }
        echo "</tr>";
    }

    // End the table
    echo "</table>";
} else {
            echo "No records found.";
        }
    } else {
        echo ("Lower value cannot be higher than the higher value! Please enter again.");
    }

} else {
    echo "You should fill all the empty spaces!";
}

?>