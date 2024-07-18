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
    die("Connection failed: " . $conn->connect_error);
}

if (!isset($_GET['id'])) {
    die("ID not specified.");
}

$id = (int)$_GET['id'];

$sql = "SELECT users.id, users.FirstName as firstname, users.LastName as lastname, users.middleinitial, users.birthdate, users.Age as age, 
        users.phonenumber, gender.gendername as gender, baranggay.baranggayname as baranggay, users.baranggay_id, 
        vaccine.vaccinename as vaccinetype, users.vaccine_id, users.dose_id, users.status, users.submitted_at
        FROM users
        LEFT JOIN tblgender AS gender ON users.gender_id = gender.genderid
        LEFT JOIN tblbaranggay AS baranggay ON users.baranggay_id = baranggay.baranggayid
        LEFT JOIN tblvaccine AS vaccine ON users.vaccine_id = vaccine.vaccineid
        WHERE users.id = $id";

$result = $conn->query($sql);

if ($result->num_rows == 0) {
    die("No record found.");
}

$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Registrant</title>
    <link rel="stylesheet" href="path/to/your/css">
</head>
<body>
    <div class="container">
        <h1>View Registrant</h1>
        <table class="table table-responsive">
            <tr>
                <th>ID</th>
                <td><?= htmlspecialchars($user['id']); ?></td>
            </tr>
            <tr>
                <th>First Name</th>
                <td><?= htmlspecialchars($user['firstname']); ?></td>
            </tr>
            <tr>
                <th>Last Name</th>
                <td><?= htmlspecialchars($user['lastname']); ?></td>
            </tr>
            <tr>
                <th>Middle Initial</th>
                <td><?= htmlspecialchars($user['middleinitial']); ?></td>
            </tr>
            <tr>
                <th>Birthdate</th>
                <td><?= htmlspecialchars($user['birthdate']); ?></td>
            </tr>
            <tr>
                <th>Age</th>
                <td><?= htmlspecialchars($user['age']); ?></td>
            </tr>
            <tr>
                <th>Gender</th>
                <td><?= htmlspecialchars($user['gender_id']); ?></td>
            </tr>
            <tr>
                <th>Baranggay ID</th>
                <td><?= htmlspecialchars($user['baranggay_id']); ?></td>
            </tr>
            <tr>
                <th>Vaccine ID</th>
                <td><?= htmlspecialchars($user['vaccine_id']); ?></td>
            </tr>
            <tr>
                <th>Dose ID</th>
                <td><?= htmlspecialchars($user['dose_id']); ?></td>
            </tr>
            <tr>
                <th>Phone Number</th>
                <td><?= htmlspecialchars($user['phonenumber']); ?></td>
            </tr>
            <tr>
                <th>Status</th>
                <td><?= htmlspecialchars($user['status']); ?></td>
            </tr>
            <tr>
                <th>Submitted At</th>
                <td><?= htmlspecialchars($user['submitted_at']); ?></td>
            </tr>
        </table>
        <a href="adminwalkin.php" class="btn btn-primary">Back</a>
    </div>
</body>
</html>

<?php
$conn->close();
?>
