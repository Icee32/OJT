<?php
include 'db_connection.php';

if (isset($_GET['id']) && isset($_GET['status'])) {
    $id = intval($_GET['id']);
    $status = $conn->real_escape_string($_GET['status']);
    
    $sql = "UPDATE users SET status = '$status' WHERE id = $id";
    
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    echo "Invalid request.";
}

$conn->close();
header('Location: adminforms.php');
exit();
?>
