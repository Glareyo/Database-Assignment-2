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
    <title>Edit Profile</title>
    <link rel="stylesheet" href="css/edit-profile.css">
</head>

<body>
    <div class="profile-container">
        <h1>Enter into your new information</h1>
        <br>
        <br>

        <form class="information-container" action="data/edit-profile-formhandler.php" method="post">
            <button type="submit">Confirm</button>


            <section class="information-section">
                <h3>User Name:</h3>
                <input type="text" id="username" name="username" placeholder=<?php echo $_SESSION["username"] ?>>
            </section>

            <section class="information-section">
                <h3>First Name:</h3>
                <input type="text" id="firstname" name="firstname" placeholder=<?php echo $_SESSION["firstname"] ?>>
            </section>

            <section class="information-section">
                <h3>Last Name:</h3>
                <input type="text" id="lastname" name="lastname" placeholder=<?php echo $_SESSION["lastname"] ?>>
            </section>

            <section class="information-section">
                <h3>Address:</h3>
                <input type="text" id="useraddress" name="useraddress" placeholder=<?php echo $_SESSION["useraddress"] ?>>
            </section>

            <section class="information-section">
                <h3>Zipcode:</h3>
                <input type="text" id="zipcode" name="zipcode" placeholder=<?php echo $_SESSION["zipcode"] ?>>
            </section>

            <section class="information-section">
                <h3>Password:</h3>
                <input type="text" id="userpassword" name="userpassword" placeholder=<?php echo $_SESSION["userpassword"] ?>>
            </section>
        </form>

    </div>
</body>

</html>