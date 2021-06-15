<?php

//database connection
include_once("include/config.php");

if(session_status() === PHP_SESSION_NONE){
    session_start();
} 

// FETCH DATA FROM TABLE USER
$id = $_GET['id'];
$result = $conn->prepare("SELECT * FROM users WHERE id =:id");
$result->bindParam(":id",$id);
$result->execute();
$row = $result->fetch(PDO::FETCH_ASSOC);

// FETCH DATA FROM TABLE FACULTIES
$f = $row['fac_id'];
$faculty = $conn->prepare("SELECT faculties.id, faculties.faculty FROM users INNER JOIN faculties ON faculties.id= users.fac_id WHERE users.fac_id=$f");
$faculty->execute();
$fac = $faculty->fetch(PDO::FETCH_ASSOC);

// FETCH DATA FROM TABLE USER_SOCIAL_MEDIA AND SOCIAL_MEDIA
$id = $row['id'];
$socialmedia = $conn->prepare("SELECT user_social_media.user_id, user_social_media.social_media_id, user_social_media.username , social_media.name FROM user_social_media INNER JOIN social_media ON user_social_media.social_media_id = social_media.id WHERE user_social_media.user_id=$id");
$socialmedia->execute();

// FETCH DATA FROM TABLE EXPS 
$id = $_GET['id'];
$experience = $conn->prepare("SELECT title, statuses, year_start, year_end FROM exps WHERE user_id='$id'");
$experience->execute();

// ATTEMPT 1
// FETCH DATA FROM PROJECTS
$id = $_GET['id'];
$project = $conn->prepare("SELECT * FROM projects WHERE user_id='$id'");
$project->execute();
$p = $project->fetchAll(PDO::FETCH_ASSOC);

// FETCH DATA FROM USER_SKILL AND SKILLS
$id = $row['id'];
$skills = $conn->prepare("SELECT user_skill.skill_id, user_skill.projects_id, skills.skill FROM user_skill INNER JOIN skills ON user_skill.skill_id = skills.id WHERE user_skill.user_id=$id");
$skills->execute();
$s = $skills->fetchAll(PDO::FETCH_OBJ);

// ATTEMPT 2
// FETCH DATA FROM PROJECTS, USER_SKILL AND SKILLS
// $id = $_GET['id'];
// $xproject = $conn->prepare("SELECT projects.*, skills.skill, user_skill.skill_id, user_skill.projects_id FROM(user_skill INNER JOIN skills ON  skills.id = user_skill.skill_id) INNER JOIN projects ON user_skill.projects_id = projects.id WHERE projects.user_id=$id");
// $xproject->execute();
// $pxs = $xproject->fetchAll(PDO::FETCH_ASSOC);

// foreach($pxs as $result){
//     // $arr[$item['projects_id']][] = $item;
//     echo $result['projects_id'] . '>' . $result['skill'] . '<br>' ;
// }


