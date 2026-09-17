<?php
session_start();
include("../common/database.php");
if (isset($_POST["signup"])) {
    // Extracting data from the url.
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $address = $_POST["address"];

    $InsertQuery = "INSERT INTO USERS (ID, USERNAME, EMAIL, PASSWORD, ADDRESS) VALUES (?,?,?,?,?);";
    $preparedQuery =  $conn->prepare($InsertQuery);

    $result = $preparedQuery->execute([null,$username,$email, $password, $address]);

    // echo $result;
    // echo $preparedQuery ->insert_id;

    if ($result) {
        $_SESSION["user"] = ["username" => $username, "email" => $email, "user_id" => $preparedQuery->insert_id];
        header("location: /lets-discuss");
    }
} else if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $getQuery = "SELECT * FROM USERS WHERE EMAIL = '$email' AND PASSWORD = '$password'";
    $result = $conn->query($getQuery);


    if ($result->num_rows == 1) {
        $username = "";
        $id = 0;
        foreach ($result as $rows) {
            $username = $rows["username"];
            $id = $rows["id"];
        }

        $_SESSION["user"] = ["username" => $username, "email" => $email, "user_id" => $id];
        header("location: /lets-discuss");
    }
} else if (isset($_GET["logout"])) {
    session_unset();
    header("location: /lets-discuss");
} else if (isset($_POST["ask"])) {

    $title = $_POST["title"];
    $description = $_POST["description"];
    $category = $_POST["category"];
    $user_id = $_SESSION["user"]["user_id"];

    $InsertQuery = "INSERT INTO QUESTIONS (`ID`, `TITLE`, `DESCRIPTION`, `CATEGORY`, `USER_ID`) VALUES (?, ?, ?, ?, ?);";

    $preparedQuery = $conn->prepare($InsertQuery);

    $result = $preparedQuery->execute([null, $title, $description, $category, $user_id]);

    if ($result) {
        header("location: /lets-discuss");
    }
} else if (isset($_POST["ans"])) {
    $question_id = $_POST["question_id"];
    $answer = $_POST["answer"];
    $user_id = $_SESSION["user"]["user_id"];

    $qeury = $conn->prepare("INSERT INTO ANSWERS (`ID`, `ANSWERS`,`USER_ID`, `QUESTION_ID`) VALUES (?,?,?,?);");

    $result = $qeury->execute([null, $answer, $user_id, $question_id]);

    if ($result) {
        header("location: /lets-discuss/?q-id=$question_id");
    }
}
else if(isset($_GET["delete"])){
$qid = $_GET["delete"];

try {
    $conn->begin_transaction();

    $deleteQuery = $conn->prepare("DELETE FROM QUESTIONS WHERE ID = ?");
    $deleteQuery->execute([$qid]);

    $deleteAnswers = $conn->prepare("DELETE FROM ANSWERS WHERE QUESTION_ID = ?");
    $deleteAnswers->execute([$qid]);

    $conn->commit();
    $uid = $_SESSION['user']['user_id'];
    header("location: /lets-discuss/?u-id=$uid");
} catch (Exception $e) {
    $conn->rollBack();
    throw $e;
}   
}
