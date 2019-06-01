<?php
    $servername = "localhost";
    $username = "ariham_suhail";
    $password = "suhail@123";
    $database="ariham_flycorp";
    
    // Create connection
    $link = new mysqli($servername, $username, $password,$database);

        if (mysqli_connect_error()) {
    
            die ("There was an error connecting to the database");
    
        } 

 ?>   