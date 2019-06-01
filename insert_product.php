<?php 
include("functions.php");
$image = addslashes(file_get_contents($_FILES['image']['tmp_name'])); //SQL Injection defence!
$image_name = addslashes($_FILES['image']['name']);
$sql = "INSERT INTO `tbl_images` (`id`, `image`, `image_name`) VALUES ('1', '{$image}', '{$image_name}')";
if (!mysqli_query($link,$sql)) { // Error handling
    echo "Something went wrong! :("; 
}