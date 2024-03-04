<?php
session_start();
//var_dump($_SERVER["REQUEST_METHOD"]);

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $currentID = $_SESSION["id"];

    //Add Friend to database
    require_once "dbh.inc.php";

        $query = "DELETE FROM friends WHERE user_id='$currentID';
        DELETE FROM friends WHERE friend_id='$currentID';
        DELETE FROM users WHERE id='$currentID';
        ";

        $stmt = $pdo->prepare($query);

        $stmt->execute();

        $pdo = null;
        $stmt = null;

    session_abort();
    header("Location: ../index.php"); //Redirects user the moment it opens up.
}
else{
    header("Location: ../profile.php"); //Redirects user the moment it opens up.
}