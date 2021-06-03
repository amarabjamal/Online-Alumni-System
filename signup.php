<?php

/*<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">*/

$fullname = $email = $password = $cpassword = $faculty = "";
$classOf;

$nameErr = $emailErr = $genderErr = $websiteErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["fullname"])) {
        $nameErr = "Name is required";
    } 
    else {
    $fullname = test_input($_POST["fullname"]);
    }

    if (empty($_POST["email"])) {
    $emailErr = "Email is required";
    } 
    else {
    $email = test_input($_POST["email"]);
    }

    if (empty($_POST["password"])) {
    $passwordErr = "";
    } 
    else {
    $password = test_input($_POST["password"]);
    }

    if (empty($_POST["cpassword"])) {
    $cpasswordErr = "";
    } 
    else {
    $cpassword = test_input($_POST["cpassword"]);
    }

    if (empty($_POST["classOf"])) {
    $classOfErr = "";
    } 
    else {
    $classOf = test_input($_POST["classOf"]);
    }

    if (empty($_POST["faculty"])) {
    $facultyErr = "";
    } 
    else {
    $faculty = test_input($_POST["faculty"]);
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>