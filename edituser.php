<?php
include_once("include/config.php");

include_once("include/userapprovalsystem.php");

if(isset($_GET['id'])) {	
    $id = $_GET['id'];

    $sql = "SELECT * FROM users, faculties, statuses, countries WHERE (faculties.id = users.fac_id AND statuses.id = users.status_id AND countries.id = users.country_id) AND users.id = $id";
    $result = $pdo->query($sql);

    $inp = $result->fetch();

    
}

if(isset($_POST['submit']) && isset($_POST['id'])) {	
    //The mysqli_real_escape_string() function escapes special characters in a string for use in an SQL statement.

    $eventimage = $_FILES['file'];

    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');

    echo "$fileSize";

    if(in_array($fileActualExt, $allowed)){
        if($fileError ===0){
            if($fileSize < 149627600){
                $fileNameNew = uniqid('', true).".".$fileActualExt;
                $fileDest = 'images/profile/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDest);
                

            }else{
                echo "File too big";
            }
        }else{
            echo "There was an error";
        }
    } else{
        echo "You cannot upload files of this type!";
    }

    $userid = $_POST['id'];
    $username = $_POST['name'];
    $useremail = $_POST['email'];
    $userpass = $_POST['pass'];
    $usergradyear = $_POST['gradyear'];
    $imagepath = $fileDest;
    $userenrollyear = $_POST['enrollyear'];
    $facultyid = $_POST['faculty'];
    $userstatusid = $_POST['status'];
    $usercountry = $_POST['country'];
    
    
    
      
    $sql = "SELECT * FROM countries";
    $country = $pdo->query($sql);
    $ispresentcountry = false;
    while ($coun = $country->fetch()) {
        if ($usercountry == $coun['country']){
            $ispresentcountry = true;
            break;
            
        }
            
    }
    

    if($ispresentcountry){
        try {
            // begin a transaction
            //header('Location: http://localhost/Online-alumni-system/approved.php?1');
            $pdo->beginTransaction();
            //header('Location: http://localhost/Online-alumni-system/approved.php?2');
            // a set of queries: if one fails, an exception will be thrown
            $sql = "UPDATE users SET full_name = '$username' , profile_picture_url = '$imagepath', email = '$useremail', password = '$userpass', grad_year = '$usergradyear', enroll_year = '$userenrollyear', fac_id = $facultyid, status_id = $userstatusid, country_id = (SELECT id FROM countries WHERE country = '$usercountry') WHERE id = '$userid'";
            echo "poopoo";
            $pdo->query($sql);
            // if we arrive here, it means that no exception was thrown
            // which means no query has failed, so we can commit the
            // transaction
            header('Location: http://localhost/Online-alumni-system/approved.php? ');
            $pdo->commit();
            echo "poopoo";
            
          } catch (Exception $e) {
            // we must rollback the transaction since an error occurred
            // with insert
            $pdo->rollback();
          }
    }
        // if all the fields are filled (not empty) 
        
        //Step 3. Execute the SQL query.	
        //insert data to database			
        
    
        //Step 4. Process the results.
        //display success message & the new data can be viewed on index.php
        

        
}

$sql = "select * from users, faculties, statuses WHERE (users.fac_id = faculties.id AND users.status_id = statuses.id) AND statuses.status = \"Approved\" order by users.id asc";
$result = $pdo->query($sql);

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
<body class="d-flex flex-column h-100">
    <!--Bootstrap js-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

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
        
    <div class="container py-5">
            <div class="formthing">
                <form action="edituser.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" hidden id="id" name="id" value = "<?php echo "".$inp['0'].""; ?>">

                        <label >User Name </label><br>
                        <input required type="text" id="name" name="name" class="form-control" placeholder="User Name" value="<?php echo "".$inp['full_name'].""; ?>">
                    </div>

                    <div class="form-group">
                        <label >User Email Address </label><br>
                        <input required type="text" id="email" name="email" class="form-control" placeholder="User Email" value="<?php echo "".$inp['email'].""; ?>">
                    </div>

                    <div class="form-group">
                        <label >Password </label><br>
                        <input required type="password" id="pass" name="pass" class="form-control" placeholder="" value="123456">
                    </div>

                    <div class="form-group">
                        <label >Re-type Password </label><br>
                        <input required type="password" id="rpass" name="rpass" class="form-control" placeholder="" value="123456">
                    </div>
                    
                    <div>
                        <label>Image</label><br>
                        <input type="file" id="file" name="file" class="form-control">
                    </div>

                    <div>
                        <label for="Country">Country</label><br>
                        <input required type="text" id="country" name="country" class="form-control" placeholder="User Country" value="<?php echo "".$inp['country'].""; ?>">
                    </div>

                    <div>
                        <label for="FacultySelect">Faculty</label><br>
                            <select class="form-control" id="faculty" name="faculty">
                                <option>...</option>
                                <!--
                                <option>Faculty of Arts and Social Sciences</option>
                                <option>Faculty of Built Environment</option>
                                <option>Faculty of Business and Accountancy</option>
                                <option>Faculty of Computer Science and Information Technology</option>
                                <option>Faculty of Creative Arts</option>
                                <option>Faculty of Dentistry</option>
                                <option>Faculty of Economics and Adminstration</option>
                                <option>Faculty of Education</option>
                                <option>Faculty of Engineering</option>
                                <option>Faculty of Law</option>
                                <option>Faculty of Language and Linguistics</option>
                                <option>Faculty of Medicine</option>
                                <option>Faculty of Pharmacy</option>
                                <option>Faculty of Science</option>
                                -->
                                    <?php

                                        $sql = "SELECT * FROM faculties";
                                        $faculty = $pdo->query($sql);
                                        $p = 1;
                                        while ($fac = $faculty->fetch()) {
                                            // the keys match the field names from the table
                                            
                                            if($p == $inp[7]){
                                                echo "<option value = $p selected=\"selected\">$fac[faculty]</option>";
                                            } else{
                                                echo "<option value = $p>$fac[faculty]</option>";
                                            }
                                            $p++;
                                        }

                                    ?>
                                
                            </select>
                    </div>

                    <div class="form-group">
                        <label >Class of </label><br>
                        <input required type="text" id="gradyear" name="gradyear" class="form-control" placeholder="Grade Year" value="<?php echo "".$inp['grad_year'].""; ?>">
                    </div>

                    <div class="form-group">
                        <label >Enroll Year </label><br>
                        <input required type="text" id="enrollyear" name="enrollyear" class="form-control" placeholder="Enroll Year" value="<?php echo "".$inp['enroll_year'].""; ?>">
                    </div>

                    <div>
                        <label for="Status">Status</label><br>
                            <select class="form-control" id="status" name="status">
                                <option>...</option>
                                
                                    <?php

                                        $sql = "SELECT * FROM statuses ORDER BY id asc";
                                        $result = $pdo->query($sql);
                                        $p = 1;
                                        while ($res = $result->fetch()) {
                                            // the keys match the field names from the table
                                            
                                            if($p == $inp[8]){
                                                echo "<option value = $p selected=\"selected\">$res[status]</option>";
                                            } else{
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

                </form>
                
    
            </div>
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
        $pdo = null;
    ?>

</body>
</html>