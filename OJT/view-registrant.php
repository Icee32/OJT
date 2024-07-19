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

// Handle form submission for updates
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $middleinitial = mysqli_real_escape_string($conn, $_POST['middleinitial']);
    $birthdate = mysqli_real_escape_string($conn, $_POST['birthdate']);
    $age = (int)$_POST['age'];
    $gender_id = (int)$_POST['gender_id'];
    $baranggay_id = (int)$_POST['baranggay_id'];
    $vaccine_id = (int)$_POST['vaccine_id'];
    $dose_id = (int)$_POST['dose_id'];
    $phonenumber = mysqli_real_escape_string($conn, $_POST['phonenumber']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);

    $update_sql = "UPDATE users 
                   SET FirstName='$firstname', LastName='$lastname', middleinitial='$middleinitial', birthdate='$birthdate', 
                       Age='$age', gender_id='$gender_id', baranggay_id='$baranggay_id', vaccine_id='$vaccine_id', 
                       dose_id='$dose_id', phonenumber='$phonenumber', status='$status' 
                   WHERE id=$id";

    if ($conn->query($update_sql) === TRUE) {
        echo "<script>alert('Record updated successfully');</script>";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Handle delete request
if (isset($_POST['delete'])) {
    $delete_sql = "DELETE FROM users WHERE id=$id";
    if ($conn->query($delete_sql) === TRUE) {
        header("Location: adminvacregistrants.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

$sql = "SELECT users.id, users.FirstName as firstname, users.LastName as lastname, users.middleinitial, users.birthdate, users.Age as age, 
        users.phonenumber, users.gender_id, gender.gendername as gender, users.baranggay_id, baranggay.baranggayname as baranggay, 
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
    <link rel="stylesheet" href="css/adminstyle.css">
    <style>
        body {
            background-color: #f7f7f7;
            font-family: 'Poppins', sans-serif;
        }
        .container {
            max-width: 900px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }
        .table-responsive {
            width: 100%;
            margin-bottom: 20px;
        }
        .table {
            width: 100%;
            margin-bottom: 1rem;
            background-color: transparent;
        }
        .table th, .table td {
            padding: 12px;
            vertical-align: middle;
            border-top: 1px solid #dee2e6;
        }
        .table th {
            text-align: left;
            background-color: #f8f9fa;
        }
        .form-control, .form-select {
            display: block;
            width: 100%;
            padding: 10px;
            font-size: 16px;
            color: #495057;
            background-color: #fff;
            border: 1px solid #ced4da;
            border-radius: 5px;
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.075);
            margin-bottom: 10px;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        }
        .btn {
            display: inline-block;
            font-weight: 400;
            color: #fff;
            text-align: center;
            vertical-align: middle;
            user-select: none;
            background-color: #007bff;
            border: 1px solid #007bff;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
            margin-right: 5px;
        }
        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }
        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
    </style>
</head>
<body>
    <section class="box">
        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>View Registrant</h3>
                </div>
                <div class="container">
                    <form method="POST" action="view-registrant.php?id=<?= htmlspecialchars($user['id']); ?>">
                        <table class="table table-responsive">
                            <tr>
                                <th>ID</th>
                                <td><?= htmlspecialchars($user['id']); ?></td>
                            </tr>
                            <tr>
                                <th>First Name</th>
                                <td><input type="text" name="firstname" value="<?= htmlspecialchars($user['firstname']); ?>" class="form-control" required></td>
                            </tr>
                            <tr>
                                <th>Last Name</th>
                                <td><input type="text" name="lastname" value="<?= htmlspecialchars($user['lastname']); ?>" class="form-control" required></td>
                            </tr>
                            <tr>
                                <th>Middle Initial</th>
                                <td><input type="text" name="middleinitial" value="<?= htmlspecialchars($user['middleinitial']); ?>" class="form-control" required></td>
                            </tr>
                            <tr>
                                <th>Birthdate</th>
                                <td><input type="date" name="birthdate" value="<?= htmlspecialchars($user['birthdate']); ?>" class="form-control" required></td>
                            </tr>
                            <tr>
                                <th>Age</th>
                                <td><input type="number" name="age" value="<?= htmlspecialchars($user['age']); ?>" class="form-control" required></td>
                            </tr>
                            <tr>
                                <th>Gender</th>
                                <td>
                                    <select name="gender_id" class="form-select" required>
                                        <option value="1" <?= $user['gender_id'] == 1 ? 'selected' : ''; ?>>Male</option>
                                        <option value="2" <?= $user['gender_id'] == 2 ? 'selected' : ''; ?>>Female</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>Baranggay</th>
                                <td>
                                    <select name="baranggay_id" class="form-select" required>
                                        <?php
                                        $baranggay_sql = "SELECT baranggayid, baranggayname FROM tblbaranggay";
                                        $baranggay_result = $conn->query($baranggay_sql);
                                        if ($baranggay_result->num_rows > 0) {
                                            while($row = $baranggay_result->fetch_assoc()) {
                                                echo '<option value="'.$row['baranggayid'].'" '.($user['baranggay_id'] == $row['baranggayid'] ? 'selected' : '').'>'.htmlspecialchars($row['baranggayname']).'</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>Vaccine Type</th>
                                <td>
                                    <select name="vaccine_id" class="form-select" required>
                                        <?php
                                        $vaccine_sql = "SELECT vaccineid, vaccinename FROM tblvaccine";
                                        $vaccine_result = $conn->query($vaccine_sql);
                                        if ($vaccine_result->num_rows > 0) {
                                            while($row = $vaccine_result->fetch_assoc()) {
                                                echo '<option value="'.$row['vaccineid'].'" '.($user['vaccine_id'] == $row['vaccineid'] ? 'selected' : '').'>'.htmlspecialchars($row['vaccinename']).'</option>';
                                            }
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th>Dose ID</th>
                                <td><input type="number" name="dose_id" value="<?= htmlspecialchars($user['dose_id']); ?>" class="form-control" required></td>
                            </tr>
                            <tr>
                                <th>Phone Number</th>
                                <td><input type="text" name="phonenumber" value="<?= htmlspecialchars($user['phonenumber']); ?>" class="form-control" required></td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td><input type="text" name="status" value="<?= htmlspecialchars($user['status']); ?>" class="form-control" required></td>
                            </tr>
                            <tr>
                                <th>Submitted At</th>
                                <td><?= htmlspecialchars($user['submitted_at']); ?></td>
                            </tr>
                        </table>
                        <button type="submit" class="btn btn-success">Update</button>
                        <button type="submit" name="delete" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this record?')">Delete</button>
                    </form>
                    <a href="adminvacregistrants.php" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </section>
</body>
</html>

<?php
$conn->close();
?>
