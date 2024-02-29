<!-- Credit: Dani Krossing -->
<!-- https://www.youtube.com/watch?v=tHKsZdS8Oug&list=PL0eyrZgxdwhwwQQZA79OzYwl5ewA7HQih&index=20 -->
<?php

$dsn = "mysql:host=localhost;dbname=databasehw2_db"; //Target Database
$dbusername = "root"; //Target user name
$dbpassword = ""; //Target Password

//Designed to catch program in case of error
try{
    $pdo = new PDO($dsn,$dbusername,$dbpassword);
    $pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    //Print Error to screeen in case of failure.
    echo "connection failed". $e->getMessage();
}