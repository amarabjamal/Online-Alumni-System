<?php

$host = "localhost";
$db_name = "alumni_system";
$username = "alumni_access";
$password = "yThZyu3a9lFqBfDz";

try{
    $conn = new PDO("mysql:host=" . $host . ";dbname=" . $db_name, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Successfully connected to database";
}catch(PDOException $exception){
    echo "Connection error: " . $exception->getMessage();
    die();
}

?>