<?php
include_once("include/config.php");

if(session_status() === PHP_SESSION_NONE){
    session_start();
}

$statement=$conn->prepare("DELETE FROM exps where id=" . $_GET['id']);
$statement->execute();
header('location:profile.php');

?>