<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>User Profile - Music Website</title>
<link rel="stylesheet" href="styles.css">

<style>
    /* styles.css */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f8f8f8;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

header {
    background-color: #333;
    color: #fff;
    padding: 20px 0;
}

header h1 {
    margin: 0;
    font-size: 32px;
}

nav ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
}

nav ul li {
    display: inline;
    margin-right: 20px;
}

nav ul li:last-child {
    margin-right: 0;
}

nav ul li a {
    color: #fff;
    text-decoration: none;
    font-size: 18px;
}

.profile {
    display: flex;
    justify-content: space-between;
    margin-top: 40px;
}

.user-info {
    flex: 1;
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 20px;
}

.user-info img {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    margin-bottom: 20px;
}

.user-info h2 {
    margin: 0;
    font-size: 24px;
}

.user-info p {
    margin: 0;
    color: #666;
}

.user-actions {
    text-align: right;
}

.user-options {
    flex: 1;
    margin-left: 20px;
}

.user-options h3 {
    margin-top: 0;
    margin-bottom: 20px;
    font-size: 24px;
    color: #333;
}

.user-options ul {
    list-style-type: none;
    padding: 0;
}

.user-options ul li {
    margin-bottom: 10px;
}

.user-options ul li a {
    color: #333;
    text-decoration: none;
    font-size: 18px;
}

.footer {
    background-color: #333;
    color: #fff;
    padding: 20px 0;
    text-align: center;
    margin-top: 40px;
}

.footer p {
    margin: 0;
    font-size: 16px;
}

</style>
</head>
<body>
<header>
    <div class="container">
        <h1>Musicify</h1>
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">My Profile</a></li>
                <li><a href="#">Discover</a></li>
                <li><a href="#">Logout</a></li>
            </ul>
        </nav>
    </div>
</header>

<div class="container profile">
    <div class="user-info">
        <div class="user-details">
            <img src="profile_picture.jpg" alt="Profile Picture">
            <h2>User Name</h2>
            <p>Email: user@example.com</p>
        </div>
        <div class="user-actions">
            <a href="#" class="button">Edit Profile</a>
        </div>
    </div>
    <div class="user-options">
        <h3>Profile Options</h3>
        <ul>
            <li><a href="#">Upload Music</a></li>
            <li><a href="#">Playlists</a></li>
            <li><a href="#">Favorite Songs</a></li>
            <li><a href="#">My Tracks</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Logout</a></li>
        </ul>
    </div>
</div>

<footer>
    <div class="container">
        <p>&copy; 2024 Musicify. All rights reserved.</p>
    </div>
</footer>
</body>
</html>
