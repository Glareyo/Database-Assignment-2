<?php
    // if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    //     // Use htmlspecialchars when outputting into the browser.
    //     //$userName = htmlspecialchars($_POST["username"]);
    
    //     $username = $_POST["username"];
    
    //     try{
    //         //Used to access the database, in which dbh.inc.php has the code for.
    //         require_once "data/dbh.inc.php";
    
    //         $query = "SELECT * FROM users WHERE username = ?;";
    
    //         $stmt = $pdo->prepare($query);
    
    //         $stmt->execute([$username]);

    //         $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    //         $pdo = null;
    //         $stmt = null;
    
    //         die();
    //     } catch(PDOException $e) {
    //         die("Query Failed: " . $e->getMessage());
    //     }
    
    // }
    // else {
    //     header("Location: ../index.php");
    // }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="css/profile.css">
</head>

<body>
    <div class="profile-container">
        <h1>Hello USERNAME</h1>
        <br>
        <button>Edit</button>
        <br>

        <div class="information-container">
            <section class="information-section">
                <h3>First Name:</h3>
                <p> </p>
            </section>
    
            <section class="information-section">
                <h3>Last Name:</h3>
                <p>Name</p>
            </section>
    
            <section class="information-section">
                <h3>Address:</h3>
                <p>1234 Cedar St. Unit 2B</p>
            </section>
    
            <section class="information-section">
                <h3>Zipcode:</h3>
                <p>123456</p>
            </section>
        </div>

    </div>
</body>

</html>