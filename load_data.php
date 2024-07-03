<?php
require 'Database.php';

$servername = "localhost";
$username = "root";
$password = "12345"; 
$dbname = "test_db";

// instance of the Database class
$db = new Database($servername, $username, $password, $dbname);

$users_json = file_get_contents('https://jsonplaceholder.typicode.com/users');
$users = json_decode($users_json, true);

// Insert data into the users table
foreach ($users as $user) {
    $name = $user['name'];
    $email = $user['email'];
    $active = rand(0, 1); // Random value 
    $birthdate = '1990-01-01'; // Default

    $query = "INSERT INTO users (name, email, birthdate, active) VALUES ('$name', '$email', '$birthdate', $active)";
    echo $db->insert($query);
}

$posts_json = file_get_contents('https://jsonplaceholder.typicode.com/posts');
$posts = json_decode($posts_json, true);

// Insert data into the posts table
foreach ($posts as $post) {
    $user_id = $post['userId'];
    $title = $post['title'];
    $body = $post['body'];
    $active = rand(0, 1); 

    $query = "INSERT INTO posts (user_id, title, body, active) VALUES ($user_id, '$title', '$body', $active)";
    echo $db->insert($query);
}

?>
