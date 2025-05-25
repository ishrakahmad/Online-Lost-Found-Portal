<?php
session_start(); // Start the session

// Clear all session variables
session_unset();
session_destroy(); // Destroy the session

// Expire the session cookie
setcookie(session_name(), '', time() - 3600, '/');  // Expire the session cookie

// Redirect to login page after logout
header("Location: login.php");  // Redirect to the login page
exit();
?>
