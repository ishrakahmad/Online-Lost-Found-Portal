<!DOCTYPE html>
<html>
<head>
    <title>Lost Item Registration</title>
</head>
<body>
    <h2>Lost Item Registration Form</h2>
    <form action="submit_lost_item.php" method="post">
        <table border="2">
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
                <td><textarea id="item_description" name="item_description" rows="4" cols="30" required></textarea></td>
            </tr>
            <tr>
                <td><label for="date_lost">Date Lost:</label></td>
                <td><input type="date" id="date_lost" name="date_lost" required></td>
            </tr>
            <tr>
                <td><label for="last_seen_location">Last Seen Location:</label></td>
                <td><input type="text" id="last_seen_location" name="last_seen_location" required></td>
            </tr>
            <tr>
                <td><label for="reward_offer">Reward Offer (if any):</label></td>
                <td><input type="number" id="reward_offer" name="reward_offer" min="0"></td>
            </tr>
            <tr>
                <td><label for="color">Item Color:</label></td>
                <td><input type="text" id="color" name="color"></td>
            </tr>
            <tr>
                <td><label for="item_condition">Item Condition:</label></td>
                <td>
                    <select id="item_condition" name="item_condition">
                        <option value="New">New</option>
                        <option value="Good">Good</option>
                        <option value="Used">Used</option>
                        <option value="Damaged">Damaged</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="identifiable_marks">Identifiable Marks:</label></td>
                <td><input type="text" id="identifiable_marks" name="identifiable_marks"></td>
            </tr>
            <tr>
                <td><label for="additional_notes">Additional Notes:</label></td>
                <td><textarea id="additional_notes" name="additional_notes" rows="3" cols="30"></textarea></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align:center;">
                    <input type="submit" value="Submit">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
