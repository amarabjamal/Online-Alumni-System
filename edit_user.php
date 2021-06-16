<?php
include_once("include/config.php");

include_once("include/userapprovalsystem.php");

session_start();


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM users, faculties, statuses, countries WHERE (faculties.id = users.fac_id AND statuses.id = users.status_id AND countries.id = users.country_id) AND users.id = $id";
    $result = $conn->query($sql);

    $inp = $result->fetch();
}

if (isset($_POST['submit']) && isset($_POST['id'])) {
    

    $userid = $_POST['id'];

    $image = $_FILES['profile_photo'];

    if(isset($image)){
        
        

        $fileName = $_FILES['profile_photo']['name'];
        $fileTmpName = $_FILES['profile_photo']['tmp_name'];
        $fileSize = $_FILES['profile_photo']['size'];
        $fileError = $_FILES['profile_photo']['error'];
        $fileType = $_FILES['profile_photo']['type'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpg', 'jpeg', 'png');

        echo "$fileSize";

        if (in_array($fileActualExt, $allowed)) {
            if ($fileError === 0) {
                if ($fileSize < 149627600) {
                    $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                    $fileDest = 'images/profile/' . $fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDest);
                    header("Location: edit_user.php?id=$userid&condition=edit1");
                } else {
                    echo "File too big";
                }
            } else {
                echo "There was an error";
                header("Location: edit_user.php?id=$userid&condition=edit2");
                exit;
            }
        } else {
            echo "You cannot upload files of this type!";
            header("Location: edit_user.php?condition=imageerror");
            
            
        }

    $imagepath = $fileDest;
    }

    


    $username = $_POST['name'];
    $useremail = $_POST['email'];
    $usergradyear = $_POST['gradyear'];
    
    $userenrollyear = $_POST['enrollyear'];
    $facultyid = $_POST['faculty'];
    $userstatusid = $_POST['status'];
    $usercountry = $_POST['country'];

    


    if(! ($usergradyear > $userenrollyear)){
        header("Location: edit_user.php?id=$userid&validyears=false");
        exit;
    }





    if(in_array($fileActualExt, $allowed)){
        try {
            
            $conn->beginTransaction();
            
            $sql = "UPDATE users SET full_name = '$username' , profile_picture_url = '$imagepath', email = '$useremail', grad_year = '$usergradyear', enroll_year = '$userenrollyear', fac_id = '$facultyid', status_id = $userstatusid, country_id = '$usercountry' WHERE id = '$userid'";
            echo "poopoo";
            $conn->query($sql);
            
    
            $conn->commit();
            header('Location: http://localhost/Online-alumni-system/approved.php?image ');
            echo "poopoo";
        } catch (Exception $e) {
            
            $conn->rollback();
        }
    } else{
        try {
            
            $conn->beginTransaction();
            
            $sql = "UPDATE users SET full_name = '$username' , email = '$useremail', grad_year = '$usergradyear', enroll_year = '$userenrollyear', fac_id = $facultyid, status_id = $userstatusid, country_id = '$usercountry' WHERE id = '$userid'";
            echo "poopoo";
            $conn->query($sql);
            
    
            $conn->commit();
            header('Location: http://localhost/Online-alumni-system/approved.php?noimage ');
            echo "poopoo";
        } catch (Exception $e) {
            
            $conn->rollback();
        }
    }

    
}

if (isset($_POST['deleteacc']) && isset($_POST['id'])) {

    $did = $_POST['id'];
    try {
        
        $conn->beginTransaction();
        
        $sql = "DELETE FROM users WHERE id = $did";
        echo "poopoo";
        $conn->query($sql);
        

        $conn->commit();
        header('Location: http://localhost/Online-alumni-system/approved.php?action=accountdeleted ');
        echo "poopoo";
    } catch (Exception $e) {
        
        $conn->rollback();
    }
}

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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <title>Alumni System</title>
</head>

