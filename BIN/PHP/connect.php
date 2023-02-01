<?php
$servername = "localhost";
// REPLACE with your Database name
$dbname = "s64160207";
// REPLACE with Database user
$username = "s64160207";
// REPLACE with Database user password
$password = "BMXCHsAw";

// Establish connection to MySQL database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if connection established successfully
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// else { echo "Connected to mysql database. <br>"; }
?>
