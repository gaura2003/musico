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

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Artists</title>
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
  .overlay {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
  }
</style>
</head>
<body>

<div class="artists-container">
  <?php foreach($data as $artist): ?>
  <div class="artist">
    <img src="<?php echo $artist['image']; ?>" onclick="zoomImage(this)" alt="<?php echo $artist['name']; ?>">
    <h3><a href="artist_details.php?id=<?php echo $artist['id']; ?>"><?php echo $artist['name']; ?></a></h3>
    <button onclick="editArtist(<?php echo $artist['id']; ?>)">Edit</button>
    <button onclick="deleteArtist(<?php echo $artist['id']; ?>)">Delete</button>
  </div>
  <?php endforeach; ?>
</div>

<div class="popup" id="editPopup">
  <!-- Edit form goes here -->
  <button onclick="closePopup()">Close</button>
</div>

<div class="overlay" id="overlay" onclick="closePopup()"></div>

<script>
function zoomImage(img) {
  window.open(img.src, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=500,left=500,width=400,height=400");
}

function editArtist(id) {
  document.getElementById('editPopup').style.display = 'block';
  document.getElementById('overlay').style.display = 'block';
  // You can populate the edit form with artist data using AJAX or other methods
}

function deleteArtist(id) {
  // Perform delete operation using AJAX or form submission
  if (confirm("Are you sure you want to delete this artist?")) {
    // Delete artist code goes here
  }
}

function closePopup() {
  document.getElementById('editPopup').style.display = 'none';
  document.getElementById('overlay').style.display = 'none';
}
</script>

</body>
</html>
