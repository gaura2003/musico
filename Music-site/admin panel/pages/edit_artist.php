<?php

include "../Includes/connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id = $_POST['id'];
  $name = $_POST['name'];
  $bio = $_POST['bio'];

  // Check if a new image was uploaded
  if ($_FILES['image']['size'] > 0) {
    $image_name = $_FILES['image']['name'];
    $image_temp = $_FILES['image']['tmp_name'];
    $image_path = "uploads/" . $image_name;
    // Move uploaded image to a folder
    move_uploaded_file($image_temp, $image_path);

    $sql = "UPDATE artists SET name='$name', bio='$bio', image='$image_path' WHERE id=$id";
  } else {
    $sql = "UPDATE artists SET name='$name', bio='$bio' WHERE id=$id";
  }

  if ($conn->query($sql) === TRUE) {
    echo "Artist updated successfully";
  } else {
    echo "Error updating artist: " . $conn->error;
  }
}

$conn->close();
?>
