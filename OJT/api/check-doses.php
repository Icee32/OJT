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

$firstname = isset($_POST['firstname']) ? $_POST['firstname'] : "";
$lastname = isset($_POST['lastname']) ? $_POST['lastname'] : "";
$vaccine_id = isset($_POST['vaccine_id']) ? (int)$_POST['vaccine_id'] : 0;
$dose_id = isset($_POST['dose_id']) ? (int)$_POST['dose_id'] : 0;

// Sanitize data
$firstname = mysqli_real_escape_string($conn, $firstname);
$lastname = mysqli_real_escape_string($conn, $lastname);
$vaccine_id = mysqli_real_escape_string($conn, $vaccine_id);
$dose_id = mysqli_real_escape_string($conn, $dose_id);

$response = ["status" => "ok", "message" => ""];

// Check for dose 3 without existing dose 1 and 2
if ($dose_id == 3) {
    $dose1_check_sql = "SELECT * FROM users WHERE dose_id = 1 AND vaccine_id = '$vaccine_id' AND FirstName = '$firstname' AND LastName = '$lastname'";
    $dose2_check_sql = "SELECT * FROM users WHERE dose_id = 2 AND vaccine_id = '$vaccine_id' AND FirstName = '$firstname' AND LastName = '$lastname'";
    $dose1_check_result = $conn->query($dose1_check_sql);
    $dose2_check_result = $conn->query($dose2_check_sql);

    if ($dose1_check_result->num_rows == 0 || $dose2_check_result->num_rows == 0) {
        $response["status"] = "error";
        $response["message"] = "Cannot register for 3rd dose without existing records for 1st and 2nd doses.";
    }
}

$conn->close();
echo json_encode($response);
?>
