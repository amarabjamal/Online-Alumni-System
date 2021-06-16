<?php
include_once("include/config.php");

if (session_status() === PHP_SESSION_NONE){
    session_start();
}

$id = $_SESSION['user_id'];
$result = $conn->prepare("SELECT * FROM users WHERE id =$id");
$result->execute();
$row = $result->fetch(PDO::FETCH_ASSOC);

$f = $row['fac_id'];
$faculty = $conn->prepare("SELECT faculties.id, faculties.faculty FROM users INNER JOIN faculties ON faculties.id=users.fac_id  WHERE users.fac_id=$f");
$faculty->execute();
$fac = $faculty->fetch(PDO::FETCH_ASSOC);

// FETCH DATA FROM TABLE EXPS
$id = $_SESSION['user_id'];
$experience = $conn->prepare("SELECT title, statuses, year_start, year_end, id FROM exps WHERE user_id='$id'");
$experience->execute();

// FETCH DATA FROM TABLE PROJECT
$id = $_SESSION['user_id'];
$project = $conn->prepare("SELECT * FROM projects WHERE user_id='$id'");
$project->execute();

// FETCH DATA FROM USER_SKILL AND SKILLS
$id =$_SESSION['user_id'];
$skills = $conn->prepare("SELECT user_skill.skill_level, skills.skill FROM user_skill INNER JOIN skills ON user_skill.skill_id = skills.id WHERE user_skill.user_id=$id");
$skills->execute();
// $s = $skills->fetch(PDO::FETCH_ASSOC);


$conn = null;
?>

<!DOCTYPE html>

<head>
    <title>User Profile | UM Alumni </title>
    <link rel="icon" href="./images/favicon.svg">
    <link rel="stylesheet" href="styles/manageAccount.css">
    <link rel="stylesheet" href="styles/style.css">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=width-device, inital-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

</head>

<body>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
        crossorigin="anonymous"></script>

    <!-- ===================================== Start Header Area ===================================== -->
    <?php
    include_once("navigation.php");
    ?>
    <!-- ===================================== End Header Area ===================================== -->


    <main class="flex-shrink-0">
        <div class="container">
            <div class="row gutters">
                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                    <div class="card-box h-100">
                        <div class="text-center">
                            <img src="images/avatar-2.png" width="30%" alt="icon"><br><br>
                            <?php 
                                echo '<h2>' . $row['full_name'] . '</h2>';
                            ?>

                        </div>
                        <hr>
                        
                        <div class="pt-3">
                            <h4 class="text-center mb-2">Skills</h4>
                            <?php 
                                while($s = $skills->fetch(PDO::FETCH_ASSOC)){
                                    echo '<h6>'. $s['skill'] .'<span class="float-right">'. ucfirst($s['skill_level']) .'</span></h6>';

                                    if($s['skill_level'] == "beginner"){
                                        echo '<div class="progress progress-sm my-2">
                                            <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="35" aria-valuemin="0"
                                                aria-valuemax="100" style="width: 35%">
                                            </div>
                                        </div>';
                                    }elseif($s['skill_level'] == "intermediate"){
                                        echo '<div class="progress progress-sm my-2">
                                            <div class="progress-bar bg-info" role="progressbar" aria-valuenow="65" aria-valuemin="0"
                                                aria-valuemax="100" style="width: 65%">
                                            </div>
                                        </div>';
                                    }elseif($s['skill_level'] == "advanced"){
                                        echo '<div class="progress progress-sm my-2">
                                            <div class="progress-bar bg-success" role="progressbar" aria-valuenow="85" aria-valuemin="0"
                                                aria-valuemax="100" style="width: 85%">
                                            </div>
                                        </div>';
                                    }
                                }
                            ?>
                            
                        </div>
                        <br>
                        <div class="text-center"> <a href="edit_profile.php?id='. $row['id'] . '"><button class="btn btn-warning">Edit</button></a>
                        </div>





                    </div>
                </div>
                <div class=" col-xl-8 col-lg-8 col-sm-12 ">
                    <div class="card-box h-100">
                        <div class="card-body">
                            <h5>EXPERIENCE</h5><br>
                            <a href="add_exps.php" class="btn btn-primary float-right mb-3">Add Experience</a>
                            
                            <div class="table-responsive">
                                <table id="data_table1" class="table table-borderless mb-0">

                                    <thead class="table-head">
                                        <tr class="center">
                                            <th>Year</th>
                                            <th>Description</th>
                                            <th>Edit</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php 
                                            while($xp = $experience->fetch(PDO::FETCH_ASSOC)){
                                                
                                                if($xp['statuses'] == 'current'){
                                                    echo '<tr class="table-row">
                                                            <td>'.$xp['year_start'].' </td>
                                                            <td>'.$xp['title']. '</td>
                                                            <td class="text-center">
                                                                <a class="ajax-action-links btn btn-success" href="edit_exps.php?id='. $xp['id'] . '">Edit</a> 
                                                                <a class="ajax-action-links btn btn-danger" href="delete_exps.php?id='. $xp['id'] . '">Delete</a> 
                                                            </td>
                                                        </tr>';
                                                }else{
                                                    echo '<tr class="table-row">
                                                            <td>'.$xp['year_start']. ' - ' .$xp['year_end'] .' </td>
                                                            <td>'.$xp['title']. '</td>
                                                            <td class="text-center">
                                                                <a class="ajax-action-links btn btn-success" href="edit_exps.php?id='. $xp['id'] . '">Edit</a>
                                                                <a class="ajax-action-links btn btn-danger" href="delete_exps.php?id='. $xp['id'] . '">Delete</a>  
                                                            </td>
                                                        </tr>';
                                                }
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <hr>

                            <h5>PROJECTS</h5>
                            <a href="add_project.php" class="btn btn-primary float-right mb-3"><i class="fa fa-plus"></i> Add Project</a>
                            
                            <br>
                            <div class="table-responsive">
                                <table id="data_table"class="table table-borderless mb-0">
                                    <thead class="table-head">
                                        <tr class="center" >

                                            <th>Project Name</th>
                                            <th>Date</th>
                                            <th>Edit</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php 
                                            while($p = $project->fetch(PDO::FETCH_ASSOC)){
                                                
                                                echo '<tr class="table-row">
                                                            <td>'.$p['name'].' </td>
                                                            <td>'.$p['start_date']. '</td>
                                                            <td class="text-center">
                                                                <a class="ajax-action-links btn btn-success" href="edit_project.php?id='. $p['id'] . '">Edit</a> 
                                                                <a class="ajax-action-links btn btn-danger" href="delete_project.php?id='. $p['id'] . '">Delete</a>  
                                                            </td>
                                                        </tr>';
                                            }
                                        ?>
                                    </tbody>

                                </table>
                            </div>
                       </div>

                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>


    <!-- ===================================== Start Footer Area ===================================== -->

    <?php
    include_once("footer.php");
    ?>

    <!-- ===================================== End Footer Area ===================================== -->
</body>

</html>