//close connection
$conn = null;
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Alumni | UM Alumni </title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- font awesome icons -->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet"
        type='text/css'>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="styles/profile.css">
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



    <div class="row profile-card">
        <p class="back">
            <img src="images/arrow-left-short.svg" alt="go back" width="30px" height="30px" style="margin: auto;">
            <a href="alumni.php">back</a>
        </p>

        <div class="col-md-4 right-pane">

            <div class="row p1">
                <div class="avatar">
                    <img src="images/avatar.png" alt="profile-picture">
                </div>

                <div class="socmed">
                    <?php 
                        while ($s = $socialmedia->fetch(PDO::FETCH_ASSOC)){
                            // echo $s['social_media_id'];
                            if ($s['social_media_id'] == 1){
                                echo '<a href=/facebook/'.$s['username'].'><i
                                class="fa fa-facebook-official fa-2x bg-transparent"></i></a>';

                            }elseif ($s['social_media_id'] == 2){
                                echo '<a href=/twitter/'.$s['username'].'><i
                                class="fa fa-twitter fa-2x bg-transparent"></i></a>';

                            }elseif ($s['social_media_id'] == 3){
                                echo '<a href=/linkedin/'.$s['username'].'><i
                                class="fa fa-linkedin-square fa-2x bg-transparent"></i></a>';
                            }elseif ($s['social_media_id'] == 4){
                                echo '<a href=/github/'.$s['username'].'><i
                                class="fa fa-github fa-2x bg-transparent"></i></a>';
                            }elseif ($s['social_media_id'] == 5){
                                echo '<a href=/email/'.$s['username'].'><i
                                class="fa fa-envelope fa-2x bg-transparent"></i></a>';
                            }else {
                                echo "Null";
                            }
                        }
                    ?>
                </div>
            </div>

            <div class="row p2">
                <div class="details">
                    <h2><?php echo htmlspecialchars($row['full_name']); ?></h2>
                    <p class="about-me">About Me</p>
                    <p><?php echo htmlspecialchars($fac['faculty']); ?></p>
                    <p><?php echo htmlspecialchars($row['grad_year']); ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-8 left-pane">
            <h1 class="title">Experience</h1>
            <div class="card shadow">
                <div class="card-body">
                    <?php 
                        while($xp = $experience->fetch(PDO::FETCH_ASSOC)){
                            if($xp['statuses'] == "current"){
                                echo '<h5 class="card-title">Current</h5>';
                                echo '<p class="card-text">'.$xp['title'].'</p>';
                            }elseif($xp['statuses'] == "past"){
                                // echo '<h5 class="card-title">Past</h5>';
                                echo'<div class="timeline-items">
                                        <div class="timeline-item">
                                            <div class="timeline-dot"></div>
                                            <div class="timeline-date">Year '.$xp['year_start']. '-' .$xp['year_end']. '</div>
                                            <div class="mb-2 timeline-content">
                                                <h3>'.$xp['title'].'</h3>
                                            </div>
                                        </div>
                                    </div>';
                            }elseif(is_null($xp['statuses'])){
                                echo '<p>Information not available</p>';
                            }
                        }
                    ?>
                </div>
            </div>

            <h1 class="title" style="margin-top:20px;">University Project</h1>
            <?php 
                //ATTEMPT 1
                // foreach($pxs as $result  => $v){
                //     echo '<div class="card project-float shadow">
                //             <div class="row no-gutters">
                //                 <div class="col-md-4">
                //                     <div class="card-body">
                //                         <p class="card-subtitle mb-2 text-muted">'.$v['start_date'].'</p>
                //                         <h4 class="card-title">'.$v['name'].'</h4>
                //                     </div>
                //                 </div>
                //                 <div class="col-md-8">
                //                     <div class="card-body">';
                //                         // if ($s['projects_id'] == $sres['id'] ){
                //                         //     echo $s['projects_id'];
                //                         //     // echo '<span class="badge badge-pill mr-2" style="background-color: #b8e994;">'.$s['skill'].'</span>';
                //                         //     foreach($s as $res){
                //                         //         echo $res['skill'];
                //                         //     }
                                            
                //                         // }
                                        
                //                         echo '<p class="card-text mt-2">'.$v['content'].'</p>

                //                     </div>
                //                 </div>
                //             </div>
                //         </div>';
                //     // echo $v['user_id'] . '>' . $v['projects_id'] . '>' . $v['skill'] . '<br>' ;
                // }

                foreach($p as $sres){
                    echo '<div class="card project-float shadow">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <div class="card-body">
                                        <p class="card-subtitle mb-2 text-muted">'.$sres['start_date'].'</p>
                                        <h4 class="card-title">'.$sres['name'].'</h4>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">';
                                        
                                        // foreach($s as $res){
                                        //     echo $res['projects_id'] . $sres['id'] . $res['skill'];
                                        //     // if($res['projects_id'] == $sres['id']){
                                        //     //     echo $res['projects_id'] . $sres['id'] . $res['skill'];
                                        //     // }
                                            
                                        // }
                                        if (is_array($s) || is_object($s)){
                                            foreach($s as $res){
                                                // echo $res['skill'];
                                                if ($res['projects_id'] == $sres['id'] ){
                                                    echo '<span class="badge badge-pill mr-2" style="background-color: #b8e994;">'.$res['skill'].'</span>';
                                                }
                                            }
                                        }else {
                                            echo "Unfortunately, an error occured.";
                                        }

                                        echo '<p class="card-text mt-2">'.$sres['content'].'</p>

                                    </div>
                                </div>
                            </div>
                        </div>';
                }
                ?>

        </div>
    </div>

    <!-- ===================================== Start Footer Area ===================================== -->

    <?php include_once("footer.php"); ?>

    <!-- ===================================== End Footer Area ===================================== -->

</body>

</html>