<?php
    include_once("include/config.php");

    if(isset($_POST['submit']) && isset($_POST['eventid'])) {	
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
                    $fileDest = 'images/event/'.$fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDest);
                    header("Location: editevent.php?uploadsuccess");

                }else{
                    echo "File too big";
                }
            }else{
                echo "There was an error";
            }
        } else{
            echo "You cannot upload files of this type!";
        }

        $eventid = $_POST['eventid'];
        $eventname = $_POST['eventname'];
        $eventstartdate = $_POST['eventstartdate'];
        $eventenddate = $_POST['eventenddate'];
        $venue = $_POST['venue'];
        $eventbody = $_POST['body'];
        $imagepath = $fileDest;
        
        echo "$eventname";
            
        
            // if all the fields are filled (not empty) 
            
            //Step 3. Execute the SQL query.	
            //insert data to database			
            try {
              // begin a transaction
              $pdo->beginTransaction();
              // a set of queries: if one fails, an exception will be thrown
              $sql = "UPDATE events SET name = '$eventname', image_url = '$imagepath', content = '$eventbody', start_at = '$eventstartdate', end_at = '$eventenddate', venue_id= (SELECT id FROM venues WHERE venue = '$venue'), admin_id = 1 WHERE id = '$eventid'";
              echo "poopoo";
              $pdo->query($sql);
              // if we arrive here, it means that no exception was thrown
              // which means no query has failed, so we can commit the
              // transaction
              header('Location: http://localhost/Online-alumni-system/editevent.php?sucess');
              $pdo->commit();
              echo "poopoo";
            } catch (Exception $e) {
              // we must rollback the transaction since an error occurred
              // with insert
              $pdo->rollback();
            }
        
            //Step 4. Process the results.
            //display success message & the new data can be viewed on index.php
            

            header('Location: http://localhost/Online-alumni-system/editevent.php');
    }

    if(isset($_GET['id'])) {	
        $id = $_GET['id'];

        $sql = "SELECT * FROM events, venues WHERE venues.id = events.venue_id AND events.id = $id";
        $result = $pdo->query($sql);

        $inp = $result->fetch();

        $inp['start_at'] = str_replace(" ", "T", $inp['start_at']) ;
        $inp['end_at'] = str_replace(" ", "T", $inp['end_at']) ;
        $inp['content'] = str_replace( '&', '&amp;', $inp['content'] );
    }
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
    

    <main>
        
        
        
        <div class="container py-5">
            <h2 class="banner-back">Create a new event</h2>

        </div>

        

        

        <div class="container">
            <div class="formthing">
                <form action="editevent2.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" hidden id="eventid" name="eventid" value = "<?php echo "".$inp['0'].""; ?>">
                        <label >Event Name </label><br>
                        <input required type="text" id="eventname" name="eventname" class="form-control" placeholder="Event Name" value="<?php echo "".$inp['name'].""; ?>">
                    </div>
                    
                    <div>
                        <label>Image</label><br>
                        <input type="file" id="file" name="file" class="form-control">
                    </div>

                    <div>
                        <label> Date of Event Start </label><br>
                        <input type="datetime-local" id="eventstartdate" name="eventstartdate" class="form-control" value="<?php echo "".$inp['start_at'].""; ?>">
                    </div>

                    <div>
                        <label> Date of Event End</label><br>
                        <input type="datetime-local" id="eventstartdate" name="eventenddate" class="form-control" value="<?php echo "".$inp['end_at'].""; ?>">
                    </div>

                    <div>
                        <label for="VenueSelect">Venue</label><br>
                            <select class="form-control" id="venue" name="venue">
                                <option>...</option>
                                <option>Microsoft Teams</option>
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
                                
                            </select>
                    </div>

                    <div>
                        <label >Content of Post</label>
                        <textarea name="body" id="body"><?php echo "".$inp['content'].""; ?></textarea>
                    </div>
                    
                    

                    <div class="py-3">
                        <button type="submit" class="btn btn-success btn-block" name="submit">Submit</button>
                    </div>

                </form>
                
    
            </div>
        </div>

    </main>

    <!--
    <footer id="control">
        <div class="bg-dark py-4">
            <div class="container text-center">
                <p class="text-muted mb-0 py-2">&copy; <script>document.write(new Date().getFullYear())</script> UM Alumni All rights reserved.</p>
            </div>
        </div>
    </footer>
    -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <script src="https://cdn.ckeditor.com/ckeditor5/27.0.0/classic/ckeditor.js"></script>
    
    <script src="scripts/scripts.js"></script>
    
    <?php
        $pdo = null;
    ?>

</body>
</html>
