<?php 
    $host = "localhost";
    $username = "root";
    $password = null;
    $database = "Lets_Discuss";

    $conn = new mysqli($host, $username, $password, $database);

    if($conn->connect_error){
        die("Database not connected: ". $conn->connect_error);
    }

    // echo "Database connected successfully!". "<br/>";
?>