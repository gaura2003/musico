<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add Artist</title>
<link rel="stylesheet" href="../css/add_artist.css">
</head>
<body>

<div class="container">
  <h2>Add Artist</h2>
  <form action="add_artist.php" method="post" enctype="multipart/form-data">
    <label for="name">Artist Name:</label>
    <input type="text" id="name" name="name" required>
    <label for="bio">Bio:</label>
    <textarea id="bio" name="bio" required></textarea>
    <label for="image">Image:</label>
    <input type="file" id="image" name="image" accept="image/*" required>
    <button type="submit">Add Artist</button>
  </form>
</div>

<?php

include "../Includes/connection.php";

// Retrieve data from database
$sql = "SELECT * FROM artists";
$result = $conn->query($sql);

$data = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

$conn->close();
?>

<style>
  .artists-container {
    display: flex;
    overflow-x: auto;
    white-space: nowrap;
    background-color: black;
    text-align:center;
  }
  .artist {
    display: inline-block;
    margin-right: 20px;
    background-color: white;
    width:150px;
    padding: 20px;
    margin: 10px;
    border-radius: 15px ;
  }
  .artist img {
    width:100px;
    height:100px;
    max-width: 100px;
    cursor: pointer;
  }
  h3 {
    padding: 0px;
    margin: 0px;
  }
  .popup {
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: white;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
  }
 
</style>
</head>
<body>

<div class="artists-container">
  <?php foreach($data as $artist): ?>
  <div class="artist">
    <img src="<?php echo $artist['image_path']; ?>" onclick="zoomImage(this)" alt="<?php echo $artist['name']; ?>">
    <h3><a href="artist_details.php?id=<?php echo $artist['id']; ?>"><?php echo $artist['name']; ?></a></h3>
    <button onclick="editArtist(<?php echo $artist['id']; ?>)">Edit</button>
    <button action="../process files/delete_artist.php" onclick="deleteArtist(<?php echo $artist['id']; ?>)">Delete</button>
  </div>
  <?php endforeach; ?>
</div>

<div class="popup" id="editPopup">
  <form id="editForm" action="edit_artist.php" method="post" enctype="multipart/form-data">
    <h2>Edit Artist</h2>
    <input type="hidden" id="editId" name="id">
    <label for="editName">Artist Name:</label>
    <input type="text" id="editName" name="name" required>
    <label for="editBio">Bio:</label>
    <textarea id="editBio" name="bio" required></textarea>
    <label for="editImage">Image:</label>
    <input type="file" id="editImage" name="image" accept="image/*">
    <button type="submit">Save Changes</button>
    <button type="button" onclick="closePopup()">Cancel</button>
  </form>
</div>

<script>
function zoomImage(img) {
  window.open(img.src, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=400,height=400");
}

function editArtist(id) {
  document.getElementById('editPopup').style.display = 'block';
  
}

function closePopup() {
  document.getElementById('editPopup').style.display = 'none';
  
}

function editArtist(id, name, bio) {
  document.getElementById('editId').value = id;
  document.getElementById('editName').value = name;
  document.getElementById('editBio').value = bio;
  document.getElementById('editPopup').style.display = 'block';
  
}

function deleteArtist(id) {
  if (confirm("Are no you sure you want to delete this artist?")) {
    // Perform delete operation using AJAX
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          // Delete successful, reload the page
          location.reload();
        } else {
          // Delete failed, show error message
          alert("Failed to delete artist. Please try again later.");
        }
      }
    };
    xhr.open("POST", "delete_artist.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("id=" + id);
  }
}
</script>
</body>
</html>
