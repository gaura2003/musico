<?php

include "../Includes/connection.php";

// Retrieve artist ID from the URL
if (isset($_GET['id'])) {
    $artist_id = $_GET['id'];

    // Retrieve artist details from the database
    $sql = "SELECT * FROM artists WHERE id = $artist_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $artist = $result->fetch_assoc();
    } else {
        echo "Artist not found";
    }
} else {
    echo "Invalid request";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Artist Details</title>
<style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f2f2f2;
  }
  .container {
    max-width: 800px;
    margin: 20px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }
  h2 {
    color: #333;
  }
  img {
    max-width: 100%;
    height: auto;
    margin-bottom: 20px;
    border-radius: 5px;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
  }
  p {
    color: #666;
    line-height: 1.5;
  }
  a {
    color: #007bff;
    text-decoration: none;
    display: inline-block;
    margin-top: 20px;
  }
  a:hover {
    text-decoration: underline;
  }
</style>
</head>
<body>

<div class="container">
  <h2><?php echo $artist['name']; ?></h2>
  <img src="<?php echo $artist['image']; ?>" alt="<?php echo $artist['name']; ?>">
  <p><?php echo $artist['bio']; ?></p>
  <a href="index.php">Back to Artists List</a>
</div>

</body>
</html>
