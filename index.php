<!-- Credit: Dani Krossing -->
<!-- Provided a playlist of php tutorial videos -->
<!-- https://www.youtube.com/watch?v=m52ljs78S24&list=PL0eyrZgxdwhwwQQZA79OzYwl5ewA7HQih -->

<!-- Cameron Cintron -->
<!-- Provided course materials from Application Design -->

<!-- Credit: Bheem Raj-->
<!-- Provided a way to do a password and username error check -->
<!-- https://stackoverflow.com/questions/29024361/php-wrong-username-password-how-to-echo-it-properly -->

<!-- Credit: W3  -->
<!-- Provided documentation of implementating AUTO_INCREMENT through php -->
<!-- https://www.w3schools.com/mysql/mysql_autoincrement.asp -->

<!-- Credit: AlexP -> Provided solution of passing data via button in StackOverflow -->
<!-- https://stackoverflow.com/questions/19814082/passing-a-value-through-button-to-php-function -->

<?
session_abort();
require_once "dbh.inc.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <main>
        <div class="container">
            <form class="sign-up-container">
                <h1>Hello!</h1>
                <h2>Welcome to the Friend's Messaging System!</h2>
                <br>
                <a href="log-in.php">Log In!</a>
                <a href="sign-up.php">Sign Up!</a>
            </form>
        </div>

    </main>
</body>

</html>