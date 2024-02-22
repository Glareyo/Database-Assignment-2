<?php

//var_dump($_SERVER["REQUEST_METHOD"]);

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $userName = htmlspecialchars($_POST["username"]); //Changes data to be html entities, blocking actual code from going through.
    $firstName = htmlspecialchars($_POST["firstname"]);
    $lastName = htmlspecialchars($_POST["lastname"]);

    if (empty($firstName) || empty($lastName)){
        header("Location: ../index.php"); //Redirects user the moment it opens up.
        exit();
    }

    echo"Data Entered:";
    echo"<br>";
    echo"<br>";
    echo $userName;
    echo"<br>";
    echo $firstName;
    echo"<br>";
    echo $lastName;

    header("Location: ../signed-up/signed-up.php"); //Redirects user the moment it opens up.
}
else{
    header("Location: ../index.php"); //Redirects user the moment it opens up.
}