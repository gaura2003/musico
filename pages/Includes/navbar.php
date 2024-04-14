<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Musico </title>   

 <link rel="stylesheet" type="text/css" href="styles.css">
  <script src="script.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
     <link rel="stylesheet" href="../css/main.css">
     
       <link rel="stylesheet" href="../css/home.css">
       <style>
        body{
            margin:0;
            padding:0;
            height:100vh;
        }
        nav{
            border-radius:20px;
        }
    </style>
   
</head>
<body onload="startTimer()" >
  <div id="loader">Loading...</div>
  <div id="page" style="display: none;">         
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
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="profile.php">Profile</a>
                </li>
                <li class="nav-item">
  <a class="nav-link" href="artist list.php">Artists</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Category</a>
                </li>
                                <li class="nav-item">
                    <a class="nav-link" href="../Trim Songs/index.html">Ringtones</a>
                </li>
                 <li class="nav-item">
  <a class="nav-link" href="upload music.php">Upload Music</a>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Logout</a>
                </li>
                <li>
                <form method="GET" action="search.php" style="display:inline;">
                <div class="form-group">
                    <input class="form-control" type="text" name="search" placeholder="Search for Music " name="find"
                        id="">
                    <button type="submit" class="btn">Search</button>
                </div>
            </form>
                </li>
            </ul>
        </div>
    </nav>   
    
    </body>
    <script>
        function startTimer() {
  setTimeout(showPage, 1000); // Show the page after 5 seconds
}

function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("page").style.display = "block";
}
    </script>
    </html>