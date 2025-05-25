<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Item</title>
</head>
<body>
    <h2>Add New Item</h2>
    <form action="item_add.php" method="POST" enctype="multipart/form-data">
        <label for="name">Item Name:</label>
        <input type="text" name="name" required>

        <label for="description">Item Description:</label>
        <textarea name="description" required></textarea>

        <label for="found_location">Found Location:</label>
        <input type="text" name="found_location" required>

        <label for="item_image">Item Image:</label>
        <input type="file" name="item_image" required>

        <button type="submit">Add Item</button>
    </form>
</body>
</html>
