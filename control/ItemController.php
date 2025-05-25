<?php
require_once '../app/models/Item.php';

class ItemController {
    private $item;

    public function __construct($db) {
        $this->item = new Item($db);
    }

    // Add new item
    public function addItem() {
        // Start the session to check if the user is logged in
        session_start(); // Start the session

        // Check if the user is logged in
        if (!isset($_SESSION['username'])) {
            // If not logged in, redirect to the login page
            echo "You need to be logged in to register an item.";
            header("Location: login.php"); // Redirect to the login page
            exit();
        }

        // Handle the form submission for adding an item
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $found_location = $_POST['found_location'];
            $image = addslashes(file_get_contents($_FILES['item_image']['tmp_name']));

            if ($this->item->create($name, $description, $found_location, $image)) {
                header('Location: item_list.php');
                exit();
            } else {
                echo "Error adding item.";
            }
        }

        // Load the add item form
        require_once '../app/views/item_add.php';
    }
}
?>
