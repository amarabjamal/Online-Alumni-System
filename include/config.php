<?php

$host = "localhost";
$db_name = "alumni_profile";
$username = "aisyah";
$password = "test1234";

try{
    $conn = new PDO("mysql:host=" . $host . ";dbname=" . $db_name, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Successfully connected to database";
}catch(PDOException $exception){
    echo "Connection error: " . $exception->getMessage();
    die();
}

//echo "Successfully connected to database";

?>