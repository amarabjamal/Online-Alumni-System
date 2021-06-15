<?php

include_once("include/config.php");

session_start();

if($_SESSION['logged_in'] == TRUE) { 

    $session_id = session_id();
    header("Location: index.php?session_id=". $session_id );
    // header('Location: index.php');
}

$email = $_POST['email'];
$password = $_POST['password'];
$status = $_POST['status'];
$errors = [];

if(empty($email) || empty($password) || empty($status)) {
    if (empty($email)) {
        echo 'Email field is empty.';
        $errors['email'] = 'Email field is empty.';
    }
    if (empty($password)) {
        echo 'Password field is empty.';
        $errors['password'] = 'Password field is empty.';
    }
    if (empty($status)) {
        echo 'Please select your status';
        $errors['status'] = 'Please select your status';
    }
} 
else {
    if ($status === 'alumni') {
        $sql = "SELECT * FROM users WHERE email = '".$email."' LIMIT 1";
        $result = $conn->query($sql);

        $user = $result->fetch(PDO::FETCH_BOTH);

        if (password_verify($password, $user['password'])) { 
            $_SESSION['logged_in'] = true;
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['name'] = $user['full_name'];
            $_SESSION['role'] = "user";
            $_SESSION['status'] = $user['status_id'];
            //echo "Login success";
            header('location: index.php?action=login_success');
            exit(0);
        } else {
            header("Location: signin.php?action=login_failed"); 
        }
    } elseif ($status === 'admin') {
        $sql = "SELECT * FROM admins WHERE email = '".$email."' LIMIT 1";
        $result = $conn->query($sql);

        $admin = $result->fetch(PDO::FETCH_BOTH);

        if (password_verify($password, $admin['password'])) { 
            $_SESSION['logged_in'] = true;
            $_SESSION['admin_id'] = $admin['id'];
            $_SESSION['name'] = $admin['name'];
            $_SESSION['role'] = "admin";
            header('location: pending.php?action=login_success');
            exit(0);
        } else {
            header("Location: pending.php?action=login_failed");
        }
    }
}

?>