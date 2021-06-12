<?php

//database connection
include_once("include/config.php");

if(session_status() === PHP_SESSION_NONE){
    session_start();
} 

$id = $_GET['id'];
$result = $conn->prepare("SELECT * FROM users WHERE id =:id");
$result->bindParam(":id",$id);
$result->execute();
$row = $result->fetch(PDO::FETCH_ASSOC);

// //$faculty = $conn->prepare("SELECT faculty.FacName , user.FacultyID FROM faculty , user  WHERE fac.FacID = us.FacID");
// //$faculty = $conn->prepare("SELECT faculty. * , user. * FROM faculty,user WHERE faculty.FacID = user.FacID");
// $faculty = $conn->prepare("SELECT faculty.FacID, faculty.FacName, user.UserID FROM user INNER JOIN faculty ON faculty.FacID= user.FacID");
// $faculty->execute();
// $f = $faculty->fetch(PDO::FETCH_ASSOC);
// $f['UserID'] = $id;
// print_r($f);

//close connection
$conn = null;
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Alumni | UM Alumni </title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- font awesome icons -->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet"
        type='text/css'>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/profile.css">
</head>

<body>
    <!-- Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

    <!-- ===================================== Start Header Area ===================================== -->
    <?php include_once("navigation.php"); ?>
    <!-- ===================================== End Header Area ===================================== -->



    <div class="row profile-card">
        <p class="back">
            <img src="images/arrow-left-short.svg" alt="go back" width="30px" height="30px" style="margin: auto;">
            <a href="alumni.php">back</a>
        </p>

        <div class="col-md-4 right-pane">

            <div class="row p1">
                <div class="avatar">
                    <img src="images/avatar.png" alt="profile-picture">
                </div>

                <div class="socmed">
                    <a href="https://www.facebook.com/login/web/"><i
                            class="fa fa-facebook-official fa-2x bg-transparent"></i></a>
                    <a href="https://github.com/login"><i class="fa fa-github-square fa-2x bg-transparent"></i></a>
                    <a href="https://www.linkedin.com/uas/login"><i
                            class="fa fa-linkedin-square fa-2x bg-transparent"></i></a>
                </div>
            </div>

            <div class="row p2">
                <div class="details">
                    <h2><?php echo htmlspecialchars($row['full_name']); ?></h2>
                    <p class="about-me">About Me</p>
                    <p><?php echo htmlspecialchars($f['faculty']); ?></p>
                    <p><?php echo htmlspecialchars($row['grad_year']); ?></p>
                    <p>Phone Number</p>
                </div>
            </div>
        </div>
        <div class="col-md-8 left-pane">
            <h1 class="title">Experience</h1>
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title">Current</h5>
                    <p class="card-text">Working at Starbucks</p>

                    <h5 class="card-title">Past</h5>

                    <div class="timeline-items">
                        <div class="timeline-item">
                            <div class="timeline-dot"></div>
                            <div class="timeline-date">2020 - 2021</div>
                            <div class="mb-2 timeline-content">
                                <h3>Junior Developer</h3>
                                <p>Telekom Malaysia</p>
                            </div>
                        </div>
                    </div>

                    <div class="timeline-items">
                        <div class="timeline-item">
                            <div class="timeline-dot"></div>
                            <div class="timeline-date">2019 - 2020</div>
                            <div class="timeline-content">
                                <h3>Intern</h3>
                                <p>DahMakan</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <h1 class="title" style="margin-top:20px;">University Project</h1>
            <div class="card project-float shadow">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <div class="card-body">
                            <p class="card-subtitle mb-2 text-muted">Year</p>
                            <h4 class="card-title">Project Title</h4>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <span class="badge badge-pill" style="background-color: #b8e994;">skill0</span>
                            <span class="badge badge-pill" style="background-color: #fab1a0;">skill1</span>
                            <span class="badge badge-pill" style="background-color: #ffeaa7;">skill2</span>
                            <span class="badge badge-pill" style="background-color: #7ed6df;">skill3</span>

                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed
                                venenatis consectetur
                                ligula, in
                                tincidunt mi dapibus consequat. In faucibus sapien.</p>

                        </div>
                    </div>
                </div>
            </div>

            <div class="card project-float shadow">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <div class="card-body">
                            <p class="card-subtitle mb-2 text-muted">Year</p>
                            <h4 class="card-title">Project Title</h4>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <span class="badge badge-pill" style="background-color: #b8e994;">skill0</span>
                            <span class="badge badge-pill" style="background-color: #fab1a0;">skill1</span>
                            <span class="badge badge-pill" style="background-color: #ffeaa7;">skill2</span>
                            <span class="badge badge-pill" style="background-color: #7ed6df;">skill3</span>

                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed
                                venenatis consectetur
                                ligula, in
                                tincidunt mi dapibus consequat. In faucibus sapien.</p>

                        </div>
                    </div>
                </div>
            </div>

            <div class="card project-float shadow">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <div class="card-body">
                            <p class="card-subtitle mb-2 text-muted">Year</p>
                            <h4 class="card-title">Project Title</h4>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <span class="badge badge-pill" style="background-color: #b8e994;">skill0</span>
                            <span class="badge badge-pill" style="background-color: #fab1a0;">skill1</span>
                            <span class="badge badge-pill" style="background-color: #ffeaa7;">skill2</span>
                            <span class="badge badge-pill" style="background-color: #7ed6df;">skill3</span>

                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed
                                venenatis consectetur
                                ligula, in
                                tincidunt mi dapibus consequat. In faucibus sapien.</p>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- ===================================== Start Footer Area ===================================== -->

    <footer id="footer" class="mt-auto">
        <div class="footer-link-section">
            <div class="container">
                <div class="row justify-content-left">
                    <div class="col-sm-6 col-md-4 item">
                        <h3>Contact</h3>
                        <ul>
                            <li><a href="#">Find Us</a></li>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">Help</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-md-4 item">
                        <h3>Links</h3>
                        <ul>
                            <li><a href="#">About UM</a></li>
                            <li><a href="#">Study @ UM</a></li>
                            <li><a href="#">General Enquiry</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-md-4 item">
                        <h3>Follow Us</h3>
                        <ul>
                            <li><a href="#">Facebook</a></li>
                            <li><a href="#">Instagram</a></li>
                            <li><a href="#">Twitter</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Copyrights -->
        <div class="copyright py-4">
            <div class="container text-center">
                <p class="mb-0 py-2">&copy;
                    <script>document.write(new Date().getFullYear())</script> UM Alumni All rights reserved.
                </p>
            </div>
        </div>
    </footer>

    <!-- ===================================== End Footer Area ===================================== -->

</body>

</html>