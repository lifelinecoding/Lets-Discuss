<?php 
session_start();
include("../common/database.php");
if(isset($_POST["signup"])){
    // Extracting data from the url.
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $address = $_POST["address"];

    $InsertQuery = "INSERT INTO USERS (ID, USERNAME, EMAIL, PASSWORD, ADDRESS) VALUES ('NULL', '$username', '$email', '$password', '$address');";
    $preparedQuery =  $conn->prepare($InsertQuery);

    $result = $preparedQuery->execute();

    if($result){
        echo "User created successfully!";
        $_SESSION["user"] = ["username" => $username, "email" => $email];
    }
    else {
        echo "User registration failed";
    }
}
?>