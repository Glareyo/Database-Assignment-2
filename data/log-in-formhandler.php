<!-- Credit: Dani Krossing -->
<!-- Provided a playlist of php tutorial videos -->
<!-- Credit: Bheem Raj-->
<!-- Provided a way to do a password and username error check -->
<!-- https://stackoverflow.com/questions/29024361/php-wrong-username-password-how-to-echo-it-properly -->

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Use htmlspecialchars when outputting into the browser.
    //$userName = htmlspecialchars($_POST["username"]);

    $username = $_POST["username"];
    $userpassword = $_POST["userpassword"];

    if (empty($username) || empty($userpassword)) {
        header("Location: ../log-in.php"); //Redirects user the moment it opens up.
        exit();
    }

    try {
        //Used to access the database, in which dbh.inc.php has the code for.
        require_once "dbh.inc.php";

        $query = "SELECT * FROM users WHERE username = '$username' && userpassword = '$userpassword';
        ";

        $stmt = $pdo->prepare($query);

        $stmt->execute();


        $results = null;
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);


        // Check to if the results came up with nothing.
        if (empty($results)) {
            header("Location: ../log-in.php?msg=failed"); //Redirects user the moment it opens up.
            die("");
        }

        // Check to see if data actaully exists
        session_start();
        foreach ($results as $row) {
            $_SESSION["id"] = (string) $row["id"];
            $_SESSION["username"] = (string) $row["username"];
            $_SESSION["userpassword"] = (string) $row["userpassword"];
            $_SESSION["firstname"] = (string) $row["firstname"];
            $_SESSION["lastname"] = (string) $row["lastname"];
            $_SESSION["useraddress"] = (string) $row["useraddress"];
            $_SESSION["zipcode"] = (string) $row["zipcode"];
        }



        $pdo = null;
        $stmt = null;

        header("Location: ../profile.php"); //Redirects user the moment it opens up.

        die();
    } catch (PDOException $e) {
        die("Query Failed: " . $e->getMessage());
    }

} else {
    header("Location: ../index.php");
}