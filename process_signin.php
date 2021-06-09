<?php

include_once("include/config.php");

session_start();

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
    //echo "check 1";
    if ($status === 'alumni') {
        //echo "check 2";
        $sql = "SELECT * FROM users WHERE email = '".$email."' LIMIT 1";
        $result = $conn->query($sql);

        $user = $result->fetch(PDO::FETCH_BOTH);

        if (password_verify($password, $user['password'])) { 
            $_SESSION['logged_in'] = true;
            $_SESSION['id'] = $user['id'];
            $_SESSION['name'] = $user['full_name'];
            //echo "Login success";
            header('location: index.php');
            //header('location: profile.php?action=login_success');
            //exit(0);
        } else {
            //echo "Login failed";
            $errors['login_fail'] = "Wrong username / password";
            header("Location: signin.php?action=login_failed"); //handle wrong password later
        }
    } elseif ($status === 'admin') {
        $sql = "SELECT * FROM admins WHERE email = '".$email."' LIMIT 1";
        $result = $conn->query($sql);

        $admin = $result->fetch(PDO::FETCH_BOTH);

        if (password_verify($password, $admin['password'])) { 
            $_SESSION['logged_in'] = true;
            $_SESSION['id'] = $admin['id'];
            echo "Login success";
            //header('location: profile.php?action=login_success');
            //exit(0);
        } else {
            echo "Login failed";
            $errors['login_fail'] = "Wrong username / password";
            header("Location: signin.php?action=login_failed"); //handle wrong password later
        }
    }
}

?>