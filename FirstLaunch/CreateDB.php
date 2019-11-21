<?php
    function connect(){
        $host = "127.0.0.1:3306";
        $username = "root";
        $password = "";
        $db = "webdev";
        $conn = mysqli_connect($host, $username, $password);
        $serverLink = mysqli_connect($host, $username, $password, $db);
        if($serverLink == false){
            $sql = "CREATE DATABASE $db";
            if ($conn->query($sql) === TRUE) {
            echo "Database created successfully";
            } else {
            echo "Error creating database: " . mysqli_error($conn);
            }    
        }else{
            echo "Connection to database established\r\n";
        }
        return $serverLink;
    }
    function createtb(){
        $host = "127.0.0.1:3306";
        $username = "root";
        $password = "";
        $db = "webdev";
        $serverLink = mysqli_connect($host, $username, $password, $db);
        if($serverLink == true){
            $sql = "CREATE TABLE users (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            avatar VARCHAR(500) NOT NULL,
            email VARCHAR(100) NOT NULL,
            pass VARCHAR(100) NOT NULL,
            name VARCHAR(100) NOT NULL,
            birth VARCHAR(500) NOT NULL,
            gender VARCHAR(500) NOT NULL,
            
            reg_date TIMESTAMP
            update_date TIMESTAMP
            )";
            if ($serverLink->query($sql) === TRUE) {
                echo "Table users created successfully";
            } else {
                echo "Error creating table: " . $serverLink->error;
            }
        } else {
            echo "Error: ". $serverLink->error;
        }
    }
    function createtbsongs(){
        $host = "127.0.0.1:3306";
        $username = "root";
        $password = "";
        $db = "webdev";
        $serverLink = mysqli_connect($host, $username, $password, $db);
        if($serverLink == true){
            $sql = "CREATE TABLE songs (
            id INT(255) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            uploaded_by INT(255) NOT NULL, 
            songname VARCHAR(50) NOT NULL,
            image VARCHAR(300) NOT NULL,
            author VARCHAR(50) NOT NULL,
            genre VARCHAR(20) NOT NULL,
            description VARCHAR(600) NOT NULL,
            upload VARCHAR(300) NOT NULL,
            upload_date TIMESTAMP
            )";
            if ($serverLink->query($sql) === TRUE) {
                echo "Table songs created successfully";
            } else {
                echo "Error creating table: " . $serverLink->error;
            }
        } else {
            echo "Error: ". $serverLink->error;
        }
    }
    function createtbplaylist(){
        $host = "127.0.0.1:3306";
        $username = "root";
        $password = "";
        $db = "webdev";
        $serverLink = mysqli_connect($host, $username, $password, $db);
        if($serverLink == true){
            $sql = "CREATE TABLE playlist (
            id INT(255) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(50) NOT NULL, 
            image VARCHAR(300) NOT NULL,
            author VARCHAR(50) NOT NULL,
            genre VARCHAR(20) NOT NULL,
            description VARCHAR(600) NOT NULL,
            creation_date TIMESTAMP
            )";
            if ($serverLink->query($sql) === TRUE) {
                echo "Table playlist created successfully";
            } else {
                echo "Error creating table: " . $serverLink->error;
            }
        } else {
            echo "Error: ". $serverLink->error;
        }
    }
    function createtbchat(){
        $host = "127.0.0.1:3306";
        $username = "root";
        $password = "";
        $db = "webdev";
        $serverLink = mysqli_connect($host, $username, $password, $db);
        if($serverLink == true){
            $sql = "CREATE TABLE chat (
            id INT(255) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
            name varchar(50) NOT NULL,
            text text NOT NULL,
            creation_date TIMESTAMP
            )";
            if ($serverLink->query($sql) === TRUE) {
                echo "Table chat created successfully";
            } else {
                echo "Error creating table: " . $serverLink->error;
            }
        } else {
            echo "Error: ". $serverLink->error;
        }
    }
    function createtbadministration(){
        $host = "127.0.0.1:3306";
        $username = "root";
        $password = "";
        $db = "webdev";
        $serverLink = mysqli_connect($host, $username, $password, $db);
        if($serverLink == true){
            $sql = "CREATE TABLE administration (
            id INT(255) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
            iduser int(255) NOT NULL,
            isadmin boolean NOT NULL,
            ismod boolean NOT NULL,
            creation_date TIMESTAMP
            )";
            if ($serverLink->query($sql) === TRUE) {
                echo "Table administration created successfully";
            } else {
                echo "Error creating table: " . $serverLink->error;
            }
        } else {
            echo "Error: ". $serverLink->error;
        }
    }
    
?>

<html>
    <h2>Checking if Database exists...</h2><h2><?php connect(); ?></h2>
    <h2>Creating user table...</h2></h2><h2><?php createtb(); ?></h2>
    <h2>Creating songs table...</h2></h2><h2><?php createtbsongs(); ?></h2>
    <h2>Creating playlist table...</h2></h2><h2><?php createtbplaylist(); ?></h2>
    <h2>Creating chat table...</h2></h2><h2><?php createtbchat(); ?></h2>
    <h2>Creating administration table...</h2></h2><h2><?php createtbadministration(); ?></h2>
</html>