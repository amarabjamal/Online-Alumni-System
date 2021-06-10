<?php

session_start();

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
    <?php if($_GET['action'] == 'logout_success' && $_SESSION['logged_in'] == FALSE) { ?>
    <div class="alert show">
        <span class="fas fa-exclamation-circle"></span>
        <span class="msg">Logged out successfully!</span>
        <div class="close-btn">
            <span class="fas fa-times"></span>
        </div>
    </div>

    <script>

    setTimeout(function(){
        $('.alert').removeClass("show");
        $('.alert').addClass("hide");
    },3000);
    

    $('.close-btn').click(function(){
    $('.alert').removeClass("show");
    $('.alert').addClass("hide");
    });
        
    </script>
    <?php } ?>

    <!-- Display message for successful login -->
    <?php if($_GET['action'] == 'login_success' && $_SESSION['logged_in'] == TRUE) { ?>
        <div class="alert show">
        <span class="fas fa-exclamation-circle"></span>
        <span class="msg">Logged in successfully!</span>
        <div class="close-btn">
            <span class="fas fa-times"></span>
        </div>
    </div>

    <script>

    setTimeout(function(){
        $('.alert').removeClass("show");
        $('.alert').addClass("hide");
    },3000);
    

    $('.close-btn').click(function(){
    $('.alert').removeClass("show");
    $('.alert').addClass("hide");
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
                        if($_SESSION['logged_in'] !== TRUE) { 
                    ?>
                    <h1>Welcome, UM Alumni!</h1>

                    <p class="landing-desc">
                        Interact with other alumni, find a job oppurtunity and get the latest news &amp; events!
                        <br><br>
                        <strong>Expand your <span class="highlight">network</span>. Grow your <span class="highlight">career</span>.</strong>
                    </p>

                    <a href="./signup.html">
                        <button type="button" class="landing-btn-2">Join Now</button>
                    </a>
                    <?php } else {?>
                    <h1>Hello, <?php echo $_SESSION['name']; ?>!</h1>

                    <p class="landing-desc">
                        Interact with other alumni, find a job oppurtunity and get the latest news &amp; events!
                        <br><br>
                        <strong>Expand your <span class="highlight">network</span>. Grow your <span class="highlight">career</span>.</strong>
                    </p>    
                    
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
                    <div class="col-md-4">
                        <div class="card event-card">
                            <img src="./images/event1.jpeg" class="event-img" alt="">
                            <div class="card-body">
                                <h5 class="event-title">WEBINAR : FUTURE OF BLOCKCHAIN TECHNOLOGY</h5>
                                
                                <a href="#" class="event-btn">Explore <span>&rarr;</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card event-card">
                            <img src="./images/event2.jpeg" class="event-img" alt="">
                            <div class="card-body">
                                <h5 class="event-title">PROJECT MANAGEMENT PROFESSIONAL COURSE</h5>
                                
                                <a href="#" class="event-btn">Explore <span>&rarr;</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card event-card">
                            <img src="./images/event3.jpeg" class="event-img" alt="">
                            <div class="card-body">
                                <h5 class="event-title">RESPONSIBLE CONDUCT OF RESEARCH WORKSHOP</h5>
                                
                                <a href="#" class="event-btn">Explore <span>&rarr;</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="more-container">
                    <a href="./events.html"><button class="view-more"><span>View All Events </span></button></a>
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
                        <div class="side-view-more"><a href="./jobs.html">View More</a></div>
                    </div>
                </div>
                
                
                <!-- Carousel Start -->

                <div class="job-wrapper">
                    <div class="job-carousel owl-carousel">
                        <div class="job-card card-1">
                            <div class="company">Berjaya Sdn Bhd</div>
                            <div class="position">Junior Software Engineer</div>
                            <div class="details">
                                Experience: 2 - 7 Years<br>
                                Venue: Kuala Lumpur
                            </div>
                        </div>

                        <div class="job-card card-2">
                            <div class="company">Berjaya Sdn Bhd</div>
                            <div class="position">Junior Software Engineer</div>
                            <div class="details">
                                Experience: 2 - 7 Years<br>
                                Venue: Kuala Lumpur
                            </div>
                        </div>
                        
                        <div class="job-card card-3">
                            <div class="company">Berjaya Sdn Bhd</div>
                            <div class="position">Junior Software Engineer</div>
                            <div class="details">
                                Experience: 2 - 7 Years<br>
                                Venue: Kuala Lumpur
                            </div>
                        </div>

                        <div class="job-card card-4">
                            <div class="company">Berjaya Sdn Bhd</div>
                            <div class="position">Junior Software Engineer</div>
                            <div class="details">
                                Experience: 2 - 7 Years<br>
                                Venue: Kuala Lumpur
                            </div>
                        </div>

                        <div class="job-card card-5">
                            <div class="company">Berjaya Sdn Bhd</div>
                            <div class="position">Junior Software Engineer</div>
                            <div class="details">
                                Experience: 2 - 7 Years<br>
                                Venue: Kuala Lumpur
                            </div>
                        </div>

                        <div class="job-card card-4">
                            <div class="company">Berjaya Sdn Bhd</div>
                            <div class="position">Junior Software Engineer</div>
                            <div class="details">
                                Experience: 2 - 7 Years<br>
                                Venue: Kuala Lumpur
                            </div>
                        </div>

                    </div>
                </div>
                <script>
                        $(".job-carousel").owlCarousel({
                        margin: 20,
                        loop: true,
                        autoplay: true,
                        autoplayTimeout: 2000,
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