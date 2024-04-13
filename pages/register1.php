<?php
// Start the session
session_start();

include "../Includes/connection.php";

// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];
$reg_date = date("Y-m-d H:i:s"); // Current date and time

// Optional field: user profile
if(isset($_POST['user_profile'])) {
    $user_profile = $_POST['user_profile'];
} else {
    $user_profile = ""; // Default value if not provided
}

// Prepare and bind SQL statement
$stmt = $conn->prepare("INSERT INTO Registration (name, email, phone, password, reg_date, user_profile) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $name, $email, $phone, $password, $reg_date, $user_profile);

// Execute SQL statement
if ($stmt->execute()) {
    // Set session variables
    $_SESSION['username'] = $name;
    $_SESSION['email'] = $email;
    
    // Redirect user to home.php
    header("Location: home.php");
    exit; // Ensure that no other code is executed after redirection
} else {
    echo "Error: " . $stmt->error;
}

// Close connection
$conn->close();
?>
