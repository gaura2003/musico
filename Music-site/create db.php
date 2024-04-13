<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "music_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL to create table
$sql = "CREATE TABLE music (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    artist VARCHAR(255),
    album VARCHAR(255),
    genre VARCHAR(255),
    release_year INT,
    duration_seconds INT,
    file_path VARCHAR(255),
    image_path VARCHAR(255)
)";

// Execute SQL query
if ($conn->query($sql) === TRUE) {
    echo "Table music created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Close connection
$conn->close();
?>
