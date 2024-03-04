<!-- Credit: Dani Krossing -->
<!-- Provided playlist tutorial on PHP -->

<!-- Credit: AlexP -> Provided solution of passing data via button in StackOverflow -->
<!-- https://stackoverflow.com/questions/19814082/passing-a-value-through-button-to-php-function -->

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
        <a href="index.php"><button>Log Out</button></a>
        <a href="edit-profile.php"><button>Edit</button></a>
        <br>
        <form action="data/delete-account-formhandler.php" method="post">
            <button id="delete-account-button">DELETE ACCOUNT</button>
        </form>
        <br>
        <br>

        <div class="information-container">
            <section class="information-section">
                <h3>User Name:</h3>
                <p>
                    <?php echo $_SESSION["username"] ?>
                </p>
            </section>

            <section class="information-section">
                <h3>First Name:</h3>
                <p>
                    <?php echo $_SESSION["firstname"] ?>
                </p>
            </section>

            <section class="information-section">
                <h3>Last Name:</h3>
                <p>
                    <?php echo $_SESSION["lastname"] ?>
                </p>
            </section>

            <section class="information-section">
                <h3>Address:</h3>
                <p>
                    <?php echo $_SESSION["useraddress"] ?>
                </p>
            </section>

            <section class="information-section">
                <h3>Zipcode:</h3>
                <p>
                    <?php echo $_SESSION["zipcode"] ?>
                </p>
            </section>
        </div>

        <br>


        <br>
        <h3>Other Users</h3>
        <br>
        <div class="people-container">
            <div class="people-container">
                <?php
                //Get all other users
                try {
                    //Used to access the database, in which dbh.inc.php has the code for.
                    require_once "data/dbh.inc.php";


                    $currentID = $_SESSION["id"];
                    $friendsQuery = "SELECT * FROM `friends` WHERE user_id=$currentID;";
                    $allUsersQuery = "SELECT id,username FROM users WHERE id !=$currentID";

                    $stmt1 = null;
                    $stmt1 = $pdo->prepare($friendsQuery);
                    $stmt1->execute();

                    $stmt2 = null;
                    $stmt2 = $pdo->prepare($allUsersQuery);
                    $stmt2->execute();

                    // Get all results
                    $friendsResults = null;
                    $friendsResults = $stmt1->fetchAll(PDO::FETCH_ASSOC);

                    $allUsersResults = null;
                    $allUsersResults = $stmt2->fetchAll(PDO::FETCH_ASSOC);

                    //Run through each line in which the current user has friends\
                    // current user | 4
                    // current user | 2
                    foreach ($allUsersResults as $usersRow) {
                        $isFriend = false;
                        // Compare to friends id
                        foreach ($friendsResults as $friend) {
                            if ($usersRow["id"] == $friend["friend_id"]) {
                                $isFriend = true;
                                echo "
                                <div class='information-container'>
                                      <section class='information-section'>
                                         <p>" . $usersRow["username"] . "</p>
                                         <form action='data/remove-friend-formhandler.php' method='post'>
                                                <button class='remove-friend-button'>Remove Friend</button>
                                                <input type='hidden' name='target_id' value=" . $usersRow['id'] . "/>
                                          </form>
                                        </section>
                                 </div>";
                            }
                        }
                        if (!$isFriend) {
                            echo "
                                <div class='information-container'>
                                      <section class='information-section'>
                                         <p>" . $usersRow["username"] . "</p>
                                            <form action='data/add-friend-formhandler.php' method='post'>
                                                <button class='add-friend-button'>Add Friend</button>
                                                <input type='hidden' name='target_id' value=" . $usersRow['id'] . "/>
                                            </form>
                                        </section>
                                 </div>";
                        }
                    }
                } catch (PDOException $e) {
                    die("Query Failed: " . $e->getMessage());
                }
                ?>

            </div>
        </div>
    </div>
</body>

</html>