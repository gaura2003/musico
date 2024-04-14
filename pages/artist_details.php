<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Artist Details</title>
  <style>
    body{
      background:linear-gradient(black , rgb(75, 31, 75));
      height:100vh;

    }
    .container {
      max-width: 600px;
      margin: 0 auto;
      padding: 20px;
      display: flex;
      justify-content:center;
      align-items:center;

    }
    .artist-details {
      border: 1px solid #ccc;
      border-radius: 5px;
      padding: 20px;
      display: flex;
      justify-content:center;
      align-items:center;
      flex-direction:column;
    }
    .artist-details img {
      max-width: 100%;
      border-radius: 5px;
      margin-bottom: 20px;
    }
    .artist-details h2, .artist-details p {
      margin: 0;
      color:white;
    }
    img{
      width:300px;
      height: 300px;
    }
  </style>
</head>
<body>
  <div class="container">
    <?php
    // Database connection
    include "../Includes/connection.php";

    // Check if artist ID is provided in the URL
    if(isset($_GET['id'])) {
      // Retrieve artist details from the database based on the provided ID
      $artist_id = $_GET['id'];
      // Prepare SQL statement with a parameter
      $sql_select = "SELECT * FROM artists WHERE artist_id = ?";
      $stmt = $conn->prepare($sql_select);
      // Bind the parameter
      $stmt->bind_param("i", $artist_id);
      // Execute the statement
      $stmt->execute();
      // Get the result
      $result = $stmt->get_result();

      if ($result->num_rows > 0) {
        // Output data of the artist
        $row = $result->fetch_assoc();
        echo '<div  class="artist-details">';
        echo '<img onclick="zoomImage(this)" src="' . $row["image_path"] . '" alt="' . $row["name"] . '" >';

        echo '<h2>' . $row["name"] . '</h2>';
      
        echo '<p>' . $row["bio"] . '</p>';
        echo '</div>';
      } else {
        echo "No artist found with the provided ID";
      }

      // Close the statement
      $stmt->close();
    } else {
      echo "Artist ID not provided";
    }

    $conn->close();
    ?>
  </div>
  <?php include  '../pages/includes/sticky footer.php'; ?>
  <script>
function zoomImage(img) {
  window.open(img.src, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=400,height=400");
}

</script>
</body>
</html>
