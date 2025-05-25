<?php
session_start();  // Start the session

// Check if the user is already logged in, if so, redirect to the registration page
if (isset($_SESSION['username'])) {
    header("Location: submit_found_item.php");  // Redirect to item registration page
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Simulate checking user credentials
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Replace with actual DB validation
    if ($username == "admin" && $password == "password123") {
        $_SESSION['username'] = $username;
        $_SESSION['user_id'] = 1;
        $_SESSION['last_activity'] = time();

        header("Location: submit_found_item.php");  // Redirect to item registration page
        exit();
    } else {
        echo "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

    <h2>Login</h2>
    
    <form action="login.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required><br><br>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br><br>

        <button type="submit">Login</button>
    </form>

</body>
</html>

