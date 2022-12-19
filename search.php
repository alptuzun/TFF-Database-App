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
                    echo "<td>" . $value . "</td>";
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
                    echo "<td>" . $value . "</td>";
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
                    echo "<td>" . $value . "</td>";
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


} else if (isset($_GET['leagues_form'])) {
    $leagueName = $_GET['league_name'];
    $lowerTeam = !empty($_GET['lower_team_count']) ? $_GET['lower_team_count'] : 0;
    $higherTeam = !empty($_GET['higher_team_count']) ? $_GET['higher_team_count'] : 100;
    $lastChampion = $_GET['last_champion'];
    $lowerPrize = !empty($_GET['lower_prize_money']) ? $_GET['lower_prize_money'] : 0;
    $higherPrize = !empty($_GET['higher_prize_money']) ? $_GET['higher_prize_money'] : 9999999999999;

    if ($lowerTeam <= $higherTeam && $lowerTeam <= $higherTeam) {
        $sql_statement = "SELECT * FROM leagues WHERE $lowerTeam <= Team_Count AND $higherTeam >= Team_Count AND League_Name LIKE '%$leagueName%' AND $lowerPrize <= Prize_Money AND $higherPrize >= Prize_Money AND Last_Champion LIKE '%$lastChampion%'";

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
    } else {
        echo ("Lower value cannot be higher than the higher value! Please enter again.");
    }

} else if (!empty($_POST['league_roster_league_id']) && !empty($_POST['league_roster_club_id']) && !empty($_POST['league_roster_league_name'])) {

    $league_id = $_POST['league_roster_league_id'];
    $club_id = $_POST['league_roster_club_id'];
    $league_name = $_POST['league_roster_league_name'];


    $sql_statement = "INSERT INTO league_roster (League_ID, Club_ID, League_Name) VALUES ('$league_id','$club_id','$league_name')";

    $result = mysqli_query($db, $sql_statement);
    echo "Your result is: " . $result;


} else if (isset($_GET['manager_form'])) {
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
                    echo "<td>" . $value . "</td>";
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

} else if (!empty($_POST['manager_award_award_id']) && !empty($_POST['manager_award_manager_id']) && !empty($_POST['manager_award_season']) && !empty($_POST['manager_award_award_type'])) {

    $award_id = $_POST['manager_award_award_id'];
    $manager_id = $_POST['manager_award_manager_id'];
    $season = $_POST['manager_award_season'];
    $award_type = $_POST['manager_award_award_type'];


    $sql_statement = "INSERT INTO manager_awards (Award_ID, Manager_ID, Season, Award_Type) VALUES ('$award_id', '$manager_id','$season','$award_type')";

    $result = mysqli_query($db, $sql_statement);
    echo "Your result is: " . $result;


} else if (isset($_GET['match_form'])) {
    $hostID = $_GET['host_club_id'];
    $guestID = $_GET['guest_club_id'];
    $refereeID = $_GET['match_referee_id'];
    $matchScore = $_GET['match_score'];
    $lowerDate = !empty($_GET['lower_match_datetime']) ? $_GET['lower_match_datetime'] : date('Y-m-d\TH:i', strtotime("1950-01-01 00:00:00"));
    $higherDate = !empty($_GET['higher_match_datetime']) ? $_GET['higher_match_datetime'] : date('Y-m-d\TH:i', strtotime("2030-01-01 00:00:00"));

    if ($lowerDate <= $higherDate) {
        $sql_statement = "SELECT * FROM 'match' WHERE $lowerDate <= Date_Time AND $higherDate >= Date_Time AND Host_ID LIKE '%$hostID%' AND Guest_ID LIKE '%$guestID%' AND Referee_ID LIKE '%$refereeID%' AND Score LIKE '%$matchScore%'";
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
                    echo "<td>" . $value . "</td>";
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
                    echo "<td>" . $value . "</td>";
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
                    echo "<td>" . $value . "</td>";
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

    /*
    echo $_GET['lower_contract_date'] . "\n";
    echo $_GET['higher_contract_date'] . "\n";
    */

    $lowerDate = !empty($_GET['lower_contract_date']) ? $_GET['lower_contract_date'] : date('Y-m-d\TH:i', strtotime('2030-01-01 00:00'));
    $higherDate = !empty($_GET['higher_contract_date']) ? $_GET['higher_contract_date'] : date('Y-m-d\TH:i', strtotime('1950-01-01 00:00'));

    // date_create('31 Oct 1950 4:45am') date_create('31 Oct 2030 4:45am')

    if ($higherDate >= $lowerDate) {
        $sql_statement = "SELECT * FROM transfers WHERE $lowerDate <= Contract_Date AND $higherDate >= Contract_Date";
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
    } else {

        echo ("Lower value cannot be higher than the higher value! Please enter again.");
    }



} else {
    echo "You should fill all the empty spaces!";
}

?>