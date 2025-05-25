<?php
while ($row = $items->fetch(PDO::FETCH_ASSOC)) {
    echo "<p>" . $row['name'] . " - " . $row['description'] . "</p>";
    echo "<a href='item_edit.php?id=" . $row['id'] . "'>Edit</a>";
    echo "<a href='item_delete.php?id=" . $row['id'] . "'>Delete</a>";
}
?>
