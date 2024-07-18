<?php

// Database connection (replace with your credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "adminstarosaform";  // Corrected database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    echo json_encode(["status" => "error", "message" => "Connection failed: " . $conn->connect_error]);
    exit();
}

function getUserData($filters = []) {
    global $conn;

    $whereClauses = [];

    if (isset($filters['date'])) {
        $date = mysqli_real_escape_string($conn, $filters['date']);
        $whereClauses[] = "DATE(submitted_at) = '$date'";
    }

    if (isset($filters['vaccine'])) {
        $vaccine = (int) $filters['vaccine'];
        $whereClauses[] = "vaccine_id = $vaccine";
    }

    if (isset($filters['dose'])) {
        $dose = (int) $filters['dose'];
        $whereClauses[] = "dose_id = $dose";
    }

    if (isset($filters['gender'])) {
        $gender = (int) $filters['gender'];
        $whereClauses[] = "gender_id = $gender";
    }

    $whereSql = "";
    if (count($whereClauses) > 0) {
        $whereSql = "WHERE " . implode(" AND ", $whereClauses);
    }

    $sql = "SELECT users.id, users.FirstName as firstname, users.LastName as lastname, users.middleinitial, users.birthdate, users.Age as age, 
            users.phonenumber, gender.gendername as gender, baranggay.baranggayname as baranggay, users.baranggay_id, 
            vaccine.vaccinename as vaccinetype, users.vaccine_id, users.dose_id, users.status, users.submitted_at
            FROM users
            LEFT JOIN tblgender AS gender ON users.gender_id = gender.genderid
            LEFT JOIN tblbaranggay AS baranggay ON users.baranggay_id = baranggay.baranggayid
            LEFT JOIN tblvaccine AS vaccine ON users.vaccine_id = vaccine.vaccineid
            $whereSql";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $users = [];
        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }
        return $users;
    } else {
        return false;
    }
}
?>
