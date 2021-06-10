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
    } catch (Exception $e) {
        // we must rollback the transaction since an error occurred
        // with insert
        $conn->rollback();
    }
}

$sql = "select * from events, venues WHERE venues.id = events.venue_id order by events.id asc";
$result = $conn->query($sql);


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

        
        <title>Alumni System</title>
    </head>
<body class="d-flex flex-column h-100 ">
    <!--Bootstrap js-->
    

    
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="pending.php"><img class="logo" src="images/um-logo.png" width="175"  alt="logo"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
      
        <div class="collapse navbar-collapse" style="justify-content: flex-end;" id="navbarNavAltMarkup">
            <ul class="navbar-nav">
                <li class="nav-item ">
                    <a class="nav-link other" href="pending.php">Account Control</a>
                </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle other" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Events
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="addEvent.php">New Event</a>
                <a class="dropdown-item" href="editEvent.php">Edit Event</a>
            </li>
            <li class="nav-item" id="control">
                <a class="nav-link logout-btn other" href="adminlogout.php">Log Out</a>
            </li>
            <li class="nav-item" id="control-lg">
                <a class="nav-link other" href="adminlogout.php">Log Out</a>
            </li>
        </ul>
        </div>
    </div>
    </nav>
    

    <main >

        

        <div class="container pt-5">
            <h2 class="banner-back">Edit Event</h2>
        </div>
        <div class="container py-4 ">
                <a href="addEvent.html" class="banner-sm-btn">Create a new event</a>
        </div>
        
        

        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered container" id="mainTable">
                <thead>
                    <tr>
                        <th style="width:5%" class="text-center">No.</th>
                        <th style="width:12%">Event Name</th>
                        <th style="width:33%">Venue</th>
                        <th style="width:38%">Brief</th>
                        <th style="width:12%" class="text-center">Date</th>
                        <th style="width:10%" class="text-center">Control</th>
                    </tr>
                </thead>
                <tbody id="myTable">

                    <?php
                        $num=1;
                        while ($res = $result->fetch()) {
                            // the keys match the field names from the table
                                echo "<tr>";
                                echo "<td>".$num."</td>";
                                $num +=1 ;
                                echo "<td>".$res['name']."</td>";
                                echo "<td>".$res['venue']."</td>";
                                echo "<td>".$res['content']."</td>";
                                echo "<td class=\"text-center\">".$res['start_at']."</td>";
                                echo "<td><a href=\"editevent2.php?id=$res[0]\">Edit</a> | <a href=\"editevent.php?id=$res[0]&condition=delete\">Delete</a></td>";
                            }
                    ?>


                </tbody>
                </table>
        </div>

        

    </main>

    <!--
    <footer id="control">
        <div class="bg-dark py-4" >
            <div class="container text-center">
                <p class="text-muted mb-0 py-2">&copy; <script>document.write(new Date().getFullYear())</script> UM Alumni All rights reserved.</p>
            </div>
        </div>
    </footer>
    -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <script src="https://cdn.ckeditor.com/ckeditor5/27.0.0/classic/ckeditor.js"></script>
    
    <script src="scripts.js"></script>
    
    <?php
        $conn = null;
    ?>

</body>
</html>
