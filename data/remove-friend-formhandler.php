<?php
session_start();
//var_dump($_SERVER["REQUEST_METHOD"]);

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $friendID = $_POST["target_id"];
    $currentID = $_SESSION["id"];


    //Add Friend to database
    require_once "dbh.inc.php";

        $query = "DELETE FROM friends WHERE user_id='$currentID' && friend_id='$friendID';
        DELETE FROM friends WHERE user_id='$friendID' && friend_id='$currentID';";

        $stmt = $pdo->prepare($query);

        $stmt->execute();

        $pdo = null;
        $stmt = null;


    header("Location: ../profile.php"); //Redirects user the moment it opens up.
}
else{
    header("Location: ../profile.php"); //Redirects user the moment it opens up.
}