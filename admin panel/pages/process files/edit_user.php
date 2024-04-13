<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$database = "users";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if user id is provided via GET parameter
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $user_id = $_GET['id'];

    // Fetch user details from database
    $sql = "SELECT * FROM `Registration` WHERE id = $user_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Populate form fields with user data for editing
        $name = $row['name'];
        $email = $row['email'];
        $phone = $row['phone'];
        // Close connection
        $conn->close();
    } else {
        echo "User not found.";
        exit();
    }
} else {
    echo "User ID not provided.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Edit User</h2>
        <form action="update_user.php" method="post">
            <input type="hidden" name="id" value="<?php echo $user_id; ?>">
            <input type="text" name="name" placeholder="Name" value="<?php echo $name; ?>" required>
            <input type="email" name="email" placeholder="Email" value="<?php echo $email; ?>" required>
            <input type="tel" name="phone" placeholder="Phone Number" value="<?php echo $phone; ?>" required>
            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>
