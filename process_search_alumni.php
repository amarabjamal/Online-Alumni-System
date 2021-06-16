<?php 

// DATABASE CONNECTION
include_once("include/config.php");

if(session_status() === PHP_SESSION_NONE){
    session_start();
} 

if(isset($_POST['submit'])){
    $full_name = trim($_POST['full_name']);
    $result = $conn->prepare("SELECT id FROM users WHERE full_name=:full_name");
    $result->bindParam(":full_name", $full_name);
    $result->execute();
    if($row = $result->fetch(PDO::FETCH_ASSOC)){
        header('Location: viewprofile.php?id='. $row['id']);
    }else {
        echo 'Oops the person you are looking for is not in Online-Alumni-System';
    }
}


//close connection
$conn = null;
?>