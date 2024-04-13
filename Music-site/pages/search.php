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
    while ($row = $result->fetch_assoc()) {
        echo '<div class="music-card" onclick="openMusicPlayerDrawer(\'' . $row["title"] . '\', \'' . $row["artist"] . '\', \'' . $row["file_path"] . '\', \'' . $row["image_path"] . '\')">';
        echo '<img src="' . $row["image_path"] . '" alt="Music Image">';
        echo '<div class="details">';
        echo '<p>' . $row["title"] . '</p>';
        echo '<p>' . $row["artist"] . '</p>';
        echo '<p>' . $row["album"] . '</p>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo "<p>No music records found</p>";
}

$conn->close();
?>
<style>
    /* Default styles for music card */
.music-card {
    display: flex;
    align-items: center;
    padding: 10px;
    border-bottom: 1px solid #ddd;
}

.music-card img {
    width: 50px;
    height: 50px;
    margin-right: 10px;
    border-radius: 5px;
}

.music-card p {
    margin: 0;
}

.music-card .details {
    flex: 1;
}

.music-card .details p:nth-child(2) {
    font-weight: bold;
}

/* Media query for mobile devices */
@media only screen and (max-width: 468px) {
    .music-card {
        flex-direction: column;
        align-items: flex-start;
    }

    .music-card img {
        margin-right: 0;
        margin-bottom: 10px;
    }
}

</style>
