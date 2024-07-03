<?php
require 'Database.php';

$servername = "localhost";
$username = "root";
$password = "12345";

//connection to the database
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{
    echo "connect";
}
