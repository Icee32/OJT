<?php
session_start();
date_default_timezone_set('Asia/Singapore'); // Set your desired timezone
include "./api/db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password']) && isset($_POST['confirmpass'])) {

  function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  $uname = validate($_POST['uname']);
  $pass = validate($_POST['password']);
  $confirmpass = validate($_POST['confirmpass']);

  $errors = []; // Initialize an empty array to store errors

  if (empty($uname)) {
    $errors[] = "Username is required.";
  } else if (strlen($uname) < 5) {
    $errors[] = "Username must be at least 5 characters long.";
  } // Add more username validation rules (e.g., special characters)

  if (empty($pass)) {
    $errors[] = "Password is required.";
  } else if (strlen($pass) < 5) {
    $errors[] = "Password must be at least 5 characters long.";
  } // Add more password validation rules (e.g., uppercase, lowercase, numbers)

  if (empty($confirmpass)) {
    $errors[] = "Confirm Password is required.";
  } else if ($pass !== $confirmpass) {
    $errors[] = "Passwords do not match.";
  }

  if (!empty($errors)) {
    // Handle errors
    $error_message = "<ul>";
    foreach ($errors as $error) {
      $error_message .= "<li>$error</li>";
    }
    $error_message .= "</ul>";

    header("Location: indexsign.php?error=$error_message");
    exit();
  }

  $hashed_password = password_hash($pass, PASSWORD_DEFAULT);

  $sql_check = "SELECT * FROM users WHERE user_name='$uname'";
  $result_check = mysqli_query($conn, $sql_check);

  if (mysqli_num_rows($result_check) > 0) {
    $errors[] = "Username already exists.";
    $error_message = "<ul>";
    foreach ($errors as $error) {
      $error_message .= "<li>$error</li>";
    }
    $error_message .= "</ul>";
    header("Location: indexsign.php?error=$error_message");
    exit();
  } else {
    // Insert new user into database
    $sql = "INSERT INTO users (user_name, password) VALUES ('$uname', '$hashed_password')";

    if (mysqli_query($conn, $sql)) {
      // Retrieve the auto-generated UserID
      $user_id = mysqli_insert_id($conn);
      
      // Update the UserID with the correct format
      $formatted_user_id = 'USR' . str_pad($user_id, 6, '0', STR_PAD_LEFT);

      // Update the users table with the formatted UserID
      $update_sql = "UPDATE users SET UserID='$formatted_user_id' WHERE id='$user_id'";
      mysqli_query($conn, $update_sql);

      echo "<h3>Registration Successful!</h3>";
      sleep(2);
      header("Location: login.php");
      exit();
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }
} else {
  header("Location: indexsign.php");
  exit();
}
?>
