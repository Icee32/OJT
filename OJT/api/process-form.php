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
$middleinitial = isset($_POST['middleinitial']) ? $_POST['middleinitial'] : "";
$birthdate = isset($_POST['birthdate']) ? $_POST['birthdate'] : "";
$phonenumber = isset($_POST['phonenumber']) ? $_POST['phonenumber'] : "";
$gender = isset($_POST['gender']) ? (int)$_POST['gender'] : 0;
$baranggay = isset($_POST['baranggay']) ? (int)$_POST['baranggay'] : 0;
$vaccine_id = isset($_POST['vaccine_id']) ? (int)$_POST['vaccine_id'] : 0;
$dose_id = isset($_POST['dose_id']) ? (int)$_POST['dose_id'] : 0;

// Calculate age based on birthdate
$birthdate = mysqli_real_escape_string($conn, $birthdate);
$age = date_diff(date_create($birthdate), date_create('today'))->y;

// Sanitize other data before inserting (replace with proper sanitization)
$firstname = mysqli_real_escape_string($conn, $firstname);
$lastname = mysqli_real_escape_string($conn, $lastname);
$middleinitial = mysqli_real_escape_string($conn, $middleinitial);
$phonenumber = mysqli_real_escape_string($conn, $phonenumber);
$gender = mysqli_real_escape_string($conn, $gender);
$baranggay = mysqli_real_escape_string($conn, $baranggay);
$vaccine_id = mysqli_real_escape_string($conn, $vaccine_id);
$dose_id = mysqli_real_escape_string($conn, $dose_id);

// Define mappings for baranggay tables
$baranggay_table_mappings = [
    1 => 'bg_aplaya',
    2 => 'bg_balibago',
    3 => 'bg_caingin',
    4 => 'bg_dila',
    5 => 'bg_dita',
    6 => 'bg_donjose',
    7 => 'bg_ibaba',
    8 => 'bg_kanluran',
    9 => 'bg_labas',
    10 => 'bg_macabling',
    11 => 'bg_malitlit',
    12 => 'bg_malusak',
    13 => 'bg_marketarea',
    14 => 'bg_pooc',
    15 => 'bg_pulongsantacruz',
    16 => 'bg_santodomingo',
    17 => 'bg_sinalhan',
    18 => 'bg_tagapo',
    // Add more baranggays here
];

// Define mappings for gender
$gender_mappings = [
    1 => 'Male',
    2 => 'Female',
];

// Define mappings for dose tables
$vaccine_dose_table_mappings = [
    1 => [ // HPV
        1 => 'hpv_dose1',
        2 => 'hpv_dose2',
        3 => 'hpv_dose3',
    ],
    2 => [ // Flu
        1 => 'flu_dose1',
        2 => 'flu_dose2',
        3 => 'flu_dose3',
    ],
    3 => [ // Pneumonia
        1 => 'pneumonia_dose1',
        2 => 'pneumonia_dose2',
        3 => 'pneumonia_dose3',
    ],
];

// Check if the vaccine_id exists in tblvaccine
$vaccine_check_sql = "SELECT * FROM tblvaccine WHERE vaccineid = '$vaccine_id'";
$vaccine_check_result = $conn->query($vaccine_check_sql);

if ($vaccine_check_result->num_rows > 0) {
    // Check if the gender is valid
    if (!array_key_exists($gender, $gender_mappings)) {
        echo json_encode(["status" => "error", "message" => "Invalid gender."]);
        $conn->close();
        exit();
    }

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

    // Check if the user already exists in the users table
    $user_check_sql = "SELECT * FROM users WHERE FirstName = '$firstname' AND LastName = '$lastname' AND vaccine_id = '$vaccine_id'";
    $user_check_result = $conn->query($user_check_sql);

    if ($user_check_result->num_rows > 0) {
        // Update the existing user record
        $sql = "UPDATE users SET Age = '$age', Gender = '$gender', Baranggay = '$baranggay', dose_id = '$dose_id', birthdate = '$birthdate', phonenumber = '$phonenumber', middleinitial = '$middleinitial', submitted_at = NOW(), status = 'Pending'
                WHERE FirstName = '$firstname' AND LastName = '$lastname' AND vaccine_id = '$vaccine_id'";
    } else {
        // Insert data into users table
        $sql = "INSERT INTO users (FirstName, LastName, Age, Gender, Baranggay, vaccine_id, dose_id, birthdate, phonenumber, middleinitial, submitted_at, status)
                VALUES ('$firstname', '$lastname', '$age', '$gender', '$baranggay', '$vaccine_id', '$dose_id', '$birthdate', '$phonenumber', '$middleinitial', NOW(), 'Pending')";
    }

    if ($conn->query($sql) === TRUE) {
        $user_id = ($user_check_result->num_rows > 0) ? $user_check_result->fetch_assoc()['id'] : $conn->insert_id; // Get the ID of the user record

        // Determine the dose table based on vaccine_id and dose_id
        $dose_table = isset($vaccine_dose_table_mappings[$vaccine_id][$dose_id]) ? $vaccine_dose_table_mappings[$vaccine_id][$dose_id] : null;
        $baranggay_table = isset($baranggay_table_mappings[$baranggay]) ? $baranggay_table_mappings[$baranggay] : null;

        // Check if valid dose table and baranggay table were found
        if ($dose_table && $baranggay_table) {
            // Insert data into the appropriate dose and baranggay tables
            $dose_sql = "INSERT INTO $dose_table (id, FirstName, LastName, Age, Gender, Baranggay, vaccine_id, dose_id, birthdate, phonenumber, middleinitial, submitted_at, status)
                         VALUES ('$user_id', '$firstname', '$lastname', '$age', '$gender', '$baranggay', '$vaccine_id', '$dose_id', '$birthdate', '$phonenumber', '$middleinitial', NOW(), 'Pending')";
            $baranggay_sql = "INSERT INTO $baranggay_table (id, FirstName, LastName, Age, Gender, Baranggay, vaccine_id, dose_id, birthdate, phonenumber, middleinitial, submitted_at, status)
                              VALUES ('$user_id', '$firstname', '$lastname', '$age', '$gender', '$baranggay', '$vaccine_id', '$dose_id', '$birthdate', '$phonenumber', '$middleinitial', NOW(), 'Pending')";

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
