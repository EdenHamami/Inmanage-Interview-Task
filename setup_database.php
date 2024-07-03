<?php
require 'Database.php';

$servername = "localhost";
$username = "root";
$password = "12345"; 

// Create a connection 
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create the database
$sql = "CREATE DATABASE IF NOT EXISTS test_db";
echo $sql . "<br>";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully<br>";
} else {
    echo "Error creating database: " . $conn->error . "<br>";
}

// USE DB
$conn->select_db("test_db");

//users table
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100),
    email VARCHAR(100) UNIQUE,
    birthdate DATE,
    active BOOLEAN
)";
echo $sql . "<br>";
if ($conn->query($sql) === TRUE) {
    echo "Table users created successfully<br>";
} else {
    echo "Error creating table users: " . $conn->error . "<br>";
}

// Create the posts table
$sql = "CREATE TABLE IF NOT EXISTS posts (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT,
    title VARCHAR(255),
    body TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    active BOOLEAN,
    FOREIGN KEY (user_id) REFERENCES users(id)
)";
echo $sql . "<br>";
if ($conn->query($sql) === TRUE) {
    echo "Table posts created successfully<br>";
} else {
    echo "Error creating table posts: " . $conn->error . "<br>";
}

// Create the post_counts table
$sql = "CREATE TABLE IF NOT EXISTS post_counts (
    date DATE,
    hour INT,
    post_count INT
)";
echo $sql . "<br>";
if ($conn->query($sql) === TRUE) {
    echo "Table post_counts created successfully<br>";
} else {
    echo "Error creating table post_counts: " . $conn->error . "<br>";
}

$conn->close();
?>
