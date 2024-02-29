<!-- Credit: Dani Krossing -->
<!-- Provided Youtube tutorials on PHP -->
<!-- https://www.youtube.com/watch?v=IagGGcC95Ig&list=PL0eyrZgxdwhwwQQZA79OzYwl5ewA7HQih&index=22 -->


<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Use htmlspecialchars when outputting into the browser.
    //$userName = htmlspecialchars($_POST["username"]);

    $username = $_POST["username"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $useraddress = $_POST["useraddress"];
    $zipcode = $_POST["zipcode"];

    try{
        //Used to access the database, in which dbh.inc.php has the code for.
        require_once "dbh.inc.php";

        $query = "INSERT INTO users (username,firstname,lastname,useraddress,zipcode) VALUES
        (?,?,?,?,?);";

        $stmt = $pdo->prepare($query);

        $stmt->execute([$username,$firstname,$lastname, $useraddress, $zipcode]);

        $pdo = null;
        $stmt = null;

        header("Location: ../completed-sign-up.php"); //Redirects user the moment it opens up.

        die();
    } catch(PDOException $e) {
        die("Query Failed: " . $e->getMessage());
    }

}
else {
    header("Location: ../index.php");
}