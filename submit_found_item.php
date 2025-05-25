<?php
// Start the session and set session cookie parameters
$cookie_lifetime = 3600;  // 1 hour in seconds (you can adjust this value as needed)
session_set_cookie_params($cookie_lifetime, '/', '', false, true);  // Secure cookie, HttpOnly flag
session_start(); // Start the session

// Check if the user is logged in (using session data)
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Redirect to login if not logged in
    exit();
}

// Form handling (item registration)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and collect inputs
    $full_name = trim($_POST["full_name"]);
    $email = trim($_POST["email"]);
    $phone = trim($_POST["phone"]);
    $item_name = trim($_POST["item_name"]);
    $item_description = trim($_POST["item_description"]);
    $date_found = trim($_POST["date_found"]);
    $found_location = trim($_POST["found_location"]);
    $return_method = isset($_POST["return_method"]) ? trim($_POST["return_method"]) : "";

    $errors = [];

    // Validation logic for inputs
    if (empty($full_name) || !preg_match("/^[a-zA-Z\s]+$/", $full_name)) {
        $errors[] = "Invalid name (letters and spaces only).";
    }

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Please enter a valid email address.";
    }

    if (empty($phone) || !preg_match("/^\+?\d{11}$/", $phone)) {
        $errors[] = "Please enter a valid phone number (11 digits).";
    }

    if (empty($item_name)) {
        $errors[] = "Item name is required.";
    }

    if (empty($found_location)) {
        $errors[] = "Found location is required.";
    }

    // File upload handling (optional)
    $item_image = null;
    if (isset($_FILES['item_image']) && $_FILES['item_image']['error'] == 0) {
        $item_image = addslashes(file_get_contents($_FILES['item_image']['tmp_name']));
    }

    // Show errors if any
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p style='color:red;'>$error</p>";
        }
    } else {
        // ✅ All validations passed, insert into DB
        
        // Store session data for registration
        $_SESSION['user_name'] = $full_name;  // Store the user's full name in session
        $_SESSION['user_email'] = $email;    // Store the user's email in session

        // Connect to MySQL
        $con = mysqli_connect("localhost", "root", "", "lost-found");

        if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Prepare SQL query using prepared statements (to prevent SQL Injection)
        $sql = "INSERT INTO registration 
                (name, email, phone_number, item_name, item_description, date_found, found_location, return_method, item_image) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        // Prepare the statement
        $stmt = $con->prepare($sql);

        // Bind parameters
        $stmt->bind_param("sssssssss", $full_name, $email, $phone, $item_name, $item_description, $date_found, $found_location, $return_method, $item_image);

        // Execute the query
        if ($stmt->execute()) {
            echo "<p style='color:green;'>Form submitted successfully and data saved!</p>";
            header("Location: confirmation.php");  // Redirect to a confirmation page after submission
            exit();
        } else {
            echo "<p style='color:red;'>Database error: " . mysqli_error($con) . "</p>";
        }

        // Close the connection
        $stmt->close();
        mysqli_close($con);
    }
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
    <form action="" method="post" enctype="multipart/form-data" onsubmit="return validateForm();">
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


