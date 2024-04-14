<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Website</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/home.css">
</head>

<body onload="startTimer()">
    <div id="loader">Loading...</div>
    <div id="page" style="display: none;">
        <?php include  '../pages/includes/header.php'; ?>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <?php
            // Start the session
            session_start();

            // Check if the user is logged in
            if(isset($_SESSION['username'])) {
                $username = $_SESSION['username'];
            } else {
                $username = "Guest"; // Default username if not logged in
            }

            echo '<a class="navbar-brand" href="#">' . $username . '</a>';
            ?>
    
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-title" href="profile.php" style="color:black;">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-title" href="" style="color:black;">Artists</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-title" href="#" style="color:black;">Category</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-title" href="../Trim Songs/index.html" style="color:black;">Ringtones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-title" href="upload music.php" style="color:black;">Upload Music</a>
                    <li class="nav-item">
                        <a class="nav-title" href="login.php" style="color:black;">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="footer-div">
            <form method="GET" action="search.php">
                <div class="form-group">
                    <input class="form-control" type="text" name="search" placeholder="Search for Music " name="find"
                        id="">
                    <button type="submit" class="btn">Search</button>
                </div>
            </form>
        </div>

        <section style="display:flex; justify-content:center;">
            <img class="banner" style="width:500px;" src="../Assests/OIP.jpeg" alt="">
        </section>
        <br><br>
        <span class="section-title">Artists <a style="float:right;" href="artist list.php">view all</a>
        </span>

        <?php include  '../pages/artist added.php'; ?>
        <br><br>
        <span class="section-title">Featured
            <a style="float:right;" href="music list.php">view all</a>
        </span>

        <div class="container">
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
        </div>

        <div id="musicPlayerDrawer">
            <div id="musicInfo">
                <img id="musicImage" src="" alt="Music Image">
                <h5 id="musicTitle"></h5>
            </div>
            <center>
                <div class="music-controls">
                    <button onclick="previousSong()">
                        <svg width="44" height="44" viewBox="0 0 24 24">
                            <path d="M6 6h2v12H6zm3.5 6l8.5 6V6z"></path>
                        </svg>
                    </button>

                    <button id="playPauseBtn" onclick="togglePlayPause()">
                        <svg id="pauseIcon" width="44" height="44" viewBox="0 0 24 24">
                            <path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"></path>
                        </svg>
                        <svg id="playIcon" xmlns="http://www.w3.org/2000/svg" width="44" height="44" fill="currentColor"
                            class="bi bi-play-fill" viewBox="0 0 16 16">
                            <path
                                d="m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393" />
                        </svg>
                    </button>

                    <button onclick="nextSong()">
                        <svg width="44" height="44" viewBox="0 0 24 24">
                            <path d="M14 12l-8.5-6v12zm-1.5 6h2V6h-2z"></path>
                        </svg>
                    </button>
                </div>
            </center>
        </div>

        <script>
        let musicPlayerDrawer = document.getElementById('musicPlayerDrawer');
        let musicTitle = document.getElementById('musicTitle');
        let musicImage = document.getElementById('musicImage');
        let musicPlayer = new Audio();
        let musicSource = document.getElementById('musicSource');

        let currentSongIndex = 0;
        let songs = [];

        let playIcon = document.getElementById('playIcon');
        let pauseIcon = document.getElementById('pauseIcon');

        function togglePlayPause() {
            if (musicPlayer.paused) {
                musicPlayer.play();
                playIcon.style.display = 'none';
                pauseIcon.style.display = 'inline-block';
            } else {
                musicPlayer.pause();
                playIcon.style.display = 'inline-block';
                pauseIcon.style.display = 'none';
            }
        }

        function openMusicPlayerDrawer(title, artist, filePath, imagePath) {
            musicTitle.textContent = title + ' - ' + artist;
            musicImage.src = imagePath;
            musicPlayer.src = filePath;
            musicPlayer.load();
            musicPlayer.play();
            musicPlayerDrawer.classList.add('active');
        }

        function closeMusicPlayerDrawer() {
            musicPlayer.pause();
            musicPlayerDrawer.classList.remove('active');
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
            let song = songs[index];
            musicTitle.textContent = song.title + ' - ' + song.artist;
            musicImage.src = song.imagePath;
            musicPlayer.src = song.filePath;
            musicPlayer.load();
            musicPlayer.play();
        }

        // Populate songs array
        <?php
            $conn = new mysqli($servername, $username, $password, $database);
            $sql_select = "SELECT * FROM music";
            $result = $conn->query($sql_select);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo 'songs.push({title: "' . $row["title"] . '", artist: "' . $row["artist"] . '", filePath: "' . $row["file_path"] . '", imagePath: "' . $row["image_path"] . '"});';
                }
            }
            $conn->close();
            ?>

        // Event listener for when the song ends
        musicPlayer.addEventListener('ended', function() {
            nextSong();
        });

        function startTimer() {
            setTimeout(showPage, 1000); // Show the page after 5 seconds
        }

        function showPage() {
            document.getElementById("loader").style.display = "none";
            document.getElementById("page").style.display = "block";
        }
        </script>

        <?php include  '../pages/includes/sticky footer.php'; ?>
    </div>
</body>
<script src="../js/script.js"></script>

</html>