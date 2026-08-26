<?php 
include("../common/database.php");
if(isset($_POST["signup"])){
    echo "Username is: ". $_POST["username"] . "</br>";
    echo "Email is: ". $_POST["email"] . "</br>";
    echo "Password is: ". $_POST["password"] . "</br>";
    echo "Address is: ". $_POST["address"] . "</br>";
}
?>