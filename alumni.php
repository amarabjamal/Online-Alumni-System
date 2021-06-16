<?php

// DATABASE CONNECTION
include_once("include/config.php");

if(session_status() === PHP_SESSION_NONE){
    session_start();
} 

// PAGINATION CODE
if(isset($_GET['page'])){
    $page = $_GET['page'];
}else{
    $page = 1;
}

//define total number of results you want per page  
$results_per_page = 12;  
$start_from = ($page-1)*12;

$result = $conn->query("SELECT * FROM users LIMIT $start_from,$results_per_page");
// $row = $result->fetch(PDO::FETCH_ASSOC);

// print_r($row);

//find the total number of results stored in the database  
$user = $conn->query("SELECT SQL_CALC_FOUND_ROWS * FROM users")->fetchAll();
$user = $conn->prepare("SELECT FOUND_ROWS()"); 
$user->execute();

$row_count =$user->fetchColumn();


//determine the total number of pages available  
$number_of_page = ceil ($row_count / $results_per_page); 

//close connection
$conn = null;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Bootstrap -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="./images/favicon.svg" rel="icon">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

    <link href="styles/style.css" rel="stylesheet">
    
    <link href="styles/alumni.css" rel="stylesheet">
    <link href="styles/page_error.css" rel="stylesheet" type="text/css">

    <!-- font awesome icons -->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet"
        type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

    <title>Search Alumni | UM Alumni</title>

    <!--Bootsrap icons-->
    <link href="./node_modules/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body class="d-flex flex-column h-100">
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

    <div class="container">
        <!-- ROW FOR HEADER -->
        <div class="row graduate-text">
            <!-- header -->
            <div class="col  alumni-text">
                <h1>Alumni</h1>
                <p>(n.) former student or pupil of a school, college, or university. </p>
                <form action="process_search_alumni.php" method="POST">
                    <div class="search-box">
                        <input type="text" name="full_name" placeholder="Search for alumni..">

                        <!-- <div class="autocom-box"></div> -->
                        
                        <button type="submit" name="submit" class="search-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-search bg-transparent text-white" viewBox="0 0 16 16">
                                <path
                                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
            <!-- graduate image -->
            <div class="col d-none d-lg-block graduate">
                <img src="images/graduate.png" alt="graduate">
            </div>
        </div>

        <!-- ROW FOR INDICATOR -->
        <div class="row indi-box">
            <!-- column untuk indicator -->
            <div class="col-4 indicator">
                <p><a href="index.html">home</a> > <span><a href="alumni.html">Alumni</a></span></p>
            </div>
        </div>

        <!-- ROW FOR FILTER -->

        <div class="row filter">
            <!-- column for Batch -->
            <div class="col-lg-4 search-input">
                <input type="text" name="batch" placeholder="Batch" class="batch">
                <div class="autocom-batch">
                </div>
            </div>

            <!-- column for faculty -->
            <div class="col-lg-4 break">
                <select name="faculty" id="main-menu" class="custom-select">
                    <option value="selectF" disabled selected>Please Select Faculty</option>
                    <option value="education">Faculty of Education</option>
                    <option value="dentistry">Faculty of Dentistry</option>
                    <option value="engineering">Faculty of Engineering</option>
                    <option value="science">Faculty of Science</option>
                    <option value="law">Faculty of Law</option>
                    <option value="medicine">Faculty of Medicine</option>
                    <option value="artsocial">Faculty of Art and Social Sciences</option>
                    <option value="business">Faculty of Business and Accountancy</option>
                    <option value="economics">Faculty of Economics and Administration</option>
                    <option value="languages">Faculty of Languages and Linguistics</option>
                    <option value="environment">Faculty of Built Environment</option>
                    <option value="compsc">Faculty of Computer Science and Information Technology</option>
                    <option value="pharmacy">Faculty of Pharmacy</option>
                    <option value="creative">Faculty of Creative and Arts</option>
                    <option value="business">Faculty of Business and Accountancy</option>
                </select>
            </div>

            <!-- column for major -->
            <div class="col-lg-4 break">
                <select name="major" id="sub-menu" class="custom-select">
                    <option value="selectM" disabled selected>Please Select Major</option>
                </select>
            </div>
        </div>

        <!-- ROW FOR CARDS-->
        <div class="row cards">
            <?php foreach($result as $col){ ?>
                    
                    <div class="col-md-3 col-sm-6 col-xs-12 spc">
                        <div class="card">
                            <img src="images/avatar.png" alt="man">
                            <div class="desc">
                                <p class="name" style="font-weight: 800;"><?php echo htmlspecialchars($col['full_name']); ?></p>
                                <p class="abtMe">About Me</p>
                            </div>

                            <div class="button">
                                <a class="btn btn-primary" href="viewprofile.php?id=<?php echo $col['id']?>" role="button">View Profile</a>
                            </div>
                        </div>
                    </div>

            <?php }?>
        </div>


        <!-- PAGINATION START -->
        <ul class="pagination justify-content-center">
            <?php 

                if($page>1){
                    echo "<a href='alumni.php?page=".($page-1)."' class='btn btn-danger rounded'>Previous</a>";
                }
                for($i=1; $i<=$number_of_page; $i++){
                    echo "<a href='alumni.php?page=".$i."' class='btn btn-primary rounded'>$i</a>";
                }
                if($i>$page){
                    echo "<a href='alumni.php?page=".($page+1)."' class='btn btn-danger rounded'>Next</a>";
                }
            ?>
        </ul>
        </div>
    <?php } ?>
    <?php } ?>
    </main>

    </div>
   
    <!-- ===================================== Start Footer Area ===================================== -->
    <?php include_once("footer.php"); ?>
    <!-- ===================================== End Footer Area ===================================== -->

    <script src="scripts/alumni.js"></script>
    <script src="scripts/suggestion.js"></script>
</body>

</html>