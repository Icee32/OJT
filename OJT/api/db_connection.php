<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname1 = "adminstarosaform";

// Create connection
$conn1 = new mysqli($servername, $username, $password, $dbname1);

// Check connection
if ($conn1->connect_error) {
    die("Connection failed: " . $conn1->connect_error);
}
?>
