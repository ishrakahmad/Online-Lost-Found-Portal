<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Found Item Registration</title>
</head>
<body>
    <h2>Found Item Registration Form</h2>
    <form action="submit_found_item.php" method="post">
        <table border="1">
            <tr>
                <td><label for="full_name">Full Name:</label></td>
                <td><input type="text" id="full_name" name="full_name" required></td>
            </tr>
            <tr>
                <td><label for="email">Email:</label></td>
                <td><input type="email" id="email" name="email" required></td>
            </tr>
            <tr>
                <td><label for="phone">Phone Number:</label></td>
                <td><input type="tel" id="phone" name="phone" required></td>
            </tr>
            <tr>
                <td><label for="item_name">Item Name:</label></td>
                <td><input type="text" id="item_name" name="item_name" required></td>
            </tr>
            <tr>
                <td><label for="item_description">Item Description:</label></td>
                <td><textarea id="item_description" name="item_description" required></textarea></td>
            </tr>
            <tr>
                <td><label for="date_found">Date Found:</label></td>
                <td><input type="date" id="date_found" name="date_found" required></td>
            </tr>
            <tr>
                <td><label for="found_location">Found Location:</label></td>
                <td><input type="text" id="found_location" name="found_location" required></td>
            </tr>
            <tr>
                <td><label>How to Return the Item?</label></td>
                <td>
                    <input type="radio" id="contact_me" name="return_method" value="contact_me" required>
                    <label for="contact_me">Contact me</label>
                    <input type="radio" id="drop_center" name="return_method" value="drop_center" required>
                    <label for="drop_center">Drop at Lost & Found Center</label>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align:center;">
                    <button type="submit">Submit</button>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
