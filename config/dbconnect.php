<?php

    //database connection
    $servername = "localhost";
    $username = "aisyah";
    $password = "test1234";

    try {
        // connect with database
        $conn = new PDO("mysql:host=$servername; dbname=alumni_profile", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connected successfully";
    } 
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    //close connection
    $conn = null;

?>