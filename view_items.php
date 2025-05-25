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

// Connect to MySQL
$con = mysqli_connect("localhost", "root", "", "lost-found");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch the items from the database
$sql = "SELECT * FROM registration";
$result = mysqli_query($con, $sql);

// Check if there are any items in the database
if (mysqli_num_rows($result) > 0) {
    // Display items in a table
    echo "<table border='1'>
            <tr>
                <th>Full Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Item Name</th>
                <th>Item Description</th>
                <th>Date Found</th>
                <th>Found Location</th>
                <th>Return Method</th>
                <th>Item Image</th>
            </tr>";

    // Loop through each item and display it
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>" . $row["name"] . "</td>
                <td>" . $row["email"] . "</td>
                <td>" . $row["phone_number"] . "</td>
                <td>" . $row["item_name"] . "</td>
                <td>" . $row["item_description"] . "</td>
                <td>" . $row["date_found"] . "</td>
                <td>" . $row["found_location"] . "</td>
                <td>" . $row["return_method"] . "</td>
                <td>";

        // Check if item image exists and display it
        if ($row["item_image"]) {
            echo "<img src='data:image/jpeg;base64," . base64_encode($row["item_image"]) . "' alt='Item Image' width='100' height='100'>";
        } else {
            echo "No image available";
        }

        echo "</td></tr>";
    }

    echo "</table>";
} else {
    echo "<p>No items found in the database.</p>";
}

// Close the database connection
mysqli_close($con);
?>
