<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "townsquare";  // Database name

// Establish the MySQLi connection
$conn = mysqli_connect($host, $user, $pass, $dbname);

// Check if the connection is successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

