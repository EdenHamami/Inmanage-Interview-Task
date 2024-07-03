<?php

$image_url = 'https://cdn2.vectorstock.com/i/1000x1000/23/81/default-avatar-profile-icon-vector-18942381.jpg';
$image_save_path = 'images/default-avatar.jpg';

if (!is_dir('images')) {
    mkdir('images', 0777, true);
}
file_put_contents($image_save_path, file_get_contents($image_url));
echo "Image downloaded and saved to: " . $image_save_path;

?>
