<?php
include_once("include/config.php");

include_once("include/userapprovalsystem.php");

session_start();

$sql = "select * from users, faculties, statuses WHERE (users.fac_id = faculties.id AND users.status_id = statuses.id) AND statuses.status = \"Approved\" order by users.id asc";
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

        <link rel="stylesheet" href="styles/custom_alert.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>

        <title>Alumni System</title>
    </head>
<body class="d-flex flex-column h-100">
    <!--Bootstrap js-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>


    <?php if(isset($_GET['action']) && $_GET['action'] == 'accountdeleted') { ?>
        <div class="alert2 show">
        <span class="fas fa-exclamation-circle"></span>
        <span class="msg">Account Deleted</span>
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
        <div class="sidenav-bg">
            <div class="container">
                <nav class="nav nav-fill nav-pills sidenav">
                    <a class="nav-link" href="pending.php">Pending Accounts</a>
                    <a class="nav-link activea" href="approved.php">Approved Accounts</a>
                    <a class="nav-link" href="denied.php">Denied Accounts</a>
                </nav>
            </div>
        </div>

        <div class="container">
            <br>
            <input type="text" id="search-bar" class="form-control" placeholder="Search Bar">
            
            <table class="table table-striped table-hover table-bordered container" id="mainTable">
                <thead>
                    <tr>
                        <th style="width:20%">Name</th>
                        <th style="width:25%">Faculty</th>
                        <th style="width:20%">Email</th>
                        <th style="width:5%" class="text-center">Batch</th>
                        <th style="width:10%" class="text-center">Status</th>
                        <th style="width:20%" class="text-center">Control</th>
                    </tr>
                </thead>
                <tbody id="myTable">
                    
                    <?php
                            while ($res = $result->fetch()) {
                                // the keys match the field names from the table
                                    echo "<tr>";
                                    echo "<td>".$res['full_name']."</td>";
                                    echo "<td>".$res['faculty']."</td>";
                                    echo "<td>".$res['email']."</td>";
                                    
                                    echo "<td class=\"text-center\">".$res['grad_year']."</td>";
                                    echo "<td class=\"text-center\">".$res['status']."</td>";
                
                                    echo "<td><a class=\"deny-btn\" href=\"approved.php?id=$res[0]&condition=deny\" >Deny</a> | <a class=\"edit-btn\" href=\"edituser.php?id=$res[0]&condition=edit\">Edit</a></td>";
                                }
                    ?>    


                </tbody>
                </table>

                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                      <li class="page-item disabled">
                        <a class="page-link" href="approved.html" tabindex="-1" aria-disabled="true">Previous</a>
                      </li>
                      <li class="page-item"><a class="page-link" href="approved.html">1</a></li>
                      <li class="page-item disabled">
                        <a class="page-link" href="approved.html">Next</a>
                      </li>
                    </ul>
                </nav>
        </div>
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
