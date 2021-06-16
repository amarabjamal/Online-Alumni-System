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

    <link href="styles/addJob.css" rel="stylesheet" type="text/css">
    <link href="styles/page_error.css" rel="stylesheet" type="text/css">

    <!-- Font Awesome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

    <!-- Custom Alert  -->
    <link rel="stylesheet" href="styles/custom_alert.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>

    <title>Advertise Jobs | UM Alumni </title>

</head>

<body class="d-flex flex-column h-100">
    <!--Bootstrap js-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
        crossorigin="anonymous"></script>

    <!-- Display message for successful create job -->
    <?php if(isset($_GET['action']) && $_GET['action'] == 'create_success' &&  isset($_SESSION['logged_in'])) { ?>

    <div class="alert_v1 show">

        <span class="fas fa-exclamation-circle"></span>
        <span class="msg">Added successfully!</span>
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

    <!-- Display message for successful delete job -->
    <?php if(isset($_GET['action']) && $_GET['action'] == 'delete_success' &&  isset($_SESSION['logged_in'])) { ?>

    <div class="alert_v1 show">

        <span class="fas fa-exclamation-circle"></span>
        <span class="msg">Deleted successfully!</span>
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

    <!-- Display message for successful update job -->
    <?php if(isset($_GET['action']) && $_GET['action'] == 'update_success' &&  isset($_SESSION['logged_in'])) { ?>

    <div class="alert_v1 show">

        <span class="fas fa-exclamation-circle"></span>
        <span class="msg">Updated successfully!</span>
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
        <?php if($_SESSION['status'] == 1 || $_SESSION['status'] == 3 || isset($_SESSION['admin_id'])) { ?>
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
            <h1>Advertise Jobs</h1>
        </div>

        <section class="upcoming-events">
            <div class="container">
            <div class="add_jobs_button my-3" style="height:30px">
                <button type="button" class="btn btn-light" style="float:right;" data-toggle="modal" data-target="#new_ads"><i class="fas fa-plus"></i> New Ads</button>
            </div>

            <!-- New Job Ads Modal -->
            <div class="modal fade" id="new_ads" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Ads</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    
                <form method="POST" action="process_job_ads.php" id="formTest">

                <div class="form-group">
                <label><b>Job Title:</b></label>
                <input type="text" name="job_title" class="form-control" required>
                </div>

                <div class="form-group">
                <label><b>Salary:</b></label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                    <span class="input-group-text">RM</span>
                    </div>
                    <input type="number" min="0" step="any" name="salary" class="form-control" required>
                </div>
                </div>

                <div class="form-group">
                <label><b>Details:</b></label>
                <textarea class="form-control" name="content"  rows="5" required></textarea>
                </div>

                <div class="form-group">
                <label><b>Company:</b></label>
                <input type="text" name="company" class="form-control" required>
                </div>

                <div class="form-group">
                <label><b>Location:</b></label>
                <input type="text" name="location" class="form-control" required>
                </div>

                </div>
                <div class="modal-footer" style="border-top:none;">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" name="create_job">Create</button>
                    </form>
                </div>
                </div>
            </div>
            </div>

            <div class="jobs-table">
            <table id="job-ads">
                <thead>
                <th>Job Title</th>
                <th>Salary (RM)</th>
                <th>Company, Location</th>
                <th>Publish Date</th>
                <th width="120px"></th>
                </thead>
                <tbody>

                <?php 

                    try {
                        $query = "SELECT  
                                    *
                                FROM job_ads
                                LEFT JOIN companies
                                ON job_ads.com_id = companies.id
                                WHERE user_id= ".$_SESSION['user_id']." 
                                ORDER BY job_ads.id DESC 
                                ";
                        $stmt = $conn->query($query);

                        if($stmt != 0) {
                            while($res = $stmt->fetch()) { /* print_r($res); */?>
                                <tr>
                                    <td><?php echo $res['title']; ?></td>
                                    <td><?php echo $res['salary']; ?></td>
                                    <td><?php 
                                            if ($res['name'] != NULL) {
                                                echo $res['name'].', '.$res['location']; 
                                            } else {
                                                echo '-';
                                            }
                                        ?>
                                    </td>
                                    <td><?php echo date('d/m/y', strtotime($res['published_at'])); ?></td>
                                    <td>
                                        <div style="display: flex; flex-direction: row; align-items: center; justify-content: space-around;">
                                            <button class='btn btn-info btn-xs btn-edit' data-toggle="modal" data-target="#jobs_<?php echo $res[0]; ?>"><i class="fas fa-edit"></i></button>
                                            <form method="POST" action="process_job_ads.php">
                                                <input type="hidden" id="job_ads_id" name="job_ads_id" value="<?php echo $res[0]; ?>">
                                                <button type="submit" name="delete_job" class='btn btn-danger btn-xs btn-delete'><i class="fas fa-trash-alt"></i></button>
                                            </form>  
                                        </div>  
                                    </td>
                                </tr>

                                <!-- Edit Job Ads Modal -->

                                <div class="modal fade" id="jobs_<?php echo $res[0]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Job Ads</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        
                                    <form method="POST" action="process_job_ads.php">

                                    <div class="form-group">
                                    <label><b>Job Title:</b></label>
                                    <input type="text" name="job_title" class="form-control" value="<?php echo $res['title']; ?>" required>
                                    </div>

                                    <div class="form-group">
                                    <label><b>Salary:</b></label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text">RM</span>
                                        </div>
                                        <input type="number" min="0" step="any" name="salary" class="form-control" value="<?php echo $res['salary']; ?>" required>
                                    </div>
                                    </div>

                                    <div class="form-group">
                                    <label><b>Details:</b></label>
                                    <textarea class="form-control" name="content"  rows="5" required><?php echo $res['content']; ?></textarea>
                                    </div>

                                    <div class="form-group">
                                    <label><b>Company:</b></label>
                                    <input type="text" name="company" class="form-control" value="<?php echo $res['name']; ?>" readonly>
                                    </div>

                                    <div class="form-group">
                                    <label><b>Location:</b></label>
                                    <input type="text" name="location" class="form-control" value="<?php echo $res['location']; ?>" readonly>
                                    </div>

                                    <input type="hidden" id="job_ads_id" name="job_ads_id" value="<?php echo $res[0]; ?>">

                                    </div>
                                    <div class="modal-footer" style="border-top:none;">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary" name="update_job">Update</button>
                                        </form>
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

                </tbody>
            </table>
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