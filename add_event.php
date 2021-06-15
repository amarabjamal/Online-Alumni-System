<?php
    include_once("include/config.php");

    session_start();

    if(isset($_POST['submit'])) {	
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
                    

                }else{
                    echo "File too big";
                }
            }else{
                echo "There was an error";
            }
        } else{
            echo "You cannot upload files of this type!";
            header("Location: add_event.php?condition=imageerror");
            exit;
        }


        $eventname = $_POST['eventname'];
        $eventstartdate = $_POST['eventstartdate'];
        $eventenddate = $_POST['eventenddate'];
        $venue = $_POST['venue'];
        $eventbody = $_POST['body'];
        $imagepath = $fileDest;

        if($eventstartdate > $eventenddate){
            header("Location: add_event.php?condition=dateerror");
            exit;
        }
        
        echo "$eventname";
        echo "$eventstartdate";
        echo "$eventenddate<br>";
        echo "$venue";
        echo "$eventbody";
        echo "$imagepath";
            
        
            		
            try {
              
              $conn->beginTransaction();
              
              $sql = "INSERT INTO events(name,image_url,content, start_at, end_at, venue_id, admin_id) VALUES('$eventname','$imagepath','$eventbody','$eventstartdate','$eventenddate','$venue','$_SESSION[admin_id]')";
              $conn->query($sql);
              
              $conn->commit();
              header('Location: edit_event.php?action=addsuccess');
            } catch (Exception $e) {
              
              $conn->rollback();
            }
            

            
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

        <link rel="stylesheet" href="styles/page_error.css">

        
        <title>Alumni System</title>
    </head>
<body class="d-flex flex-column h-100 ">
    <!--Bootstrap js-->
    

    
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

        
        
        
        
        <div class="container py-5">
            <h2 class="banner-back">Create a new event</h2>

        </div>

        

        

        <div class="container">
            <div class="formthing">
                <form action="add_event.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label >Event Name</label><br>
                        <input required type="text" id="eventname" name="eventname" class="form-control" placeholder="Event Name">
                    </div>
                    
                    <?php if(isset($_GET['condition']) && $_GET['condition']=='imageerror'){ ?>
                        <div class="alert alert-danger" role="alert">
                        Warning: Image error
                        </div>
                    <?php } ?>

                    <div>
                        <label>Image</label><br>
                        <input type="file" id="file" name="file" class="form-control">
                    </div>

                    <?php if(isset($_GET['condition']) && $_GET['condition']=='dateerror'){ ?>
                        <div class="alert alert-danger" role="alert">
                        Warning: Invalid set of dates
                        </div>
                    <?php } ?>

                    <div>
                        <label> Date of Event Start</label><br>
                        <input type="datetime-local" id="eventstartdate" name="eventstartdate" class="form-control">
                    </div>

                    <div>
                        <label> Date of Event End</label><br>
                        <input type="datetime-local" id="eventstartdate" name="eventenddate" class="form-control">
                    </div>

                    <div>
                        <label for="VenueSelect">Venue</label><br>
                            <select class="form-control" id="venue" name="venue">
                                <?php

                                        $sql = "SELECT * FROM venues";
                                        $venues = $conn->query($sql);
                                        $p = 1;
                                        while ($ven = $venues->fetch()) {
                                            // the keys match the field names from the table
                                            
                                            if($ven['id'] == 19){
                                                echo "<option value = $p selected=\"selected\">$ven[venue]</option>";
                                            } else{
                                                echo "<option value = $p>$ven[venue]</option>";
                                            }
                                            $p += 1;
                                            
                                        }

                                    ?>
                                
                            </select>
                    </div>

                    <div>
                        <label >Content of Post</label>
                        <textarea name="body" id="body"></textarea>
                    </div>
                    
                    

                    <div class="py-3">
                        <button type="submit" class="btn btn-success btn-block" name="submit">Submit</button>
                    </div>

                </form>
                
    
            </div>
        </div>

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
    
    <script src="scripts/scripts.js"></script>
    
    <?php
        $conn = null;
    ?>

</body>
</html>
