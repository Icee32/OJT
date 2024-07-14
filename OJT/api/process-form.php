<?php
header('Content-Type: application/json');

// Database connection (replace with your credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "starosaforms";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    echo json_encode(["status" => "error", "message" => "Connection failed: " . $conn->connect_error]);
    exit();
}

// Prepare data for insertion
$firstname = isset($_POST['firstname']) ? $_POST['firstname'] : "";
$lastname = isset($_POST['lastname']) ? $_POST['lastname'] : "";
$age = isset($_POST['age']) ? (int)$_POST['age'] : 0;
$gender = isset($_POST['gender']) ? $_POST['gender'] : "";
$baranggay = isset($_POST['baranggay']) ? $_POST['baranggay'] : "";
$vaccine_id = isset($_POST['vaccine_id']) ? (int)$_POST['vaccine_id'] : 0;
$dose_id = isset($_POST['dose_id']) ? (int)$_POST['dose_id'] : 0;

// Sanitize data before inserting (replace with proper sanitization)
$firstname = mysqli_real_escape_string($conn, $firstname);
$lastname = mysqli_real_escape_string($conn, $lastname);
$age = mysqli_real_escape_string($conn, $age);
$gender = mysqli_real_escape_string($conn, $gender);
$baranggay = mysqli_real_escape_string($conn, $baranggay);
$vaccine_id = mysqli_real_escape_string($conn, $vaccine_id);
$dose_id = mysqli_real_escape_string($conn, $dose_id);

// Check if the vaccine_id exists in tblvaccine
$vaccine_check_sql = "SELECT * FROM tblvaccine WHERE vaccineid = '$vaccine_id'";
$vaccine_check_result = $conn->query($vaccine_check_sql);

if ($vaccine_check_result->num_rows > 0) {
    // Check for existing records of dose 1 and dose 2 before inserting dose 3
    if ($dose_id == 3) {
        $dose1_check_sql = "SELECT * FROM users WHERE dose_id = 1 AND vaccine_id = '$vaccine_id' AND FirstName = '$firstname' AND LastName = '$lastname'";
        $dose2_check_sql = "SELECT * FROM users WHERE dose_id = 2 AND vaccine_id = '$vaccine_id' AND FirstName = '$firstname' AND LastName = '$lastname'";
        $dose1_check_result = $conn->query($dose1_check_sql);
        $dose2_check_result = $conn->query($dose2_check_sql);

        if ($dose1_check_result->num_rows == 0 || $dose2_check_result->num_rows == 0) {
            echo json_encode(["status" => "error", "message" => "Cannot insert dose 3 for $firstname $lastname without existing records for dose 1 and dose 2."]);
            $conn->close();
            exit();
        }
    }

    // Insert data into users table
    $sql = "INSERT INTO users (FirstName, LastName, Age, Gender, Baranggay, vaccine_id, dose_id, submitted_at, status)
            VALUES ('$firstname', '$lastname', '$age', '$gender', '$baranggay', '$vaccine_id', '$dose_id', NOW(), 'Pending')";

    if ($conn->query($sql) === TRUE) {
        $user_id = $conn->insert_id; // Get the ID of the inserted user record

        // Define mappings for dose tables
        $dose_table_mappings = [
            1 => 'dose1',
            2 => 'dose2',
            3 => 'dose3',
        ];

        // Define mappings for baranggay tables
        $baranggay_table_mappings = [
            'Aplaya' => 'bg_aplaya',
            'Balibago' => 'bg_balibago',
            'Caingin' => 'bg_caingin',
            'Dila' => 'bg_dila',
            'Dita' => 'bg_dita',
            'Don Jose' => 'bg_donjose',
            'Ibaba' => 'bg_ibaba',
            'Kanluran (Poblacion Uno)' => 'bg_kanluran',
            'Labas' => 'bg_labas',
            'Macabling' => 'bg_macabling',
            'Malitlit' => 'bg_malitlit',
            'Malusak (Poblacion Dos)' => 'bg_malusak',
            'Market Area (Poblacion Tres)' => 'bg_marketarea',
            'Pooc (Pook)' => 'bg_pooc',
            'Pulong Santa Cruz' => 'bg_pulongsantacruz',
            'Santo Domingo' => 'bg_santodomingo',
            'Sinalhan' => 'bg_sinalhan',
            'Tagapo' => 'bg_tagapo',
            // Add more baranggays here
        ];

        // Determine the table names based on dose_id and baranggay
        $dose_table = isset($dose_table_mappings[$dose_id]) ? $dose_table_mappings[$dose_id] : null;
        $baranggay_table = isset($baranggay_table_mappings[$baranggay]) ? $baranggay_table_mappings[$baranggay] : null;

        // Check if valid dose table and baranggay table were found
        if ($dose_table && $baranggay_table) {
            // Insert data into the appropriate dose and baranggay tables
            $dose_sql = "INSERT INTO $dose_table (id, FirstName, LastName, Age, Gender, Baranggay, vaccine_id, dose_id, submitted_at, status)
                         VALUES ('$user_id', '$firstname', '$lastname', '$age', '$gender', '$baranggay', '$vaccine_id', '$dose_id', NOW(), 'Pending')";
            $baranggay_sql = "INSERT INTO $baranggay_table (id, FirstName, LastName, Age, Gender, Baranggay, vaccine_id, dose_id, submitted_at, status)
                              VALUES ('$user_id', '$firstname', '$lastname', '$age', '$gender', '$baranggay', '$vaccine_id', '$dose_id', NOW(), 'Pending')";

            if ($conn->query($dose_sql) === TRUE && $conn->query($baranggay_sql) === TRUE) {
                echo json_encode(["status" => "ok", "message" => "New record created successfully in $dose_table and $baranggay_table tables."]);
            } else {
                echo json_encode(["status" => "error", "message" => "Error: " . $conn->error]);
            }
        } else {
            echo json_encode(["status" => "error", "message" => "Invalid dose_id or baranggay."]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "Error: " . $sql . "<br>" . $conn->error]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Error: Invalid vaccine_id."]);
}

$conn->close();
?>