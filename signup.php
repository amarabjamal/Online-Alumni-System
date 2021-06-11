<?php
include_once("include/config.php");

session_start();

if(isset($_SESSION['logged_in']) == TRUE) { 

    header('Location: index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="./images/favicon.svg">
    
    <!-- Bootstrap 4.0 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    
    <!--Style css-->
    <link href="styles/login.css" rel="stylesheet">

    <!--Bootsrap icons-->
    <link href="./node_modules/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Font Awesome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

    <title>Sign Up | UM Alumni</title>
</head>
<body>
    <!--Bootstrap js-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <!--Sign Up js-->
    <script src="./scripts/signup.js"></script>

    <section class="Form my-4 mx-5">
        <div class="container">
            <div class="row form-body">
                <div class="col-md-6 login-image">
                    <img src="./images/singup.svg" alt="" width="100%">
                </div>
                <div class="col-md-6 px-5 pt-5">
                    <h1 class="font-weight-bold pb-3">SIGN UP</h1>
                    <hr>
                    <h4>Create your account</h4>
                    <form method="POST" action="process_signup.php">
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="fullname">Full Name</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user-graduate"></i></i></span>
                                        </div>
                                        <input id="fullname" name="full_name" type="text" class="form-control" placeholder="" aria-label="fullname" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-envelope"></i></i></span>
                                        </div>
                                        <input id="email" name="email" type="email" class="form-control" placeholder="" aria-label="email" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                                        </div>
                                        <input id="password" name="password" type="password" class="form-control" placeholder="" aria-label="password" onkeyup="verifyPassword()" required>
                                    </div>
                                    <small id="passwordHelpBlock" class="form-text text-muted"></small>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="cpassword">Confirm Password</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                        </div>
                                        <input id="cpassword" name="rpassword" type="password" class="form-control" placeholder="" aria-label="confirm password" onkeyup="verifyPassword()" required>
                                    </div>
                                    <small id="passwordCheckBlock" class="form-text text-muted"></small>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="classOf">Class of</label>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text"><i class="fas fa-calendar"></i></label>
                                        </div>
                                        <select id="classOf" name="grad_year" class="custom-select" required>
                                            <option value="">Choose...</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="faculty">Faculty</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text"><i class="fas fa-graduation-cap"></i></label>
                                        </div>
                                        <select id="faculty" name="faculty" class="custom-select" required>
                                            <option value="">Choose...</option>
                                            <?php
                                                try {
                                                    $sql = "SELECT * from faculties ORDER BY id ASC";
                                                    $faculties = $conn->query($sql);

                                                    while ($faculty = $faculties->fetch()) {
                                                        echo "<option value=\"".$faculty['id']."\">".$faculty['faculty']."</option>";
                                                    }
                                                        
                                                    $conn = null;
                                                } catch(Exception $e) {
                                                    echo "<script>alert('Error: can't load faculties')</script>";
                                                }
                                                
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>
                            loadAgeSelector();
                        </script>

                        <div class="form-row">
                            <div class="col">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="consent" required>
                                    <label class="form-check-label" for="exampleCheck1">I agree to the Terms &amp; Conditions</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col">
                                <button type="submit" class="btn1 mt-3 mb-5">Create Account</button>
                            </div>
                        </div>
                        <p>Already have an account? <a href="signin.php">Sign In</a></p>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
</html>