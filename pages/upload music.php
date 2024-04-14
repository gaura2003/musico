<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Music</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background: linear-gradient(black, rgb(75, 31, 75));
        padding: 0;
        margin: 0;
        height: 110vh;
    }

    .container {
        max-width: 500px;
        margin: 10px auto;
        padding: 20px;
        background-color: #ccc;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
        text-align: center;
    }

    label {
        display: block;
        /* margin-bottom: 2px; */
    }

    input[type="text"],
    input[type="number"],
    input[type="file"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 1px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 1px 20px;
        border: none;
        border-radius: 4px;
        font-size: 20px;
        cursor: pointer;
        width: 100%;
        height: 30px;
        margin-bottom: 60px;
    }

    input[type="submit"]:hover {
        background-color: #45a049;
    }
    </style>

</head>

<body>
    <div class="container">
        <h2>Upload Music</h2>
        <form method="post" action="upload music.php" enctype="multipart/form-data">
            <label for="music_image">Select music image (JPEG/PNG):</label>
            <input type="file" id="music_image" name="music_image" accept="image/jpeg,image/png" required><br><br>
            <label for="music_file">Select music file (MP3/WAV/OGG):</label>
            <input type="file" id="music_file" name="music_file" accept=".mp3,.wav,.ogg" required><br><br>
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required><br><br>
            <label for="artist">Artist:</label>
            <input type="text" id="artist" name="artist" required><br><br>
            <label for="album">Album:</label>
            <input type="text" id="album" name="album"><br><br>
            <label for="genre">Genre:</label>
            <input type="text" id="genre" name="genre"><br><br>
            <label for="release_year">Release Year:</label>
            <input type="number" id="release_year" name="release_year"><br><br>
            <label for="duration_seconds">Duration (seconds):</label>
            <input type="number" id="duration_seconds" name="duration_seconds"><br><br>
            <input type="submit" value="Upload">
        </form>
    </div>
    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    include "../Includes/connection.php";

    
    // Handle form submission
    $title = $_POST["title"];
    $artist = $_POST["artist"];
    $album = $_POST["album"];
    $genre = $_POST["genre"];
    $release_year = $_POST["release_year"];
    $duration_seconds = $_POST["duration_seconds"];

    // File upload
    $target_directory = "Uploaded musics/";
    $music_file_name = basename($_FILES["music_file"]["name"]);
    $music_file_path = $target_directory . $music_file_name;
    $target_file = $target_directory . $music_file_name;
    $file_extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if file is a valid audio file
    $allowed_extensions = array("mp4a","mp3", "wav", "ogg");
    if (in_array($file_extension, $allowed_extensions)) {
        if (move_uploaded_file($_FILES["music_file"]["tmp_name"], $target_file)) {
            // Insert record into database
            $image_directory = "Uploaded images/";
            $image_file_name = basename($_FILES["music_image"]["name"]);
            $image_file_path = $image_directory . $image_file_name;
            $image_target_file = $image_directory . $image_file_name;

            if (move_uploaded_file($_FILES["music_image"]["tmp_name"], $image_target_file)) {
                $sql_insert = "INSERT INTO music (title, artist, album, genre, release_year, duration_seconds, file_path, image_path) 
                               VALUES ('$title', '$artist', '$album', '$genre', $release_year, $duration_seconds, '$music_file_path', '$image_file_path')";
                if ($conn->query($sql_insert) === TRUE) {
                    echo "Music uploaded successfully<br>";
                } else {
                    echo "Error uploading music: " . $conn->error . "<br>";
                }
            } else {
                echo "Error uploading image<br>";
            }
        } else {
            echo "Error uploading file<br>";
        }
    } else {
        echo "Invalid file format. Only MP3, WAV, and OGG files are allowed<br>";
    }

    $conn->close();
}
?>
    <?php include  '../pages/includes/sticky footer.php'; ?>
</body>

</html>