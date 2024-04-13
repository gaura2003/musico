<?php

include "../Includes/connection.php";

// Directory where images will be stored
$imageFolder = "../images/";

// Check if the directory exists and has the necessary permissions
if (!file_exists($imageFolder)) {
    mkdir($imageFolder, 0777, true); // Create directory recursively with full permissions
}

// Get form data
$name = $_POST['name'];
$bio = $_POST['bio'];

// Check if image is uploaded
if(isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $imageTmpName = $_FILES['image']['tmp_name'];
    $imageName = $_FILES['image']['name'];
    $imagePath = $imageFolder . $imageName;

    // Move the uploaded image to the correct directory
    if (move_uploaded_file($imageTmpName, $imagePath)) {
        // Set the image path to the desired format
        $imagePath = "../admin panel/images/" . basename($imagePath);
    } else {
        echo "Failed to move uploaded image to directory.";
        exit(); // Exit the script if the image move operation fails
    }
} else {
    // If no image uploaded, set image path to empty string
    $imagePath = "";
}

// Prepare and bind SQL statement
$stmt = $conn->prepare("INSERT INTO artists (name, bio, image_path) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $bio, $imagePath);

// Execute SQL statement
if ($stmt->execute()) {
    echo "Artist added successfully";
} else {
    echo "Error adding artist: " . $conn->error;
}

// Close connection
$conn->close();

?>
