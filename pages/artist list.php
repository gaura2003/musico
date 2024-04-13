<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Page</title>
    <link rel="stylesheet" href="../css/utiles.css">

</head>

<body>
    <div class="container">
        <?php
    // Database connection
    include "../Includes/connection.php";

    // Retrieve artist data from the database
    $sql_select = "SELECT * FROM artists";
    $result = $conn->query($sql_select);

    if ($result->num_rows > 0) {
      // Output data of each row
      while($row = $result->fetch_assoc()) {
        echo '<div class="card">';
        echo '<a class="artist-link" href="artist_details.php?id=' . $row["artist_id"] . '">';
        echo '<div class="image">';
        echo '<img src="' . $row["image_path"] . '" alt="' . $row["name"] . '">';
        echo '</div>';
        echo '<h2>' . $row["name"] . '</h2>';
        
        echo '</a>';
        echo '</div>';
      }
    } else {
      echo "No artists found";
    }
    $conn->close();
    ?>
    </div>
</body>

</html>