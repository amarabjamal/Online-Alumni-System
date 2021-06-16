<?php
include_once("include/config.php");

session_start();

if (isset($_GET['id']) && $_GET['condition'] == "delete"){
    $id = $_GET['id'];
    

    try {
        // begin a transaction
        $conn->beginTransaction();
        // a set of queries: if one fails, an exception will be thrown
        $sql = "DELETE FROM events WHERE id=$id";
        $conn->query($sql);//run the query & returns a PDOStatement object
        // if we arrive here, it means that no exception was thrown
        // which means no query has failed, so we can commit the
        // transaction
        $conn->commit();
        header("Location: edit_event.php?action=deletesuccess");
    } catch (Exception $e) {
        // we must rollback the transaction since an error occurred
        // with insert
        $conn->rollback();
    }
}

$results_per_page = 10;

//find the total number of results stored in the database   
$number_of_result = $conn->query('SELECT count(*) from events')->fetchColumn(); 

//determine the total number of pages available  
$number_of_page = ceil ($number_of_result / $results_per_page);  

//determine which page number visitor is currently on  
if (!isset ($_GET['page']) ) {  
    $page = 1;  
} else {  
    $page = $_GET['page'];  
}

$num=1 + (10 * ($page-1));

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
<body class="d-flex flex-column h-100 ">
    <!--Bootstrap js-->

    <?php if(isset($_GET['action']) && $_GET['action'] == 'image') { ?>
            <div class="alert2 show">
            <span class="fas fa-exclamation-circle"></span>
            <span class="msg">Event edited. (With Image)</span>
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

        <?php if(isset($_GET['action']) && $_GET['action'] == 'noimage') { ?>
            <div class="alert2 show">
            <span class="fas fa-exclamation-circle"></span>
            <span class="msg">Event edited. (No Image)</span>
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

        <?php if(isset($_GET['action']) && $_GET['action'] == 'addsuccess') { ?>
            <div class="alert2 show">
            <span class="fas fa-exclamation-circle"></span>
            <span class="msg">Event has been added</span>
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

        <?php if(isset($_GET['action']) && $_GET['action'] == 'deletesuccess') { ?>
            <div class="alert2 show">
            <span class="fas fa-exclamation-circle"></span>
            <span class="msg">Event has been deleted</span>
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

    
    <?php include_once("adminnavigation.php"); ?>
    

    <main >

        


        <?php if(!isset($_SESSION['logged_in'])) { ?>
            <div class="error_container">
                <h1><i style="color:red;" class="fas fa-exclamation-triangle"></i> Access Denied!</h1>
                <p>
                    Please <a style = "color: black" href="signin.php">Sign in</a> first to access the page.
                </p>
            </div>

        <?php } else{ ?>

        

        <div class="container pt-5">
            <h2 class="banner-back">Edit Event</h2>
        </div>
        <div class="container py-4 ">
                <a href="add_event.php" class="banner-sm-btn">Create a new event</a>
        </div>
        
        

        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered container" id="mainTable">
                <thead>
                    <tr>
                        <th style="width:5%" class="text-center">No.</th>
                        <th style="width:12%">Event Name</th>
                        <th style="width:23%">Venue</th>
                        <th style="width:30%">Brief</th>
                        <th style="width:10%" class="text-center">Date</th>
                        <th style="width:20%" class="text-center">Control</th>
                    </tr>
                </thead>
                <tbody id="myTable">

                    <?php

                        try {
                            $query = "SELECT * FROM events, venues WHERE venues.id = events.venue_id order by events.id asc
                                    LIMIT " . $page_first_result . ',' . $results_per_page;

                            $stmt = $conn->query($query);

                            

                            if($stmt != 0) {

                                while($res = $stmt->fetch()) { 
                                    if(strlen($res['content']) > 100){
                                        $subb = substr($res['content'], 0, 100) . "...";
                                    }else{
                                        $subb = substr($res['content'], 0, 100);
                                    }   
                                        
                                // the keys match the field names from the table
                                    echo "<tr>";
                                    echo "<td>".$num."</td>";
                                    $num +=1 ;
                                    echo "<td>".$res['name']."</td>";
                                    echo "<td>".$res['venue']."</td>";
    
                                    echo "<td>".$subb."</td>";
    
                                    echo "<td class=\"text-center\">".$res['start_at']."</td>";
                                    echo "<td><a class=\"edit-btn\" href=\"edit_event2.php?id=$res[0]\">Edit</a> | <a class=\"deny-btn\" href=\"edit_event.php?id=$res[0]&condition=delete\">Delete</a></td>";

                                } 

                            }        

                        } catch (PDOException $e) {
                            echo "Error: ".$e->getMessage();
                        }

                        
                    ?>


                </tbody>
                </table>
        </div>

        <!-- Pagination Start -->
        <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center mt-5">
                        <?php if($page > 1) {
                            echo '<li class="page-item"><a class="page-link" href = "edit_event.php?page=' . $current_page - 1 . '" tabindex="-1">Previous</a></li>';  
                        } 
                        for($page = 1; $page<= $number_of_page; $page++) { 
                            if($page == $current_page) {
                                echo '<li class="page-item active"><a class="page-link" href = "edit_event.php?page=' . $page . '">' . $page . ' <span class="sr-only">(current)</span></a></li>';  
                            } else {
                                echo '<li class="page-item"><a class="page-link" href = "edit_event.php?page=' . $page . '">' . $page . ' </a></li>';  
                            }
                        } 
                        if($number_of_page > 1 && $current_page != $number_of_page) {
                            echo '<li class="page-item"><a class="page-link" href = "edit_event.php?page=' . $current_page + 1 . '">Next</a></li>';  
                        } 
                        ?>
                        </ul>
                </nav>
                <!-- Pagination End -->
        <?php } ?>
    </main>

    <footer id="footer" class="mt-auto">
        <div class="bg-dark py-4">
            <div class="container text-center">
                <p class="text-muted mb-0 py-2">&copy; <script>document.write(new Date().getFullYear())</script> UM Alumni All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <script src="https://cdn.ckeditor.com/ckeditor5/27.0.0/classic/ckeditor.js"></script>
    
    <script src="scripts.js"></script>
    
    <?php
        $conn = null;
    ?>

</body>
</html>
