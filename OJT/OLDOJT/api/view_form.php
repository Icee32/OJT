<?php
$userID = isset($_GET['userID']) ? $_GET['userID'] : null;

// Connect to the database (replace with your credentials)
$conn = mysqli_connect("localhost", "root", "", "starosaforms");

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Prepare SQL query to fetch all users from stauser table
$sql = "SELECT * FROM stauser";

// Execute query
$result = mysqli_query($conn, $sql);

// Check query results
if ($result !== false) {
  // Loop through each user record
  while ($row = mysqli_fetch_assoc($result)) {
    // Display user details in a formatted way (replace with your desired layout)
    echo "<h2>User Details</h2>";
    echo "<p><b>ID:</b> " . $row['id'] . "</p>";
    echo "<p><b>Name:</b> " . $row['FirstName'] . " " . $row['LastName'] . "</p>";
    echo "<p><b>Age:</b> " . $row['Age'] . "</p>";
    echo "<p><b>Gender:</b> " . $row['Gender'] . "</p>";
    echo "<p><b>Baranggay:</b> " . $row['Baranggay'] . "</p>";
    echo "<p><b>Vaccine ID:</b> " . $row['vaccine_id'] . "</p>";
    echo "<p><b>Dose ID:</b> " . $row['dose_id'] . "</p>";
    echo "<p><b>Submitted At:</b> " . $row['submitted_at'] . "</p>";
    echo "<p><b>Status:</b> " . $row['status'] . "</p>";
    echo "<hr>"; // Add a horizontal line for separation between users
  }
} else {
  echo "No records found in the stauser table.";
}

// Close connection
mysqli_close($conn);

?>
