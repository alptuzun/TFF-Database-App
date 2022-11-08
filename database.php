<?php

$host = "localhost";
$dbname = "login_db";
$username = "root";
$password = "";

$mysqli = new mysqli(hostname: $host,
                     username: $username,
                     password: $password,
                     database: $dbname);
                     
if ($mysqli->connect_errno) {
    echo 'Connection error: ' . mysqli_connect_error();
    die("Connection error: " . $mysqli->connect_error);
}

return $mysqli;