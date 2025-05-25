<?php
class Item {
    private $conn;
    private $table = "items";

    public function __construct($db) {
        $this->conn = $db;
    }

    // CREATE
    public function create($name, $description, $found_location, $image) {
        $query = "INSERT INTO " . $this->table . " (name, description, found_location, item_image) VALUES (:name, :description, :found_location, :image)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':found_location', $found_location);
        $stmt->bindParam(':image', $image);

        return $stmt->execute();
    }

    // READ
    public function read() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // UPDATE
    public function update($id, $name, $description, $found_location, $image) {
        $query = "UPDATE " . $this->table . " SET name = :name, description = :description, found_location = :found_location, item_image = :image WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':found_location', $found_location);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }

    // DELETE
    public function delete($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>
