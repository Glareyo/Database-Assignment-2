<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $friendID = $_POST["target_id"];
    $currentID = $_SESSION["id"];


    //Add Friend to database
    require_once "dbh.inc.php";

        $query = "INSERT INTO `friends`(`user_id`, `friend_id`) VALUES (?,?),(?,?)";

        $stmt = $pdo->prepare($query);

        $stmt->execute([$currentID,$friendID,$friendID,$currentID]);

        $pdo = null;
        $stmt = null;


    header("Location: ../profile.php"); //Redirects user the moment it opens up.
}
else{
    header("Location: ../profile.php"); //Redirects user the moment it opens up.
}