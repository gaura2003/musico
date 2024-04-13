<?php

include "../Includes/connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id = $_POST['id'];

  $sql = "DELETE FROM artists WHERE id=$id";

  if ($conn->query($sql) === TRUE) {
    echo "Artist deleted successfully";
  } else {
    echo "Error deleting artist: " . $conn->error;
  }
}

$conn->close();
?>
