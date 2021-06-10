<?php

session_start();

if($_SESSION['logged_in'] == TRUE && $_SESSION['role'] == 'user') { 

    unset($_SESSION['logged_in']);
    unset($_SESSION['user_id']);
    unset( $_SESSION['name']);
    unset($_SESSION['role']);
    unset($_SESSION['status']);

    session_destroy();

    header('Location: index.php?action=logout_success');
} elseif ($_SESSION['logged_in'] == TRUE && $_SESSION['role'] == 'admin') {
    unset($_SESSION['logged_in']);
    unset($_SESSION['admin_id']);
    unset( $_SESSION['name']);
    unset($_SESSION['role']);

    session_destroy();

    header('Location: index.php?action=logout_success');
} else {
    header('Location: index.php');
}

?>