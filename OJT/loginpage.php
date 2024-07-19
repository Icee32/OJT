<?php

// Database connection (replace with your credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "adminlogin";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Sanitize user input (replace with proper sanitization)
$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

// Check if username exists
$sql = "SELECT * FROM users WHERE username = '$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Username exists, now verify password
  $row = $result->fetch_assoc();

  // Password hashing (replace with your actual password hashing logic)
  // You'll need to store the hashed password in the database during registration.
  if (password_verify($password, $row['password'])) {
    // Login successful (redirect to a protected page or display success message)
    echo "Login successful!";
  } else {
    echo "Invalid password";
  }
} else {
  // Username not found
  echo "Username not found";
}

$conn->close();
?>
