<!-- Credit: Dani Krossing -->
<!-- https://www.youtube.com/watch?v=tHKsZdS8Oug&list=PL0eyrZgxdwhwwQQZA79OzYwl5ewA7HQih&index=20 -->

<!-- Credit: W3  -->
<!-- Provided documentation of implementating AUTO_INCREMENT through php -->
<!-- https://www.w3schools.com/mysql/mysql_autoincrement.asp -->

<?php

$dsn = "mysql:host=localhost;dbname=database2hw_db"; //Target Database
$dbusername = "root"; //Target user name
$dbpassword = ""; //Target Password

//Designed to catch program in case of error
try {
    $pdo = new PDO($dsn, $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    try {

        // Create the entire database if it doesn't exist

        $dsn = "mysql:host=localhost;"; //Target Database
        $dbusername = "root"; //Target user name
        $dbpassword = ""; //Target Password

        $pdo = new PDO($dsn, $dbusername, $dbpassword);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "CREATE DATABASE database2hw_db;
        USE database2hw_db;

        CREATE TABLE users (
            id INT(3) NOT NULL AUTO_INCREMENT,
            username varchar(255),
            userpassword varchar(255),
            firstname varchar(255),
            lastname varchar(255),
            useraddress varchar(255),
            zipcode INT(5),
            PRIMARY KEY (ID)
        );

        CREATE TABLE friends (
            user_id INT(3) NOT NULL,
            friend_id INT(3) NOT NULL,
            FOREIGN KEY (user_id) REFERENCES users(id),
	    	FOREIGN KEY (friend_id) REFERENCES users(id)
        );
        ";

        $stmt = $pdo->prepare($query);

        $stmt->execute();

        $query = null;
        $stmt = null;
        $pdo = null;
        $dsn = null;

        $dsn = "mysql:host=localhost;dbname=database2hw_db"; //Target Database

        $pdo = new PDO($dsn, $dbusername, $dbpassword);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "INSERT INTO users (username,userpassword,firstname,lastname,useraddress,zipcode) VALUES
        ('MrAdams','AdamIsAwesome','Adam','Western','1234 Mt Oriel',37093);

        INSERT INTO users (username,userpassword,firstname,lastname,useraddress,zipcode) VALUES
        ('TheMysteriousTrader','MysteriouslyTrading','Mystery','Fedora','unknown',50293);
        
        INSERT INTO users (username,userpassword,firstname,lastname,useraddress,zipcode) VALUES
        ('Cpt.Pickles','UnderTheSea','Pickles','Andrew','342 W Cedar',50394);
        ";

        $stmt = $pdo->prepare($query);

        $stmt->execute();


    } catch (PDOException $e) {
        //Print Error to screeen in case of failure.
        echo "connection failed" . $e->getMessage();
    }
}