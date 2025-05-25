<?php
// Start the session and check if user is logged in
session_start();

if (!isset($_SESSION['username'])) {
    echo "You need to be logged in to view this page.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation</title>
</head>
<body>
    <h2>Item Registration Successful!</h2>
    <p>Thank you for submitting the found item details.</p>
    <p><a href="view_items.php">Go back to the item list</a></p>
</body>
</html>
