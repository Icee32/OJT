<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "starosaforms";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$middleInitial = $_POST['middleInitial'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$address1 = $_POST['address1'];
$address2 = $_POST['address2'];
$email = $_POST['email'];
$baranggay = $_POST['baranggay'];
$contactNumber = $_POST['contactNumber'];
$vaccineId = $_POST['vaccineId'];
$doseId = $_POST['doseId'];

$sql = "INSERT INTO users (FirstName, LastName, Age, Gender, Baranggay, vaccine_id, dose_id, submitted_at, status)
        VALUES ('$firstName', '$lastName', '$age', '$gender', '$baranggay', '$vaccineId', '$doseId', NOW(), 'Pending')";

if ($conn->query($sql) === TRUE) {
    $userId = $conn->insert_id;
    if ($doseId == 1) {
        $sqlDose = "INSERT INTO dose1 (user_id) VALUES ('$userId')";
    } elseif ($doseId == 2) {
        $sqlDose = "INSERT INTO dose2 (user_id) VALUES ('$userId')";
    } elseif ($doseId == 3) {
        $sqlDose = "INSERT INTO dose3 (user_id) VALUES ('$userId')";
    }
    if ($conn->query($sqlDose) === TRUE) {
        echo "Form submitted successfully.";
    } else {
        echo "Error: " . $sqlDose . "<br>" . $conn->error;
    }
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
