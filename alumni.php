<?php

include_once("include/config.php");

if(!isset($_SESSION)){ 
    
    session_start(); 
    
} 

//define total number of results you want per page  
$results_per_page = 10;  
//find the total number of results stored in the database  
$user = $conn->query("SELECT SQL_CALC_FOUND_ROWS * FROM users")->fetchAll();
$user = $conn->prepare("SELECT FOUND_ROWS()"); 
$user->execute();
$row_count =$user->fetchColumn();
// echo $row_count;

 //determine the total number of pages available  
 $number_of_page = ceil ($row_count / $results_per_page); 
 
 //determine which page number visitor is currently on  
 if (!isset ($_GET['page']) ) {  
    $page = 1;  
} else {  
    $page = $_GET['page'];  
}  

//determine the sql LIMIT starting number for the results on the displaying page  
$page_first_result = ($page-1) * $results_per_page; 

//retrieve the selected results from database 
$user = $conn->query("SELECT * FROM users LIMIT 12")->fetchAll();


// Fetch UserName and UserProfilePic from User
//$user = $conn->query("SELECT * FROM users LIMIT 12")->fetchAll();
// $socmed = $conn->query("SELECT sm . * , us . * FROM user_social_media sm, user us 
// WHERE sm.UserID = us.UserID")->fetchAll();

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
    <title>Search Alumni | UM Alumni </title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- font awesome icons -->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet"
        type='text/css'>

    <link rel="icon" href="./images/favicon.svg">
    <link href="styles/style.css" rel="stylesheet">
    <link rel="stylesheet" href="styles/alumni.css">
</head>

<body>
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

    <!-- ROW FOR HEADER -->
    <div class="row graduate-text">
        <!-- header -->
        <div class="col  alumni-text">
            <h1>Alumni</h1>
            <p>(n.) former student or pupil of a school, college, or university. </p>
            <div class="search-box">
                <input type="text" placeholder="Search for alumni..">

                <div class="autocom-box"></div>

                <div class="search-icon" onclick="displayPage()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-search bg-transparent text-white" viewBox="0 0 16 16">
                        <path
                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                    </svg>
                </div>
            </div>
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
        <?php foreach($user as $col){ ?>
            
            <div class="col-md-3 col-sm-6 col-xs-12 spc">
                <div class="card">
                    <img src="images/avatar.png" alt="man">
                    <div class="desc">
                        <p class="name" style="font-weight: 800;"><?php echo htmlspecialchars($col['full_name']); ?></p>
                        <p class="abtMe">About Me</p>
                    </div>

                    <div class="socmed">
                    <a href="<?php echo $column['UserName'];?>"><i
                            class="fa fa-facebook-official bg-transparent"></i></a>
                    <a href="<?php echo $column['UserName'];?>"><i class="fa fa-github-square bg-transparent"></i></a>
                    <a href="<?php echo $column['UserName'];?>"><i
                            class="fa fa-linkedin-square bg-transparent"></i></a>
                    </div>
                    
                    <div class="button">
                        <a class="btn btn-primary" href="viewprofile.php?id=<?php echo $col['id']?>" role="button">View Profile</a>
                    </div>
                </div>
            </div>

        <?php }?>
        

    </div>


    <!-- Pagination Start -->
    <nav aria-label="Page navigation example">
        <? for($page = 1; $page<= $number_of_page; $page++) { ?>  
            <ul class="pagination justify-content-center mt-5">
                
                <li class="page-item"><a class="page-link" href="<?php echo "alumni.php?page=' . $page . '">' . $page . ';?>"></a></li>
                
            </ul>
        <?php } ?>
    </nav>
    <!-- Pagination End -->

    <!-- ===================================== Start Footer Area ===================================== -->

    <footer id="footer" class="mt-auto">
        <div class="footer-link-section">
            <div class="container">
                <div class="row justify-content-left">
                    <div class="col-sm-6 col-md-4 item">
                        <h3>Contact</h3>
                        <ul>
                            <li><a href="#">Find Us</a></li>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">Help</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-md-4 item">
                        <h3>Links</h3>
                        <ul>
                            <li><a href="#">About UM</a></li>
                            <li><a href="#">Study @ UM</a></li>
                            <li><a href="#">General Enquiry</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-6 col-md-4 item">
                        <h3>Follow Us</h3>
                        <ul>
                            <li><a href="#">Facebook</a></li>
                            <li><a href="#">Instagram</a></li>
                            <li><a href="#">Twitter</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Copyrights -->
        <div class="copyright py-4">
            <div class="container text-center">
                <p class="mb-0 py-2">&copy;
                    <script>document.write(new Date().getFullYear())</script> UM Alumni All rights reserved.
                </p>
            </div>
        </div>
    </footer>

    <!-- ===================================== End Footer Area ===================================== -->

    <script src="scripts/alumni.js"></script>
    <script src="scripts/suggestion.js"></script>
</body>

</html>