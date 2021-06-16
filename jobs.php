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

    <link href="styles/jobs.css" rel="stylesheet" type="text/css">
    <link href="styles/page_error.css" rel="stylesheet" type="text/css">

    <!-- Font Awesome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

    <title>Jobs | UM Alumni </title>

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
            <h1>Jobs</h1>
        </div>

        <section class="my-5">
            <div class="container">
                <div class="row">

                <?php 

                    try {
                        $query = "SELECT  
                                    job_ads.id,
                                    job_ads.title,
                                    job_ads.salary,
                                    job_ads.content,
                                    job_ads.published_at,
                                    companies.name,
                                    companies.location,
                                    users.full_name,
                                    users.id
                                FROM job_ads
                                LEFT JOIN companies
                                ON job_ads.com_id = companies.id 
                                JOIN users
                                ON job_ads.user_id = users.id 
                                ORDER BY job_ads.id DESC 
                                ";
                        $stmt = $conn->query($query);

                        if($stmt != 0) {
                            while($res = $stmt->fetch()) { /* print_r($res); */?>
                            <div class="col-4">
                                <div class="job-card">
                                    <div class="position"><?php echo $res['title']; ?></div>
                                    <!-- if ($job_ads->com_id == NULL) {
                                        <div class="company">No company data</div>;
                                    } else {
                                    } -->
                                    <div class="company"><?php if($res['name'] == NULL) { echo "No company details";} else { echo $res['name'];} ?></div>
                                    <div class="details">
                                        <strong>Salary</strong>: RM<?php echo $res['salary']; ?><br><br><br>  
                                        <small><i class="fas fa-calendar-day"></i> Published on <?php echo date('d/m/y', strtotime($res['published_at'])); ?></small><br>
                                        <!-- Button trigger modal -->
                                        <button type="button" style="float: right" class="btn btn-primary" data-toggle="modal" data-target="#job_<?php echo $res[0]; ?>">
                                        More details
                                        </button>
                                    </div>
                                </div> 
                            </div> 
                            

                            <!-- Modal -->
                            <div class="modal fade" id="job_<?php echo $res[0]; ?>" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title"><?php echo $res['title']; ?></h5>
                                </div>
                                <div class="modal-body">
                                    <div class="row mb-3">
                                        <div class="col-4"><small><i class="fas fa-hand-holding-usd"></i> RM <?php echo $res['salary']; ?></small></div>
                                        <div class="col-4"><small><i class="fas fa-building"></i> <?php echo $res['name']; ?></small></div>
                                        <div class="col-4"><small><i class="fas fa-map-marker-alt"></i> <?php echo $res['location']; ?></small></div>
                                    </div>
                                    <?php echo $res['content']; ?>
                                </div>
                                <div class="modal-footer">
                                    <div class="col">Published by <a href="viewprofile.php?id=<?php echo $res[8]; ?>"><?php echo $res['full_name']; ?></a> on <?php echo date('d/m/y', strtotime($res['published_at'])); ?></div>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                                </div>
                            </div>
                            </div>
                        <?php    } 
                        }        

                        // disconnect from database
                        $conn = NULL;
                    } catch (PDOException $e) {
                        echo "Error: ".$e->getMessage();
                    }

                    ?>

                </div>
            </div>
        </section>
    <?php } ?>
    <?php } ?>

    </main>

    <!-- ===================================== Start Footer Area ===================================== -->

    <?php include_once("footer.php"); ?>

    <!-- ===================================== End Footer Area ===================================== -->
</body>

</html>