<!-- Credit: Dani Krossing -->
<!-- Provided playlist tutorial on PHP -->

<?php
session_start();
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
        <a href="edit-profile.php"><button>Edit</button></a>
        <br>

        <div class="information-container">
        <section class="information-section">
                <h3>User Name:</h3>
                <p><?php echo $_SESSION["username"]?></p>
            </section>

            <section class="information-section">
                <h3>First Name:</h3>
                <p><?php echo $_SESSION["firstname"]?></p>
            </section>
    
            <section class="information-section">
                <h3>Last Name:</h3>
                <p><?php echo $_SESSION["lastname"]?></p>
            </section>
    
            <section class="information-section">
                <h3>Address:</h3>
                <p><?php echo $_SESSION["useraddress"]?></p>
            </section>
    
            <section class="information-section">
                <h3>Zipcode:</h3>
                <p><?php echo $_SESSION["zipcode"]?></p>
            </section>
        </div>

    </div>
</body>

</html>