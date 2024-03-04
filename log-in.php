<!-- Credit: Bheem Raj-->
<!-- Provided a way to do a password and username error check -->
<!-- https://stackoverflow.com/questions/29024361/php-wrong-username-password-how-to-echo-it-properly -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log-in</title>
    <link rel="stylesheet" href="css/log-in.css">
</head>
<body>
<main>
        <div class="container">
            <form class="sign-up-container" action="data/log-in-formhandler.php" method="post">
                <h1>Logging In</h1>

                <?php
                if (isset($_GET["msg"]) && $_GET["msg"] == 'failed') {
                echo "
                <p class='wrong-info-popup'>Incorrect Username / Password</p>
                "; 
                }
                ?>

                <div class="input-container">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" placeholder="Enter Username">
                </div>

                <div class="input-container">
                    <label for="userpassword">Password:</label>
                    <input type="text" id="userpassword" name="userpassword" placeholder="Enter Password">
                </div>

                <button type="submit">Log In!</button>
                <a href="index.php" class="back-button">Go Back</a>
            </form>
        </div>

    </main>
</body>
</html>