<?php 

include_once("include/config.php");

/*<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">*/

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

/* echo $full_name."<br>";
echo $email."<br>";
echo $password."<br>";
echo $grad_year."<br>";
echo gettype($grad_year);
echo $faculty."<br>";
echo gettype($faculty); */

$passwordMatch = checkPassword($password, $rpassword);

if(!$passwordMatch || empty($full_name) || empty($email) || empty($password) || empty($rpassword) || empty($grad_year) || empty($faculty)) {
    if(!$passwordMatch) {
        echo "Passwords didn't match. Try again.<br>";
    }

    if (empty($full_name)) {
        echo "Name field is empty<br>";
    } 

    if (empty($email)) {
        echo "Email field is empty<br>";
    } 

    if (empty($password)) {
        echo "Password field is empty<br>";
    }

    if (empty($rpassword)) {
        echo "Repeat password field is empty<br>";
    } 

    if (empty($grad_year)) {
        echo "Graduation year is not selected<br>";
    } 

    if (empty($faculty)) {
        echo "faculty is not selected<br>";
    } 

} else {
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    echo "check 1";

    $sql = "SELECT * FROM users WHERE email = '".$email."'";
    $result = $conn->query($sql);

    echo "check 2";
    
    if($result->num_rows > 0){

        echo "<h1>Email already exists.</h1><br>";

        echo "<a href=\"signup.php\">Sign Up</a><br><br>";
        echo "<a href=\"signin.php\">Sign In</a>";
    
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

            echo "<h1>Registration successful.</h1><br>";

            echo "<a href=\"signin.php\">Sign In</a>";
        } catch (Exception $e) {
            echo "Registration failed.";
            $conn->rollback();
        }

        $conn = null;

        /* echo "check 3";
        try {
            $stmt = $conn->prepare("INSERT INTO users (full_name, email, password, grad_year, fac_id, status_id) VALUES (?, ?, ?, ?, ?, ?)");
            echo "check 4";
            $stmt->bindParam();
            $stmt->bindParam("sssiii", $full_name, $email, $hashed_password, $grad_year, $faculty, 1);
            echo "check 5";
            $stmt->execute();
            
            echo "<h1>Registration successful.</h1><br>";

            echo "<a href=\"signin.php\">Sign In</a>";
        } catch (PDOException $e) {
            echo "Errro";
            echo "Error :". $e->getMessage();
        }
        
    
        $stmt->close();
        $conn->close(); */
    
    }
}


?>