<?php
// Database connection (replace with your credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "starosaforms";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch user data
function getUserData($search = null) {
    global $conn;
    
    $query = "SELECT u.id, u.firstname, u.lastname, u.age, u.gender, u.baranggay,
                     u.vaccine_id, u.dose_id, v.vaccinetype, v.vaccinename, u.submitted_at, u.status 
              FROM users u
              LEFT JOIN tblvaccine v ON u.vaccine_id = v.vaccineid";
    
    if ($search) {
        $query .= " WHERE CONCAT(u.id, u.firstname, u.lastname, u.submitted_at, u.status) LIKE '%$search%'";
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
