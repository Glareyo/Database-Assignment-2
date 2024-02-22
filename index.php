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
            <form class="sign-up-container" action="data/account.php" method="post">
                <h1>Hello!</h1>

                <div class="input-container">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" placeholder="Enter Username">
                </div>

                <div class="input-container">
                    <label for="firstname">First Name:</label>
                    <input type="text" id="firstname" name="firstname" placeholder="Enter First Name">
                </div>


                <div class="input-container">
                    <label for="lastname">Last Name:</label>
                    <input type="text" id="lastname" name="lastname" placeholder="Enter Last Name">
                </div>


                <div class="input-container">
                    <label for="address">Address:</label>
                    <input type="text" id="address" name="address" placeholder="Enter Address">
                </div>


                <div class="input-container">
                    <label for="zipcode">Zipcode:</label>
                    <input type="text" id="zipcode" name="zipcode" placeholder="Enter ZipCode">
                </div>



                <button type="submit">Sign Up!</button>
            </form>
        </div>

    </main>
</body>

</html>