<?php


// Set session cookie parameters (before session_start())
$cookie_lifetime = 3600;  // 1 hour in seconds (you can adjust this value as needed)
session_set_cookie_params($cookie_lifetime, '/', '', false, true);  // Secure cookie, HttpOnly flag

session_start(); // Start the session to use session variables


require_once '../app/config/Database.php';
require_once '../app/controllers/AdminController.php';

$database = new Database();
$db = $database->conn;

$adminController = new AdminController($db);
$adminController->login();
