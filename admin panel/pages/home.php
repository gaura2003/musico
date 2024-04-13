<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="styles.css">
  <script src="script.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .navbar {
            margin-bottom: 20px;
        }
        .nav-item {
            margin-left: 10px;
        }
        .nav-link {
            color: #333;
        }
        .nav-link:hover {
            color: #007bff;
        }
        .nav-link.active {
            color: #007bff;
            font-weight: bold;
        }
        a{
            text-decoration:none;
            color:white;
        }
    </style>
</head>
<body onload="startTimer()">
  <div id="loader">Loading...</div>
  <div id="page" style="display: none;">
     <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">User name</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="users.php">Users</a>
                </li>
                <li class="nav-item">
  <a class="nav-link" href="add artists.php">Artists</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Category</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
     <div class="container">
    <div class="option" id="users">
     <a href="users.php"><h2>Users</h2></a> 
      
    </div>
   
    <div class="option" id="artist">
    <a href="add artists.php"><h2>Artists</h2></a>  
      
    </div>
    <div class="option" id="category">
      <h2>Category</h2>
      
    </div>
 
    <div class="option" id="playlist">
      <h2>Playlist</h2>
      
    </div>
  </div>
</body>
</html>


<style>
body {
  background-color: #f2f2f2;
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
}

#loader {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  font-size: 24px;
  color: #333;
}

#page {
  display: flex;
  flex-direction: column;
  align-items: center;
  padding: 20px;
}

h1 {
  text-align: center;
  color: #333;
}

.option {
  width: 100%;
  max-width: 500px;
  margin-bottom: 20px;
  padding: 20px;
  text-align: center;
  color: #fff;
}

#users {
  background-color: #ff7f50;
}

#artist{
  background-color: #6495ed;
}

#category {
  background-color: #ff69b4;
}

#playlist {
  background-color: #32cd32;
}

#redeem {
  background-color: #ff4500;
}
</style>

<script>
function startTimer() {
  setTimeout(showPage, 1000); // Show the page after 5 seconds
}

function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("page").style.display = "block";
}
</script>
