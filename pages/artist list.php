<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Page</title>
    
    <style>
    body {
        background: linear-gradient(black, rgb(75, 31, 75));
        height: 100vh;

    }

    .container {
        display: grid;
        grid-template-columns: auto auto auto auto;
        grid-gap: 15px 15px;
        justify-content: center;
        

    }

    .card {
        background-color: rgb(172, 188, 201);
        border-radius: 5px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        width: 150px;
        height: 180px;
        align-items: center;
        padding: 10px 0;
        text-align:center;
    }

    h3,
    h2 {
        margin: 0;
        width: 100px;
        white-space: wrap;
        font-size: 20px;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    img {
        width: 100px;
        height: 100px;
        border-radius: 5px;
    }

    .artist-link {

        display: flex;
        text-decoration: none;
        color: black;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    @media screen and (max-width:400px) {
        .container {
            grid-template-columns: auto auto;

        }

        .card {
            width: 120px;
            height: 120px;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 10px 0;
        }

        img {
            width: 60px;
            height: 60px;
            border-radius: 5px;
        }

        h3,
        h2 {
            margin: 0;
            font-size: 15px;
            text-overflow: hidden;
        }

    }
    </style>

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
    <?php include  '../pages/includes/sticky footer.php'; ?>
</body>

</html>