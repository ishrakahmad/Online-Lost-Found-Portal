<?php
// Start the session and set session cookie parameters
$cookie_lifetime = 3600;  // 1 hour in seconds (you can adjust this value as needed)
session_set_cookie_params($cookie_lifetime, '/', '', false, true);  // Secure cookie, HttpOnly flag
session_start(); // Start the session

// Check if the user is logged in (using session data)
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Redirect to login if not logged in
    exit(); // Stop further script execution
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Found Item Registration</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
</head>
<body>
    <h2>Found Item Registration Form</h2>

    <!-- Form for item registration -->
    <form action="submit_found_item.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm();">
        <table border="1">
            <tr>
                <td><label for="full_name">Full Name:</label></td>
                <td>
                    <input type="text" id="full_name" name="full_name" required>
                    <div id="error_name" style="color:red;"></div>
                </td>
            </tr>
            <tr>
                <td><label for="email">Email:</label></td>
                <td>
                    <input type="email" id="email" name="email" required>
                    <div id="error_email" style="color:red;"></div>
                </td>
            </tr>
            <tr>
                <td><label for="phone">Phone Number:</label></td>
                <td>
                    <input type="tel" id="phone" name="phone" required>
                    <div id="error_phone" style="color:red;"></div>
                </td>
            </tr>
            <tr>
                <td><label for="item_name">Item Name:</label></td>
                <td>
                    <input type="text" id="item_name" name="item_name" required>
                    <div id="error_item" style="color:red;"></div>
                </td>
            </tr>
            <tr>
                <td><label for="item_description">Item Description:</label></td>
                <td>
                    <textarea id="item_description" name="item_description"></textarea>
                </td>
            </tr>
            <tr>
                <td><label for="date_found">Date Found:</label></td>
                <td>
                    <input type="date" id="date_found" name="date_found" required>
                </td>
            </tr>
            <tr>
                <td><label for="found_location">Found Location:</label></td>
                <td>
                    <input type="text" id="found_location" name="found_location" required>
                    <div id="error_location" style="color:red;"></div>
                </td>
            </tr>
            <tr>
                <td><label>How to Return the Item?</label></td>
                <td>
                    <input type="radio" id="contact_me" name="return_method" value="Contact me" required>
                    <label for="contact_me">Contact me</label>
                    <input type="radio" id="drop_center" name="return_method" value="Drop at Lost & Found Center" required>
                    <label for="drop_center">Drop at Lost & Found Center</label>
                </td>
            </tr>
            <tr>
                <td><label for="item_image">Upload Item Image:</label></td>
                <td>
                    <input type="file" name="item_image" accept="image/*">
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align:center;">
                    <button type="submit">Submit</button>
                </td>
            </tr>
        </table>
    </form>

    <!-- Session information (for debugging, can be removed in production) -->
    <p>Logged in as: <?php echo $_SESSION['username']; ?></p>

</body>
</html>
