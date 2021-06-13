<?php 

if(session_status() === PHP_SESSION_NONE) session_start();

include_once("include/config.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="./images/favicon.svg">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

    <link href="styles/style.css" rel="stylesheet">

    <!-- <link href="styles/events.css" rel="stylesheet" type="text/css"> -->
    <link href="styles/page_error.css" rel="stylesheet" type="text/css">

    <!-- Font Awesome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

    <title>Events | UM Alumni </title>

</head>

<body class="d-flex flex-column h-100">
    <!--Bootstrap js-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
        crossorigin="anonymous"></script>

    <!-- ===================================== Start Header Area ===================================== -->
    <?php include_once("navigation.php"); ?>
    <!-- ===================================== End Header Area ===================================== -->

    <main>

    <?php if(!isset($_SESSION['logged_in'])) { ?>
        <div class="error_container">
        <h1><i style="color:red;" class="fas fa-exclamation-triangle"></i> Access Denied!</h1>
        <p>
            Please <a href="signin.php">Sign in</a> first to access the page.
        </p>
        </div>
    
    <?php } ?>

    <?php if(isset($_SESSION['logged_in'])) { ?>
        <?php if($_SESSION['status'] == 1 || $_SESSION['status'] == 3) { ?>
        <div class="error_container">
        <h1><i style="color:red;" class="fas fa-exclamation-triangle"></i> Access Denied!</h1>
        
        <p>
            You do not have access to this page.
            Kindly wait for your account approval.
        </p>
        </div>
    
    <?php } else { ?>
        <!-- Main content goes here -->

        <div id="page_heading">
            <h1>Events</h1>
        </div>
            <!-- ================================= Start Upcoming Events Area ================================= -->

            <section id="upcoming-events" class="upcoming-events">
                <div class="container">
                    <div class="row">

                        <?php 

                            try {
                                $query = "SELECT * FROM events 
                                            JOIN venues
                                            ON events.venue_id = venues.id
                                            ORDER BY events.id DESC LIMIT 3
                                            ";  
                                $stmt = $conn->prepare($query);
                                $stmt->execute();

                                if($stmt->rowCount() > 0) {

                                    while($events = $stmt->fetch(PDO::FETCH_OBJ)) { 
                                        echo "<div class=\"col-md-4\">";
                                        echo    "<div class=\"card event-card\">";
                                        echo        "<img src=\"".$events->image_url."\" class=\"event-img\">";
                                        echo        "<div class=\"card-body\">";
                                        echo            "<h5 class=\"event-title\">".$events->name."</h5>";    
                                        echo            "<button type=\"button\" class=\"event-btn\" data-toggle=\"modal\" data-target=\"#event_".$events->id."\">Explore <span>&rarr;</span></button>";
                                        echo    "</div></div></div>";

                                        //Modal To view event's details

                                        echo "<div class=\"modal fade\" id=\"event_".$events->id."\" tabindex=\"-1\">";
                                        echo "<div class=\"modal-dialog\" role=\"document\">";
                                        echo    "<div class=\"modal-content\">";
                                        echo    "<div class=\"modal-header\">";
                                        echo        "<h5 class=\"modal-title\">".$events->name."</h5>";
                                        echo    "<button type=\"button\" class=\"close\" data-dismiss=\"modal\">";
                                        echo    "<span>&times;</span>";
                                        echo    "</button>";
                                        echo "</div>";
                                        echo "<div class=\"modal-body\">";
                                        echo    "<div class=\"modal_content\">";
                                        echo        "<div class=\"image_details\">";
                                        echo        "<img src=\"".$events->image_url."\">";
                                        echo        "<div class=\"details\">";
                                        echo            "Start at:<br> ".$events->start_at."<br>";
                                        echo            "End at:<br> ".$events->end_at."<br>";
                                        echo            "Venue:<br> ".$events->venue."<br>";
                                        echo        "</div></div>";
                                        echo        "<p>".$events->content."</p>";
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
                </div>
            </section>

        <!-- ================================= End Upcoming Events Area ================================= -->

        <!-- End of Main content -->
    <?php } ?>
    <?php } ?>

    </main>

    <!-- ===================================== Start Footer Area ===================================== -->

    <?php include_once("footer.php"); ?>

    <!-- ===================================== End Footer Area ===================================== -->
</body>

</html>