<?php

session_start();

if($_SESSION['logged_in'] == TRUE) { 

    unset($_SESSION['logged_in']);
    unset($_SESSION['user_id']);
    unset( $_SESSION['name']);

    session_destroy();

    header('Location: index.php?action=logout_success');
} else {
    header('Location: index.php');
}

?>