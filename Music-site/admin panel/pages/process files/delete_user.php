<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$database = "users";

// Check if user id is provided via GET parameter
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $user_id = $_GET['id'];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Delete user from database
    $sql = "DELETE FROM `Registration` WHERE id = $user_id";

    if ($conn->query($sql) === TRUE) {
        echo "User deleted successfully.";
    } else {
        echo "Error deleting user: " . $conn->error;
    }

    // Close connection
    $conn->close();
} else {
    echo "User ID not provided.";
}
?>
