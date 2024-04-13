<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$database = "users";

// Check if form data is submitted via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract form data
    $user_id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Update user details in the database
    $sql = "UPDATE `Registration` SET name='$name', email='$email', phone='$phone' WHERE id=$user_id";

    if ($conn->query($sql) === TRUE) {
        echo "User details updated successfully.";
    } else {
        echo "Error updating user details: " . $conn->error;
    }

    // Close connection
    $conn->close();
} else {
    echo "No data submitted.";
}
?>
