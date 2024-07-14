<?php
session_start();
if(isset($_SESSION['username'])){
    require_once('api/forms-get.php');

    if(isset($_GET['id']) && !empty($_GET['id'])) {
        $id = $_GET['id'];

        $query = "SELECT * FROM users WHERE id = $id";
        $result = $mysqli->query($query);

        if($result && $result->num_rows > 0) {
            $user = $result->fetch_assoc();
        } else {
            echo "No user found with the provided ID.";
            exit;
        }
    } else {
        echo "Invalid ID provided.";
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1>Form Details</h1>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <p><strong>ID:</strong> <?php echo $user['id']; ?></p>
                <p><strong>First Name:</strong> <?php echo $user['FirstName']; ?></p>
                <p><strong>Last Name:</strong> <?php echo $user['LastName']; ?></p>
                <p><strong>Age:</strong> <?php echo $user['Age']; ?></p>
                <p><strong>Gender:</strong> <?php echo $user['Gender']; ?></p>
                <p><strong>Baranggay:</strong> <?php echo $user['Baranggay']; ?></p>
                <p><strong>Vaccine ID:</strong> <?php echo $user['vaccine_id']; ?></p>
                <a href="home-forms.php" class="btn btn-primary">Back to Forms</a>
            </div>
        </div>
    </div>
</body>
</html>

<?php 
} else {
    header("Location: index.php");
    exit();
}
?>
