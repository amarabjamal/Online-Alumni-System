<?php

if(session_status() === PHP_SESSION_NONE) session_start();

include("include/config.php");

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="./images/favicon.svg">
        
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        
        <link href="styles/style.css" rel="stylesheet">

        <!-- Owl Carousel -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">

        <!-- Custom Alert  -->
        <link rel="stylesheet" href="styles/custom_alert.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>

        <title>UM Alumni</title>
    </head>
<body>
    <!--Bootstrap js-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <!--Bootsrap icons-->
    <link href="./node_modules/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!--jquery-->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    
    <!--OwlCarousel-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    
    <!-- Display message for successful logout -->
    <?php if(isset($_GET['action']) && $_GET['action'] == 'logout_success' &&  !isset($_SESSION['logged_in'])) { ?>

    <div class="alert_v1 show">

        <span class="fas fa-exclamation-circle"></span>
        <span class="msg">Logged out successfully!</span>
        <div class="close-btn">
            <span class="fas fa-times"></span>
        </div>
    </div>

    <script>

    setTimeout(function(){
        $('.alert_v1').removeClass("show");
        $('.alert_v1').addClass("hide");
    },3000);
    

    $('.close-btn').click(function(){
    $('.alert_v1').removeClass("show");
    $('.alert_v1').addClass("hide");
    });
        
    </script>
    <?php } ?>

    <!-- Display message for successful login -->
    <?php if(isset($_GET['action']) && $_GET['action'] == 'login_success' && $_SESSION['logged_in'] == TRUE && isset($_SESSION['logged_in'])) { ?>

        <div class="alert_v1 show">

        <span class="fas fa-exclamation-circle"></span>
        <span class="msg">Logged in successfully!</span>
        <div class="close-btn">
            <span class="fas fa-times"></span>
        </div>
    </div>

    <script>

    setTimeout(function(){
        $('.alert_v1').removeClass("show");
        $('.alert_v1').addClass("hide");
    },3000);
    

    $('.close-btn').click(function(){
    $('.alert_v1').removeClass("show");
    $('.alert_v1').addClass("hide");
    });
        
    </script>
    <?php } ?>
    
    <!-- ===================================== Start Header Area ===================================== -->
    <?php include_once("navigation.php"); ?>
    <!-- ===================================== End Header Area ===================================== -->
    
    <i onclick="topFunction()" id="myBtn" class="bi bi-arrow-up-circle-fill"></i>
    <script>
        //Get the button:
        mybutton = document.getElementById("myBtn");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {scrollFunction()};

        function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
        document.body.scrollTop = 0; // For Safari
        document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
        }
    </script>

    <!-- ===================================== Start Main Area ===================================== -->

    <main class="flex-shrink-0">
        <!-- ================================= Start Landing Area ================================= -->
        
        <section class="landing-page">
            <div class="container">

                <div class="landing-content">
                    <?php
                        if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== TRUE) { 
                    ?>
                    <h1>Welcome, UM Alumni!</h1>

                    <p class="landing-desc">
                        Interact with other alumni, find a job oppurtunity and get the latest news &amp; events!
                        <br><br>
                        <strong>Expand your <span class="highlight">network</span>. Grow your <span class="highlight">career</span>.</strong>
                    </p>

                    <a href="signup.php">
                        <button type="button" class="landing-btn-2">Join Now</button>
                    </a>
                    <?php } else {?>
                    <h1>Hello, <?php echo $_SESSION['name']; ?>!</h1>

                    <p class="landing-desc">
                        Interact with other alumni, find a job oppurtunity and get the latest news &amp; events!
                        <br><br>
                        <strong>Expand your <span class="highlight">network</span>. Grow your <span class="highlight">career</span>.</strong>
                    </p>
                    
                    <?php 
                        if (isset($_SESSION['status']) && $_SESSION['status'] == 1) { ?>
                                <div class="alert alert-info" role="alert">
                                    Your account is pending approval. Kindly wait for admin to review your account.
                                </div>
                    <?php } elseif (isset($_SESSION['status']) && $_SESSION['status'] == 3) { ?>
                                <div class="alert alert-danger" role="alert">
                                    Your account is denied approval.
                                </div>
                    <?php }?>
                    <?php }?>

                </div>
                
            </div>
        </section>

        <!-- ================================= End Landing Area ================================= -->
        
        <!-- ================================= Start About Us Area ================================= -->

        <section id="about-us" class="about-us">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <img src="./images/about-us.svg" alt="connected" class="img-fluid mt-3 about-us-img">
                    </div>
                    <div class="col-lg-6">
                        <h2 class="pt-3">About Us</h2>
                        <p>
                            UM Alumni is platform to gather UM graduates from across the globe. This platform is materialized by a group of students from FSKTM, UM.
                            <div class="row">
                                <div class="col function-col">
                                    <h3>Register &amp; login</h3>
                                    <span class="tooltiptext">Let's explore</span>
                                </div>
                                <div class="col function-col">
                                    <h3>Manage profile </h3>
                                    <span class="tooltiptext">Show your best work</span>
                                </div>
                                <div class="col function-col">
                                    <h3>Job advertisement</h3>
                                    <span class="tooltiptext">New oppurtunity</span>
                                </div>
                                <div class="col function-col">
                                    <h3>Alumni</h3>
                                    <span class="tooltiptext">Know new people</span>
                                </div>
                            </div>
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- ================================= End About US Area ================================= -->

        <!-- ================================= Start Upcoming Events Area ================================= -->

        <section id="upcoming-events" class="upcoming-events">
            <div class="container">
                <h2>Upcoming Events</h2>
                <div class="row">

                    <?php 

                    try {
                        $query = "SELECT * FROM events, venues
                                WHERE events.venue_id = venues.id
                                ORDER BY events.id DESC 
                                LIMIT 3";

                        $stmt = $conn->query($query);

                        if($stmt != 0) {

                            while($res = $stmt->fetch()) { 
                                echo "<div class=\"col-md-4\">";
                                echo    "<div class=\"card event-card\">";
                                echo        "<img src=\"".$res['image_url']."\" class=\"event-img\">";
                                echo        "<div class=\"card-body\">";
                                echo            "<h5 class=\"event-title\">".$res['name']."</h5>";    
                                echo            "<button type=\"button\" class=\"event-btn\" data-toggle=\"modal\" data-target=\"#event_".$res[0]."\">View Details</button>";
                                echo    "</div></div></div>";

                                //Modal To view event's details

                                echo "<div class=\"modal fade\" id=\"event_".$res[0]."\" tabindex=\"-1\">";
                                echo "<div class=\"modal-dialog\" role=\"document\">";
                                echo    "<div class=\"modal-content\">";
                                echo    "<div class=\"modal-header\">";
                                echo        "<h5 class=\"modal-title\">".$res['name']."</h5>";
                                echo    "<button type=\"button\" class=\"close\" data-dismiss=\"modal\">";
                                echo    "<span>&times;</span>";
                                echo    "</button>";
                                echo "</div>";
                                echo "<div class=\"modal-body\">";
                                echo    "<div class=\"modal_content\">";
                                echo        "<div class=\"image_details\">";
                                echo        "<img src=\"".$res['image_url']."\">";
                                echo        "<div class=\"details\">";
                                echo            "Start at:<br> ".$res['start_at']."<br>";
                                echo            "End at:<br> ".$res['end_at']."<br>";
                                echo            "Venue:<br> ".$res['venue']."<br>";
                                echo        "</div></div>";
                                echo        "<div class=\"event_content\">".$res['content']."</div>";
                                echo "</div></div>";
                                echo "<div class=\"modal-footer\">";
                                echo   "<button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Close</button>";
                                echo"</div></div></div></div>";

                            } 

                        }        

                    } catch (PDOException $e) {
                        echo "Error: ".$e->getMessage();
                    }
                        
                    ?>

                </div>
                <div class="more-container">
                    <a href="events.php"><button class="view-more"><span>View All Events </span></button></a>
                </div>
            </div>
        </section>

        <!-- ================================= End Upcoming Events Area ================================= -->

        <!-- ================================= Start Job Listings Area ================================= -->

        <section class="jobs-listing">
            <div class="container">
                <div class="row">
                    <div class="col-7">
                        <h2>Jobs Listing</h2>
                    </div>
                    <div class="col-5">
                        <div class="side-view-more"><a href="jobs.php">View More</a></div>
                    </div>
                </div>
                
                
                <!-- Carousel Start -->
                

                <?php 

                    try {
                        $query = "SELECT * FROM job_ads ORDER BY id DESC LIMIT 5 ";  
                        $stmt = $conn->prepare($query);
                        $stmt->execute();

                        if($stmt->rowCount() > 0) {
                            echo "<div class=\"job-wrapper\"><div class=\"job-carousel owl-carousel\">";

                            while($job_ads = $stmt->fetch(PDO::FETCH_OBJ)) { 
                                echo "<div class=\"job-card\">";
                                echo "<div class=\"position\">".$job_ads->title."</div>";
                                echo "<div class=\"details\">";
                                echo "Salary: RM".$job_ads->salary."<br><br><br><br><br>";  
                                echo "<small><i class=\"fas fa-calendar-day\"></i> Publish at ".date('d/m/y', strtotime($job_ads->published_at))."</small><br>";  
                                echo "</div></div>";                                        
                            } 

                            echo "</div></div>";
                        }        

                        // disconnect from database
                        $conn = NULL;
                    } catch (PDOException $e) {
                        echo "Error: ".$e->getMessage();
                    }
                        
                ?>

                <script>
                        $(".job-carousel").owlCarousel({
                        margin: 20,
                        loop: true,
                        autoplay: true,
                        autoplayTimeout: 3000,
                        autoplayHoverPause: true,
                        responsive: {
                            0:{
                            items:1,
                            nav: false
                            },
                            600:{
                            items:2,
                            nav: false
                            },
                            1000:{
                            items:3,
                            nav: false
                            }
                        }
                        });
                </script>

                <!-- Carousel End -->

            </div>
        </section>

        <!-- ================================= End Job Listings Area ================================= -->

    </main>

    <!-- ===================================== End Main Area ===================================== -->

    <!-- ===================================== Start Footer Area ===================================== -->
    
    <?php include_once('footer.php') ?>

    <!-- ===================================== End Footer Area ===================================== -->

</body>
</html>