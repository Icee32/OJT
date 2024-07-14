<?php
session_start();
date_default_timezone_set('Asia/Singapore'); // Set your desired timezone
include "./api/db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {

    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname = validate($_POST['uname']);
    $pass = validate($_POST['password']);

    if (empty($uname)) {
        header("Location: index.php?error=UserName is required");
        exit();
    } else if (empty($pass)) {
        header("Location: index.php?error=Password is required");
        exit();
    } else {
        $sql = "SELECT * FROM users WHERE user_name='$uname'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);

            if (password_verify($pass, $row['password'])) {
                $_SESSION['user_name'] = $row['user_name'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['id'] = $row['id'];

                // Log the successful login
                $userID = $row['UserID']; // Assuming UserID is the unique identifier
                $name = $row['name'];
                $date = date('Y-m-d H:i:s');
                $log_sql = "INSERT INTO login_logs (UserID, name, log_date) VALUES ('$userID', '$uname', '$date')";
                mysqli_query($conn, $log_sql);

                header("Location: adminindex.php");
                exit();
            } else {
                // Log the failed login attempt
                $userID = $row['UserID']; // Assuming UserID is the unique identifier
                $name = $row['name'];
                $date = date('Y-m-d H:i:s');
                $log_sql = "INSERT INTO login_logs (UserID, name, log_date) VALUES ('$userID', '$uname', '$date')";
                mysqli_query($conn, $log_sql);

                header("Location: index.php?error=Incorrect Username or password");
                exit();
            }
        } else {
            header("Location: index.php?error=Incorrect Username or password");
            exit();
        }
    }
} else {
    header("Location: index.php");
    exit();
}
?>
