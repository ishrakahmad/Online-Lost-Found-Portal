<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: admin_login.php');
    exit();
}

echo "Welcome, Admin!";
echo "<a href='logout.php'>Logout</a>";
?>
