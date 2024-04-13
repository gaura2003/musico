<?php

include "../Includes/connection.php";

// Process form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare and bind SQL statement
    $stmt = $conn->prepare("SELECT * FROM Registration WHERE email=? AND password=?");
    $stmt->bind_param("ss", $email, $password);

    // Execute SQL statement
    $stmt->execute();

    // Get result
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // User found, redirect to dashboard or any other page
        header("Location: home.php");
        echo "Login successful";
    } else {
        // User not found or incorrect credentials
        echo "Invalid email or password";
    }
}

// Close connection
$conn->close();
?>