<body class="d-flex flex-column h-100">
    <!--Bootstrap js-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>



    <?php include_once("adminnavigation.php"); ?>

    <main>

        <div class="container py-5">
            <div class="formthing">
                <form action="edit_user.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" hidden id="id" name="id" value="<?php echo "" . $inp['0'] . ""; ?>">

                        <label>User Name </label><br>
                        <input required type="text" id="name" name="name" class="form-control" placeholder="User Name" value="<?php echo "" . $inp['full_name'] . ""; ?>">
                    </div>

                    <div class="form-group pb-5">
                        <label>User Email Address </label><br>
                        <input required type="email" id="email" name="email" class="form-control" placeholder="User Email" value="<?php echo "" . $inp['email'] . ""; ?>">
                    </div>


                    <div id="profile-container">
                        <h2>Current Image</h2>
                        <?php if (isset($inp['profile_picture_url'])) { ?>

                            <img src="<?php echo $inp['profile_picture_url']; ?>" id="profileImage" alt="Profile picture" />

                        <?php } else { ?>

                            <image id="profileImage" src="" />

                        <?php } ?>
                    </div>

                    To change image, upload file below <br>
                    <input id="imageUpload" type="file" name="profile_photo" placeholder="Photo" capture>


                    <script>
                        $("#profileImage").click(function(e) {
                            $("#imageUpload").click();
                        });

                        function fasterPreview(uploader) {
                            if (uploader.files && uploader.files[0]) {
                                $('#profileImage').attr('src',
                                    window.URL.createObjectURL(uploader.files[0]));
                            }
                        }

                        $("#imageUpload").change(function() {
                            fasterPreview(this);
                        });
                    </script>

                    <!--
                    <div class="pt-5">
                        <label>Image</label><br>
                        <input type="file" id="file" name="file" class="form-control">
                    </div>
                    -->

                    <div class="pt-5">
                        <label for="Country">Country</label><br>
                        <select class="form-control" id="country" name="country">
                            
                            <?php

                            $sql = "SELECT * FROM countries";
                            $country = $conn->query($sql);
                            $p = 1;
                            while ($coun = $country->fetch()) {
                                // the keys match the field names from the table

                                if ($p == $inp['country_id']) {
                                    echo "<option value = $p selected=\"selected\">$coun[country]</option>";
                                } else {
                                    echo "<option value = $p>$coun[country]</option>";
                                }
                                $p++;
                            }

                            ?>

                        </select>
                    </div>

                    <div>
                        <label for="FacultySelect">Faculty</label><br>
                        <select class="form-control" id="faculty" name="faculty">
                            
                            <?php

                            $sql = "SELECT * FROM faculties";
                            $faculty = $conn->query($sql);
                            $p = 1;
                            while ($fac = $faculty->fetch()) {
                               

                                if ($p == $inp[7]) {
                                    echo "<option value = $p selected=\"selected\">$fac[faculty]</option>";
                                } else {
                                    echo "<option value = $p>$fac[faculty]</option>";
                                }
                                $p++;
                            }

                            ?>

                        </select>
                    </div>

                    <?php if(isset($_GET['validyears']) && $_GET['validyears']=='false'){ ?>
                        <div class="alert alert-danger" role="alert">
                        Warning: Graduation Year must be after Enroll Year
                        </div>
                    <?php } ?>

                    <div class="form-group">
                        <label>Class of </label><br>
                        <input required type="text" id="gradyear" maxlength="4" name="gradyear" class="form-control" placeholder="Grade Year" value="<?php echo "" . $inp['grad_year'] . ""; ?>">
                    </div>

                    <div class="form-group">
                        <label>Enroll Year </label><br>
                        <input required type="text" id="enrollyear" maxlength="4" name="enrollyear" class="form-control" placeholder="Enroll Year" value="<?php echo "" . $inp['enroll_year'] . ""; ?>">
                    </div>

                    <div>
                        <label for="Status">Status</label><br>
                        <select class="form-control" id="status" name="status">
                            <?php

                            $sql = "SELECT * FROM statuses ORDER BY id asc";
                            $result = $conn->query($sql);
                            $p = 1;
                            while ($res = $result->fetch()) {
                                // the keys match the field names from the table

                                if ($p == $inp[8]) {
                                    echo "<option value = $p selected=\"selected\">$res[status]</option>";
                                } else {
                                    echo "<option value = $p>$res[status]</option>";
                                }
                                $p++;
                            }

                            ?>

                        </select>
                    </div>






                    <div class="py-3">
                        <button type="submit" class="btn btn-success btn-block" name="submit">Submit</button>
                    </div>

                    <div class="">
                        <button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#deleteModal">Delete Account</button>

                        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel">Confirmation</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete the account?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger" name="deleteacc">Delete Account</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <!--
                    <div class="">
                        <a href="https://google.com" class="btn btn-primary btn-block">Reset Password</a>
                    </div>
                    -->
                </form>

                <form action="adminresetpassword.php" method="post">
                    <input type="text" name="resetaccid" value="<?php echo "" . $inp['0'] . ""; ?>" hidden>
                    <input type="submit" class="btn btn-primary btn-block" value="Reset Password">
                </form>




            </div>
        </div>

    </main>


    <footer id="control">
        <div class="bg-dark py-4">
            <div class="container text-center">
                <p class="text-muted mb-0 py-2">&copy; <script>
                        document.write(new Date().getFullYear())
                    </script> UM Alumni All rights reserved.</p>
            </div>
        </div>
    </footer>

    <?php
    $conn = null;
    ?>

</body>

</html>