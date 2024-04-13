<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Player</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        #musicPlayer {
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    background-color: #333;
    color: white;
    padding: 10px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

#musicInfo {
    display: flex;
    align-items: center;
}

#musicImage {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    margin-right: 10px;
}

#songDetails {
    text-align: left;
}

#musicControls button {
    background: none;
    border: none;
    color: white;
    cursor: pointer;
    font-size: 1.5em;
    margin: 0 10px;
    outline: none;
}

    </style>
</head>
<body>
    
    <?php
    
    include "../Includes/connection.php";

    // Retrieve data from database
    $sql_select = "SELECT * FROM music";
    $result = $conn->query($sql_select);

    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo '<div class="music-card" onclick="openMusicPlayerDrawer(\'' . $row["title"] . '\', \'' . $row["artist"] . '\', \'' . $row["file_path"] . '\', \'' . $row["image_path"] . '\')">';
             echo '<img src="' . $row["image_path"] . '" alt="Music Image">';
            echo '<p>' . $row["title"] . '</p>';
            echo '<p>' . $row["artist"] . '</p>';
            echo '<p>' . $row["album"] . '</p>';
           
            echo '</div>';
        }
    } else {
        echo "<p>No music records found</p>";
    }
    $conn->close();
    ?>

    <div id="musicPlayer">
        <div id="musicInfo">
            <img id="musicImage" src="" alt="Music Image">
            <div id="songDetails">
                <h5 id="musicTitle"></h5>
                <p id="musicArtist"></p>
                <p id="musicAlbum"></p>
            </div>
        </div>
        <div id="musicControls">
            <button id="previousBtn" onclick="previousSong()">&#9665;</button>
            <button id="playPauseBtn" onclick="togglePlayPause()">▶️</button>
            <button id="nextBtn" onclick="nextSong()">&#9655;</button>
        </div>
    </div>

    <script src="script.js">
        let playPauseBtn = document.getElementById('playPauseBtn');
let musicImage = document.getElementById('musicImage');
let musicTitle = document.getElementById('musicTitle');
let musicArtist = document.getElementById('musicArtist');
let musicAlbum = document.getElementById('musicAlbum');
let previousBtn = document.getElementById('previousBtn');
let nextBtn = document.getElementById('nextBtn');

let musicPlayer = new Audio();
let currentSongIndex = 0;
let songs = [];

// Populate songs array with data from PHP
<?php
    $conn = new mysqli($servername, $username, $password, $database);
    $sql_select = "SELECT * FROM music";
    $result = $conn->query($sql_select);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo 'songs.push({title: "' . $row["title"] . '", artist: "' . $row["artist"] . '", album: "' . $row["album"] . '", filePath: "' . $row["file_path"] . '", imagePath: "' . $row["image_path"] . '"});';
        }
    }
    $conn->close();
?>

function updateUI() {
    musicTitle.textContent = songs[currentSongIndex].title;
    musicArtist.textContent = songs[currentSongIndex].artist;
    musicAlbum.textContent = songs[currentSongIndex].album;
    musicImage.src = songs[currentSongIndex].imagePath;
}

function togglePlayPause() {
    if (musicPlayer.paused) {
        musicPlayer.play();
        playPauseBtn.textContent = '⏸';
    } else {
        musicPlayer.pause();
        playPauseBtn.textContent = '▶️';
    }
}

function nextSong() {
    currentSongIndex = (currentSongIndex + 1) % songs.length;
    loadSong(currentSongIndex);
}

function previousSong() {
    currentSongIndex = (currentSongIndex - 1 + songs.length) % songs.length;
    loadSong(currentSongIndex);
}

function loadSong(index) {
    musicPlayer.src = songs[index].filePath;
    musicPlayer.load();
    musicPlayer.play();
    updateUI();
}

// Initial load
loadSong(currentSongIndex);

    </script>
</body>
</html>
