<?php
class Admin {
    private $conn;
    private $table = "admins";

    public function __construct($db) {
        $this->conn = $db;
    }

    // Login method (Check against database)
    public function login($username, $password) {
        $query = "SELECT * FROM " . $this->table . " WHERE username = :username LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        
        $admin = $stmt->fetch(PDO::FETCH_ASSOC);

        // Check if the password matches (use password_verify for hashed passwords)
        if ($admin && password_verify($password, $admin['password'])) {
            return true;
        }
        return false;
    }
}
?>
