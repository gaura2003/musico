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
    
    text-align:center;
  }
  .artist {
    display: inline-block;
    margin-right: 20px;
    width:150px;
    padding: 20px;
    margin: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        background-color: #fff;
        text-align: center;
  }
  .artist img {
  width:100px;
  height:100px;
    max-width: 100px;
    cursor: pointer;
  }
 h5 {
        padding-top: 10px;
        margin: 0px;
        white-space: nowrap; 
  overflow: hidden;
  text-overflow: ellipsis;  
  font-size:20px;
    }
    
   a{
     text-decoration: none;
    color:black;
   }
</style>
</head>
<body>

<div class="artists-container" >
  <?php foreach($data as $artist): ?>
  <div class="artist"  >
  
    <a href="artist_details.php?id=<?php echo $artist['artist_id']; ?>"> 
      <img src="<?php echo $artist['image_path']; ?>"  alt="<?php echo $artist['name']; ?>"> </a>
      <h5><?php echo $artist['name']; ?></h5>
    
  </div>
  <?php endforeach; ?>
</div>
</body>
</html>
