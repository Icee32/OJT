<?php
include 'db_connection.php'; // Include the database connection

function getUserData($filters = []) {
    global $conn1; // Use the connection variable from db_connection.php

    $whereClauses = [];
    $whereClauses[] = "submitted_at >= NOW() - INTERVAL 1 DAY"; // Example filter to get recent data

    $whereSql = "";
    if (count($whereClauses) > 0) {
        $whereSql = "WHERE " . implode(" AND ", $whereClauses);
    }

    $sql = "SELECT users.id, users.firstname, users.lastname, users.middleinitial, users.birthdate, users.age, 
            users.phonenumber, gender.gendername as gender, baranggay.baranggayname as baranggay, users.baranggay_id, 
            vaccine.vaccinename as vaccinetype, users.vaccine_id, users.dose_id, users.status, users.submitted_at
            FROM users
            LEFT JOIN tblgender AS gender ON users.gender_id = gender.genderid
            LEFT JOIN tblbaranggay AS baranggay ON users.baranggay_id = baranggay.baranggayid
            LEFT JOIN tblvaccine AS vaccine ON users.vaccine_id = vaccine.vaccineid
            $whereSql
            ORDER BY users.submitted_at DESC
            LIMIT 5"; // Adjust limit as needed

    $result = $conn1->query($sql);

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

// Fetch data without filters for demonstration
$data = getUserData();
echo json_encode($data);

mysqli_close($conn1); // Close the database connection
?>
