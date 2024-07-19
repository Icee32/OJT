<?php
// db_conn.php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "adminlogin";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch login logs
$sql = "SELECT LogID, UserID, name, log_date FROM login_logs";
$result = $conn->query($sql);

$login_logs = array();

if ($result) {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $login_logs[] = $row;
        }
    }
} else {
    // Log SQL error
    error_log("SQL error: " . $conn->error);
}

header('Content-Type: application/json');
echo json_encode($login_logs);

$conn->close();
?>
