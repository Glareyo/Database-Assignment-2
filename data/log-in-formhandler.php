<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Use htmlspecialchars when outputting into the browser.
    //$userName = htmlspecialchars($_POST["username"]);

    $username = $_POST["username"];
    $userpassword = $_POST["userpassword"];

    if (empty($username) || empty($userpassword))
    {
        header("Location: ../sign-up.php"); //Redirects user the moment it opens up.
        exit();
    }

    try{
        //Used to access the database, in which dbh.inc.php has the code for.
        require_once "dbh.inc.php";

        $query = "SELECT * FROM users WHERE username = '$username' && userpassword = '$userpassword';";

        $stmt = $pdo->prepare($query);

        $stmt->execute();

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Check to see if data actaully exists
        if (empty($results)){
            header("Location: ../log-in.php");
        }
        else{
            session_start();
            foreach( $results as $row )
                $_SESSION["id"] = (string)$row["id"];
                $_SESSION["username"] = (string)$row["username"];
                $_SESSION["userpassword"] = (string)$row["userpassword"];
                $_SESSION["firstname"] = (string)$row["firstname"];
                $_SESSION["lastname"] = (string)$row["lastname"];
                $_SESSION["useraddress"] = (string)$row["useraddress"];
                $_SESSION["zipcode"] = (string)$row["zipcode"];
        }


        $pdo = null;
        $stmt = null;

        header("Location: ../profile.php"); //Redirects user the moment it opens up.

        die();
    } catch(PDOException $e) {
        die("Query Failed: " . $e->getMessage());
    }

}
else {
    header("Location: ../index.php");
}