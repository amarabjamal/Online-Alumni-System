<?php
    include_once("include/config.php");

    session_start();

    if(isset($_POST['submit']) && isset($_POST['eventid'])) {	
        

        $eventid = $_POST['eventid'];

        $eventimage = $_FILES['file'];

        $image = $_FILES['file'];

        if(isset($image)){
            
            

            $fileName = $_FILES['file']['name'];
            $fileTmpName = $_FILES['file']['tmp_name'];
            $fileSize = $_FILES['file']['size'];
            $fileError = $_FILES['file']['error'];
            $fileType = $_FILES['file']['type'];

            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));

            $allowed = array('jpg', 'jpeg', 'png');

            echo "$fileSize";

            if (in_array($fileActualExt, $allowed)) {
                if ($fileError === 0) {
                    if ($fileSize < 149627600) {
                        $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                        $fileDest = 'images/event/' . $fileNameNew;
                        move_uploaded_file($fileTmpName, $fileDest);
                        header("Location: edit_event2.php?id=$eventid&condition=edit1");
                    } else {
                        echo "File too big";
                    }
                } else {
                    echo "There was an error";
                    header("Location: edit_event2.php?id=$eventid&condition=edit2");
                    exit;
                }
            } else {
                echo "You cannot upload files of this type!";
                header("Location: edit_event2.php?id=$eventid&condition=imageerror");
                
                
                
            }

        $imagepath = $fileDest;
        }

        
        $eventname = $_POST['eventname'];
        $eventstartdate = $_POST['eventstartdate'];
        $eventenddate = $_POST['eventenddate'];
        $venue = $_POST['venue'];
        $eventbody = $_POST['body'];
        $imagepath = $fileDest;
        
        echo "$eventname";

        if($eventstartdate > $eventenddate){
            header("Location: edit_event2.php?id=$eventid&condition=dateerror");
            exit;
        }
            
        
        if(in_array($fileActualExt, $allowed)){

            try {

                $conn->beginTransaction();

                $sql = "UPDATE events SET name = '$eventname', image_url = '$imagepath', content = '$eventbody', start_at = '$eventstartdate', end_at = '$eventenddate', venue_id= '$venue', admin_id = '$_SESSION[admin_id]' WHERE id = '$eventid'";
                echo "poopoo";
                $conn->query($sql);

                
                $conn->commit();
                header('Location: edit_event.php?action=image');
                echo "poopoo";
              } catch (Exception $e) {

                $conn->rollback();
              }
        } else{
            try {

                $conn->beginTransaction();

                $sql = "UPDATE events SET name = '$eventname', content = '$eventbody', start_at = '$eventstartdate', end_at = '$eventenddate', venue_id= '$venue', admin_id = '$_SESSION[admin_id]' WHERE id = '$eventid'";

                $conn->query($sql);

                
                $conn->commit();
                header('Location: edit_event.php?action=noimage');

              } catch (Exception $e) {

                $conn->rollback();
              }
        }
        

            

            
    }

    if(isset($_GET['id'])) {	
        $id = $_GET['id'];

        $sql = "SELECT * FROM events, venues WHERE venues.id = events.venue_id AND events.id = $id";
        $result = $conn->query($sql);

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

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

        
        <title>Alumni System</title>
    </head>
<body class="d-flex flex-column h-100 ">
    <!--Bootstrap js-->
    

    
    <?php include_once("adminnavigation.php"); ?>
    

    <main>
        
        
        
        <div class="container py-5">
            <h2 class="banner-back">Edit event</h2>

        </div>

        

        

        <div class="container">
            <div class="formthing">
                <form action="edit_event2.php" method="post" enctype="multipart/form-data">
                    <div class="form-group pb-5">
                        <input type="text" hidden id="eventid" name="eventid" value = "<?php echo "".$inp['0'].""; ?>">
                        <label >Event Name </label><br>
                        <input required type="text" id="eventname" name="eventname" class="form-control" placeholder="Event Name" value="<?php echo "".$inp['name'].""; ?>">
                    </div>
                    



                    <?php if(isset($_GET['condition']) && $_GET['condition']=='imageerror'){ ?>
                        <div class="alert alert-danger" role="alert">
                        Warning: Image error
                        </div>
                    <?php } ?>

                    <div id="profile-container">
                        <h2>Current Image</h2>
                        <?php if (isset($inp['image_url'])) { ?>

                            <img src="<?php echo $inp['image_url']; ?>" id="profileImage" alt="Profile picture" />

                        <?php } else { ?>

                            <image id="profileImage" src="" />

                        <?php } ?>
                    </div>

                    To change image, upload file below <br>
                    <input id="imageUpload" type="file" name="file" placeholder="Photo" capture>


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
                    <div>
                        <label>Image</label><br>
                        <input type="file" id="file" name="file" class="form-control">
                    </div>
                    -->



                    

                    <div class="pt-5">
                        <label> Date of Event Start </label><br>
                        <input type="datetime-local" id="eventstartdate" name="eventstartdate" class="form-control" value="<?php echo "".$inp['start_at'].""; ?>">
                    </div>

                    <div>
                        <label> Date of Event End</label><br>
                        <input type="datetime-local" id="eventstartdate" name="eventenddate" class="form-control" value="<?php echo "".$inp['end_at'].""; ?>">
                    </div>

                    <?php if(isset($_GET['condition']) && $_GET['condition']=='dateerror'){ ?>
                        <div class="alert alert-danger" role="alert">
                        Warning: Invalid set of dates
                        </div>
                    <?php } ?>

                    <div>
                        <label for="VenueSelect">Venue</label><br>
                            <select class="form-control" id="venue" name="venue">
                                <?php

                                        $sql = "SELECT * FROM venues";
                                        $venues = $conn->query($sql);
                                        $p = 1;
                                        while ($ven = $venues->fetch()) {
                                            // the keys match the field names from the table
                                            
                                            if($ven['id'] == $inp['venue_id']){
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
                        <textarea name="body" id="body"><?php echo "".$inp['content'].""; ?></textarea>
                    </div>
                    
                    

                    <div class="py-3">
                        <button type="submit" class="btn btn-success btn-block" name="submit">Submit</button>
                    </div>

                </form>
                
    
            </div>
        </div>

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
