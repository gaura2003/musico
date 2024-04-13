<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Music list</title>
  <link rel="stylesheet" href="../css/music list.css">
</head>
<body>

  <header>
    <nav>
      <ul>
        <li style="color: black;">songs</li>
        <li>album</li>
        <li>artist</li>
        <li>playlists</li>
      </ul>
    </nav>
  </header>
  <div class="container">
    <?php
    include "../Includes/connection.php";

    // Retrieve search query
    $search = $_GET['search'];

    // Prepare SQL query to search for music
    $sql_select = "SELECT * FROM music WHERE title LIKE '%$search%' OR 
               artist LIKE '%$search%' OR album LIKE '%$search%' OR 
               genre LIKE '%$search%'";

    $result = $conn->query($sql_select);

    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo '<div class="view" onclick="playMusic(\'' . $row["file_path"] . '\')">';
            echo '<div class="image"><img src="' . $row["image_path"] . '" alt="' . $row["image_path"] . '"></div>';
            echo '<div class="text">';
            echo '<h4>' . $row["title"] . '</h4>';
            echo '<h6>' . $row["artist"] . ' - ' . $row["album"] . '</h6>';
            echo '</div>';
            echo '<div class="bars">';
            echo '<div class="bar1"></div>';
            echo '<div class="bar2"></div>';
            echo '<div class="bar3"></div>';
            echo '<div class="bar4"></div>';
            echo '</div>';
            echo '<div class="more">...</div>';
            echo '</div>';
        }
    } else {
        echo "<li>No music records found</li>";
    }
    $conn->close();
    ?>
  </div>

  <div class="drawer" id="drawer">
    <div class="drawer-view">
      <div class="image">
        <img src="../elementor/images (1).jpeg" alt="e">
      </div>
      <div class="drawer-text">
       <marquee> <h4 id="musicName">Music Name</h4></marquee>
        <h6 id="artistAlbum">Artist Name - Album Name</h6>
      </div>
      <div class="buttons">
        <button onclick="previous()">⏪</button>
        <button onclick="togglePlayPause()">⏸️</button>
        <button onclick="next()">⏩</button>
      </div>
     
      </div>
       <div class="progress">
        <span id="currentTime">0:00</span> / 
        <div id="progressContainer">
          <div id="progress" data-progress="0%"></div>
        </div>
        <span id="fullTime">0:00</span>
    </div>
    
  </div>
   
  <audio id="audioPlayer"></audio>

</body>

<script>
  // Audio player
  var audio = document.getElementById("audioPlayer");
  var currentIndex = -1;
  var musicList = [];

  // Function to play music
  function playMusic(filePath) {
    audio.src = filePath;
    audio.play();
    // Update UI
    var view = document.querySelector(".view.active");
    if (view) {
      view.classList.remove("active");
    }
    view = event.currentTarget;
    view.classList.add("active");
    // Update music details in drawer
    var musicName = view.querySelector("h4").textContent;
    var artistAlbum = view.querySelector("h6").textContent;
    document.getElementById("musicName").textContent = musicName;
    document.getElementById("artistAlbum").textContent = artistAlbum;
  }

  // Function to toggle play/pause
  function togglePlayPause() {
    if (audio.paused) {
      audio.play();
    } else {
      audio.pause();
    }
  }

  // Function to play next music
  function next() {
    currentIndex++;
    if (currentIndex >= musicList.length) {
      currentIndex = 0;
    }
    playMusic(musicList[currentIndex]);
  }

  // Function to play previous music
  function previous() {
    currentIndex--;
    if (currentIndex < 0) {
      currentIndex = musicList.length - 1;
    }
    playMusic(musicList[currentIndex]);
  }

  // Update progress bar and time
  audio.addEventListener("timeupdate", function() {
    var currentTime = audio.currentTime;
    var fullTime = audio.duration;
    var progress = (currentTime / fullTime) * 100;
    var minutes = Math.floor(currentTime / 60);
    var seconds = Math.floor(currentTime % 60);
    var currentTimeString = minutes + ":" + (seconds < 10 ? "0" + seconds : seconds);
    minutes = Math.floor(fullTime / 60);
    seconds = Math.floor(fullTime % 60);
    var fullTimeString = minutes + ":" + (seconds < 10 ? "0" + seconds : seconds);
    document.getElementById("currentTime").textContent = currentTimeString;
    document.getElementById("fullTime").textContent = fullTimeString;
    document.getElementById("progress").style.width = progress + "%";
  });

</script>

</html>
