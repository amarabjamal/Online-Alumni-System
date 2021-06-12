<?php

session_start();

if(isset($_SESSION['loggen_in']) && $_SESSION['logged_in'] == TRUE) { 

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

    <!-- Font Awesome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

    <title>Sign In | UM Alumni</title>
</head>
<body>
    <!--Bootstrap js-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <!--Sign In js-->
    <script src="./scripts/signin.js"></script>

    <section class="Form my-4 mx-5">
        <div class="container">
            <div class="row form-body">
                
                <!-- Side Image Area Start -->
                <div class="col-md-6 login-image">
                    <img src="./images/signin.svg" alt="" width="100%">
                </div>

                <!-- Side Image Area End -->

                <!-- Form Area Start -->

                <div class="col-md-6 px-5 pt-5">
                    <h1 class="font-weight-bold pb-3">SIGN IN</h1>
                    <hr>
                    <h4>Login into your account</h4>
                    
                    <?php if(isset($_GET['action']) && $_GET['action'] == 'login_failed') { ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Incorrect username or password.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                    <?php } ?>

                    <?php if(isset($_GET['action']) && $_GET['action'] == 'register_success') { ?>
                        <style>
                            .green {
                                margin-right: 10px;
                                color: green;
                            }

                            .modal-header, .modal-footer {
                                display: flex;
                                justify-content: center;
                            }
                        </style>
                        <!-- Modal -->
                        <div class="modal fade" id="success_message" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle"><i class="green fas fa-check-circle"></i>Success</h5>
                            </div>
                            <div class="modal-body">
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    Your account has been succesfully created. <br>
                                    Please wait for approval to access all the features.
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-success" data-dismiss="modal">Continue</button>
                            </div>
                            </div>
                        </div>
                        </div>

                        <script>
                            $(document).ready(function(){
                                $("#success_message").modal('show');
                            });
                        </script>
                    <?php } ?>

                    <form method="POST" action="process_signin.php">

                        <!--  Email Input Start -->
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <div class="input-group mb-3">
                                        <input id="email" name="email" type="email" class="form-control" aria-label="email" required>
                                        <div class="invalid-feedback">
                                            Email field is empty.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--  Email Input End -->

                        <!--  Password Input Start -->
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <div class="input-group mb-3">
                                        <input id="password" name="password" type="password" name="password" class="form-control" aria-label="password" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <span class="eye" onclick="togglePasswordDisplay()">
                                                    <i id="show" class="fas fa-eye"></i>
                                                    <i id="hide" class="fas fa-eye-slash"></i>
                                                </span>
                                            </span>
                                        </div>
                                        <div class="invalid-feedback">
                                            Password field is empty.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--  Password Input End -->

                        <!--  Status Input Start -->
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <div class="input-group mb-3">
                                        <select id="status" name="status"  class="custom-select" required>
                                            <option value="alumni">Alumni</option>
                                            <option value="admin">Admin</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--  Status Input End -->

                        <div class="form-row">
                            <div class="col">
                                <button type="submit" class="btn1 mt-3 mb-5">Sign In</button>
                            </div>
                        </div>
                        <a href="#" onclick="alert('Function not supported yet.')">Forgot Password?</a>
                        <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
                    </form>
                </div>

                <?php if(isset($_SESSION['email_error']) && $_SESSION['email_error']) { ?>
                        <script>
                            $( "#email" ).addClass( "is-invalid" );
                        </script>
                    <?php   
                        } 
                    ?>

                    <?php if(isset($_SESSION['password_error']) && $_SESSION['password_error']) { ?>
                        <script>
                            $( "#password" ).addClass( "is-invalid" );
                        </script>
                    <?php   
                        } 

                    unset($_SESSION['email_error']);
                    unset($_SESSION['password_error']);

                    session_destroy();
                    ?>

                <!-- Form Area End -->
            </div>
        </div>
    </section>
</body>
</html>