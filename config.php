<?php
    
$db = mysqli_connect('localhost', 'root', '', 'tff');
$db->set_charset("utf8");

if ($db->connect_errno > 0) {
    die('Unable to connect to database [' . $db->connect_error . ']');
}

?>