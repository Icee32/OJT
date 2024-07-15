<?php
// Database connection (replace with your credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "starosaschoolforms";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch user data
function getSchoolData($search = null) {
    global $conn;
    $query = "SELECT id, firstname, lastname, vaccine_id, dose_id, submitted_at, school, status FROM users";
    
    if ($search) {
        $query .= " WHERE CONCAT(id, firstname, lastname, vaccine_id, dose_id, submitted_at, school, status) LIKE '%$search%'";
    }
    
    $result = $conn->query($query);
    
    if ($result->num_rows > 0) {
        $users = array();
        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }
        return $users;
    } else {
        return false;
    }
}
