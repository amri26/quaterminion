<?php

$db_host = "localhost";
$db_username = "root";
$db_password = "";
$db_database = "quaterminion";

$conn = mysqli_connect($db_host, $db_username, $db_password, $db_database);

if ($conn->connect_errno) {
    die("Could not connect to database : <br />" . $conn->connect_error);
}
