<?php 

include_once("include/config.php");

session_start();

if(isset($_SESSION['logged_in']) == TRUE) { 

    header('Location: index.php');
}

function prepare_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function checkPassword($pwd1, $pwd2) {
    return $pwd1 === $pwd2;
}
    
$full_name = prepare_input($_POST["full_name"]);
$email = prepare_input($_POST["email"]);
$password = $_POST['password'];
$rpassword = $_POST['rpassword'];
$grad_year = (int)$_POST["grad_year"];
$faculty = (int)$_POST["faculty"];

$passwordMatch = checkPassword($password, $rpassword);

if(!$passwordMatch || empty($full_name) || empty($email) || empty($password) || empty($rpassword) || empty($grad_year) || empty($faculty)) {
    if(!$passwordMatch) {
        $_SESSION['password_mismatch'] = TRUE;
    }

    if (empty($full_name)) {
        //echo "Name field is empty<br>";
        $_SESSION['name_error'] = TRUE;
    } 

    if (empty($email)) {
        //echo "Email field is empty<br>";
        $_SESSION['email_error'] = TRUE;
    } 

    if (empty($password)) {
        //echo "Password field is empty<br>";
        $_SESSION['password_error'] = TRUE;
    }

    if (empty($rpassword)) {
        //echo "Repeat password field is empty<br>";
        $_SESSION['rpassword_error'] = TRUE;
    } 

    if (empty($grad_year)) {
        //echo "Graduation year is not selected<br>";
        $_SESSION['grad_year_error'] = TRUE;
    } 

    if (empty($faculty)) {
        //echo "faculty is not selected<br>";
        $_SESSION['faculty_error'] = TRUE;
    } 

    header("Location: signup.php");
    exit(0);

} else {
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "SELECT * FROM users WHERE email = '".$email."'";
    $result = $conn->query($sql);
    
    if($result->rowCount() > 0){

        header("Location: signup.php?action=email_exist");
        exit(0);
    }else{
        try {
            // begin a transaction
            $conn->beginTransaction();
            // a set of queries: if one fails, an exception will be thrown
            $sql = "INSERT INTO users (full_name, email, password, grad_year, fac_id, status_id) VALUES('$full_name', '$email', '$hashed_password', '$grad_year', '$faculty', '1')";
            $conn->query($sql);
            // if we arrive here, it means that no exception was thrown
            // which means no query has failed, so we can commit the
            // transaction
            $conn->commit();

            header("Location: signin.php?action=register_success");
            exit(0);
        } catch (Exception $e) {
            $conn->rollback();
        }

        $conn = null;
    
    }
}


?>