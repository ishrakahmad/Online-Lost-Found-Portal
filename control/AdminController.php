<?php
session_start(); // Start the session

require_once '../app/models/Admin.php';

class AdminController {
    private $admin;

    public function __construct($db) {
        $this->admin = new Admin($db);
    }

    // Login method
    public function login() {
        // Check if the user is submitting the login form
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST['username'];
            $password = $_POST['password'];

            // Simulate checking against a database (replace with actual validation)
            if ($this->admin->login($username, $password)) {
                
                // Session cookie parameters (session lifetime of 1 hour)
                $cookie_lifetime = 3600; // 1 hour
                session_set_cookie_params($cookie_lifetime, '/', '', false, true);  // Secure cookie, HttpOnly flag
                session_start();  // Start session
                
                // Store session data after successful login
                $_SESSION['username'] = $username;  // Store username in session
                $_SESSION['user_id'] = 1;           // Store user ID in session
                $_SESSION['last_activity'] = time(); // Store the time of last activity

                // Redirect to dashboard after login
                header("Location: dashboard.php");
                exit();
            } else {
                echo "Invalid username or password.";
            }
        }

        // Load the login view
        require_once '../app/views/admin_login.php';
    }

    // Logout method
    public function logout() {
        // Clear all session variables
        session_unset();
        session_destroy();  // Destroy session data

        // Expire the session cookie by setting its expiration time in the past
        setcookie(session_name(), '', time() - 3600, '/');  // Expire the session cookie

        // Redirect to login page after logout
        header('Location: index.php');
        exit();
    }
}
?>
