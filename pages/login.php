<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/registeration.css">
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form action="login_process.php" method="post">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
            Don't have an account? <a href="register.php">Register here</a>
        </form>
    </div>
</body>
</html>
 
