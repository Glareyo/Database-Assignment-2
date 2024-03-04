<!-- Credit: Dani Krossing -->
<!-- Provided a playlist of php tutorial videos -->
<!-- https://www.youtube.com/watch?v=m52ljs78S24&list=PL0eyrZgxdwhwwQQZA79OzYwl5ewA7HQih -->

<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $edit_username = $_POST["username"];
    $edit_userpassword = $_POST["userpassword"];
    $edit_firstname = $_POST["firstname"];
    $edit_lastname = $_POST["lastname"];
    $edit_useraddress = $_POST["useraddress"];
    $edit_zipcode = $_POST["zipcode"];

    $ID = $_SESSION["id"];

    if (empty($edit_username)){
        echo "<br>";
        echo "Username is empty";
        $edit_username = $_SESSION["username"];
    }
    if (empty($edit_userpassword)){
        echo "<br>";
        echo "userpassword is empty";
        $edit_userpassword = $_SESSION["userpassword"];
    }
    if (empty($edit_firstname)){
        echo "<br>";
        echo "firstname is empty";
        $edit_firstname = $_SESSION["firstname"];
    }
    if (empty($edit_lastname)){
        echo "<br>";
        echo "lastname is empty";
        $edit_lastname = $_SESSION["lastname"];
    }
    if (empty($edit_useraddress)){
        echo "<br>";
        echo "useraddress is empty";
        $edit_useraddress = $_SESSION["useraddress"];
    }
    if (empty($edit_zipcode)){
        echo "<br>";
        echo "zipcode is empty";
        $edit_zipcode = $_SESSION["zipcode"];
    }
    

    $_SESSION["username"] = $edit_username;
    $_SESSION["userpassword"] = $edit_userpassword;
    $_SESSION["firstname"] = $edit_firstname;
    $_SESSION["lastname"] = $edit_lastname;
    $_SESSION["useraddress"] = $edit_useraddress;
    $_SESSION["zipcode"] = $edit_zipcode;

    try {
        //Used to access the database, in which dbh.inc.php has the code for.
        require_once "dbh.inc.php";

        $query = "UPDATE users SET username = '$edit_username', userpassword = '$edit_userpassword',firstname = '$edit_firstname',lastname = '$edit_lastname',useraddress = '$edit_useraddress',zipcode = '$edit_zipcode' WHERE ID = '$ID';";

        $stmt = $pdo->prepare($query);

        $stmt->execute();

        $stmt = null;
        $query = null;

        header("Location: ../profile.php"); //Redirects user the moment it opens up.

        die();
    } catch (PDOException $e) {
        die("Query Failed: " . $e->getMessage());
    }

} else {
    header("Location: ../profile.php");
}