<?php
require 'Database.php';

$servername = "localhost";
$username = "root";
$password = "12345"; 
$dbname = "test_db";

$db = new Database($servername, $username, $password, $dbname);

$sql = "SELECT DATE(created_at) as date, HOUR(created_at) as hour, COUNT(*) as post_count
        FROM posts
        GROUP BY DATE(created_at), HOUR(created_at)
        ORDER BY DATE(created_at), HOUR(created_at)";

$result = $db->select($sql);

if (!empty($result)) {
    echo "<table border='1'>";
    echo "<tr><th>Date</th><th>Hour</th><th>Post Count</th></tr>";
    foreach ($result as $row) {
        echo "<tr>";
        echo "<td>" . $row['date'] . "</td>";
        echo "<td>" . $row['hour'] . "</td>";
        echo "<td>" . $row['post_count'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No results found.";
}

?>
