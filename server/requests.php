<?php
session_start();
include("../common/database.php");
if (isset($_POST["signup"])) {
    // Extracting data from the url.
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $address = $_POST["address"];

    $InsertQuery = "INSERT INTO USERS (ID, USERNAME, EMAIL, PASSWORD, ADDRESS) VALUES ('NULL', '$username', '$email', '$password', '$address');";
    $preparedQuery =  $conn->prepare($InsertQuery);

    $result = $preparedQuery->execute();

    if ($result) {
        $_SESSION["user"] = ["username" => $username, "email" => $email];
        header("location: /discuss");
    }
}
else if(isset($_POST["login"])){
    $email = $_POST["email"]; 
    $password = $_POST["password"]; 

    $getQuery = "SELECT * FROM USERS WHERE EMAIL = '$email' AND PASSWORD = '$password'";
    $result = $conn -> query($getQuery);


    if($result -> num_rows == 1){
        $username = "";
        foreach($result as $rows){
            $username = $rows["username"];
        }

        $_SESSION["user"] = ["username" => $username, "email" => $email];
        header("location: /discuss");
    }
}
else if(isset($_GET["logout"])){
    session_unset();
    header("location: /discuss");
}
