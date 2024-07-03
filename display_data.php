<?php
require 'Database.php';

$servername = "localhost";
$username = "root";
$password = "12345"; 
$dbname = "test_db";

$db = new Database($servername, $username, $password, $dbname);

$sql = "SELECT u.name, u.email, p.title, p.body, p.created_at
        FROM users u
        JOIN posts p ON u.id = p.user_id
        WHERE u.active = 1 AND p.active = 1";

$result = $db->select($sql);

$image_path = 'images/default-avatar.jpg';

if (!empty($result)) {
    foreach ($result as $row) {
        echo "<div class='user'>";
        echo "<img src='$image_path' alt='User Avatar' style='width:50px;height:50px;'>";
        echo "<h2>" . $row['name'] . "</h2>";
        echo "<p>Email: " . $row['email'] . "</p>";
        echo "<div class='post'>";
        echo "<h3>" . $row['title'] . "</h3>";
        echo "<p>" . $row['body'] . "</p>";
        echo "<small>Posted on " . $row['created_at'] . "</small>";
        echo "</div>";
        echo "</div>";
    }
} else {
    echo "No results found.";
}

?>
