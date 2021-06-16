<?php
include_once("include/config.php");

include_once("include/userapprovalsystem.php");

session_start();

$results_per_page = 10;

//find the total number of results stored in the database   
$number_of_result = $conn->query('SELECT count(*) from users, statuses WHERE users.status_id = statuses.id AND statuses.status = "Denied"')->fetchColumn(); 

//determine the total number of pages available  
$number_of_page = ceil ($number_of_result / $results_per_page);  

//determine which page number visitor is currently on  
if (!isset ($_GET['page']) ) {  
    $page = 1;  
} else {  
    $page = $_GET['page'];  
}

$current_page = $page;

//determine the sql LIMIT starting number for the results on the displaying page  
$page_first_result = ($page-1) * $results_per_page; 




?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        
        <link rel="stylesheet" href="styles/admin.css">

        <link rel="stylesheet" href="styles/page_error.css">

        <link rel="stylesheet" href="styles/custom_alert.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>

        <title>Alumni System</title>
    </head>
<body class="d-flex flex-column h-100">
    <!--Bootstrap js-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <?php include_once("adminnavigation.php"); ?>


    <?php if(isset($_GET['action']) && $_GET['action'] == 'acc_denied') { ?>
        <div class="alert2 show">
        <span class="fas fa-exclamation-circle"></span>
        <span class="msg">Account has been denied</span>
        <div class="close-btn">
            <span class="fas fa-times"></span>
        </div>
    </div>

    <script>

    setTimeout(function(){
        $('.alert2').removeClass("show");
        $('.alert2').addClass("hide");
    },3000);
    

    $('.close-btn').click(function(){
    $('.alert2').removeClass("show");
    $('.alert2').addClass("hide");
    });
        
    </script>
    <?php } ?>

    <main >

        <?php if(!isset($_SESSION['logged_in'])) { ?>
            <div class="error_container">
                <h1><i style="color:red;" class="fas fa-exclamation-triangle"></i> Access Denied!</h1>
                <p>
                    Please <a style="color:black" href="signin.php">Sign in</a> first to access the page.
                </p>
            </div>

        <?php } else{ ?>


        <div class="sidenav-bg">
            <div class="container">
                <nav class="nav nav-fill nav-pills sidenav">
                    <a class="nav-link" href="pending.php">Pending Accounts</a>
                    <a class="nav-link" href="approved.php">Approved Accounts</a>
                    <a class="nav-link activea" href="denied.php">Denied Accounts</a>
                </nav>
            </div>
        </div>

        
        <div class="container">
            <br>
            <!--
            <input type="text" id="search-bar" class="form-control" placeholder="Search Bar">
            -->
            
            <table class="table table-striped table-hover table-bordered container" id="mainTable">
                <thead>
                    <tr>
                        <th style="width:20%">Name</th>
                        <th style="width:25%">Faculty</th>
                        <th style="width:20%">Email</th>
                        <th style="width:5%" class="text-center">Batch</th>
                        <th style="width:10%" class="text-center">Status</th>
                        <th style="width:15%" class="text-center">Control</th>
                    </tr>
                </thead>
                <tbody id="myTable">




                    <?php
                        try {
                            $query = "SELECT * FROM users, faculties, statuses WHERE (users.fac_id = faculties.id AND users.status_id = statuses.id) AND statuses.status = \"Denied\" order by users.id asc
                                    LIMIT " . $page_first_result . ',' . $results_per_page;

                            $stmt = $conn->query($query);

                            if($stmt != 0) {

                                while($res = $stmt->fetch()) { 
                                    echo "<tr>";
                                    echo "<td>".$res['full_name']."</td>";
                                    echo "<td>".$res['faculty']."</td>";
                                    echo "<td>".$res['email']."</td>";
                                    
                                    echo "<td class=\"text-center\">".$res['grad_year']."</td>";
                                    echo "<td class=\"text-center\">".$res['status']."</td>";
                
                                    echo "<td><a class=\"approve-btn\" href=\"denied.php?id=$res[0]&condition=approve\" >Approve</a>";

                                } 

                            }        

                        } catch (PDOException $e) {
                            echo "Error: ".$e->getMessage();
                        }
                    ?>





                </tbody>
                </table>

                <!-- Pagination Start -->
                <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center mt-5">
                        <?php if($page > 1) {
                            echo '<li class="page-item"><a class="page-link" href = "denied.php?page=' . $current_page - 1 . '" tabindex="-1">Previous</a></li>';  
                        } 
                        for($page = 1; $page<= $number_of_page; $page++) { 
                            if($page == $current_page) {
                                echo '<li class="page-item active"><a class="page-link" href = "denied.php?page=' . $page . '">' . $page . ' <span class="sr-only">(current)</span></a></li>';  
                            } else {
                                echo '<li class="page-item"><a class="page-link" href = "denied.php?page=' . $page . '">' . $page . ' </a></li>';  
                            }
                        } 
                        if($number_of_page > 1 && $current_page != $number_of_page) {
                            echo '<li class="page-item"><a class="page-link" href = "denied.php?page=' . $current_page + 1 . '">Next</a></li>';  
                        } 
                        ?>
                        </ul>
                </nav>
                <!-- Pagination End -->
        </div>

        <?php } ?>

    </main>


    <footer id="control">
        <div class="bg-dark py-4">
            <div class="container text-center">
                <p class="text-muted mb-0 py-2">&copy; <script>document.write(new Date().getFullYear())</script> UM Alumni All rights reserved.</p>
            </div>
        </div>
    </footer>
    
    <?php
        $conn = null;
    ?>

</body>
</html>
