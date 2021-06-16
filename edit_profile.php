<?php
include_once("include/config.php");

if (session_status() === PHP_SESSION_NONE){
    session_start();
}

$id = $_SESSION['user_id'];
$result = $conn->prepare("SELECT * FROM users WHERE id =$id");
$result->execute();
$row = $result->fetch(PDO::FETCH_ASSOC);

// FETCH DATA FROM TABLE USER_SOCIAL_MEDIA AND SOCIAL_MEDIA
$id = $_SESSION['user_id'];
$countries = $conn->prepare("SELECT users.* , countries.country FROM users INNER JOIN countries ON users.country_id = countries.id WHERE users.id=$id");
$countries->execute();
$cou = $countries->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>

<head>
    <title>Edit User Profile | UM Alumni</title>
    <link rel="icon" href="./images/favicon.svg">
    <link rel="stylesheet" href="styles/editProfile.css">
    <link rel="stylesheet" href="styles/style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=width-device, inital-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script> -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- font awesome icons -->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet"
        type='text/css'>
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

    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
        crossorigin="anonymous"></script> -->

    <!-- ===================================== Start Header Area ===================================== -->
    <?php 
    include_once("navigation.php");
    ?>
    <!-- ===================================== End Header Area ===================================== -->


    <main class="flex-shrink-0">
        <div class="container ">
        <a href="profile.php" class="mb-3 text-dark"><< Go Back</a>
            <div class="row gutters">
                
                <?php if (isset($_GET['status']) && $_GET['status'] == "updated") : ?>
                <div class="alert alert-success" role="alert">
                    <strong>Updated ;)</strong>
                </div>
                <?php endif ?>
                <?php if (isset($_GET['status']) && $_GET['status'] == "fail_update") : ?>
                <div class="alert alert-danger" role="alert">
                    <strong>Fail Update :(</strong>
                </div>
                <?php endif ?>
                <div class="col-sm-12 d-flex justify-content-center ">
                    <form class="horizontal" action="process_edit_profile.php" method="POST">
                    
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3>Edit User Profile</h3>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="col-md-3">Profile picture</label>
                                    <div class="col-sm-12">
                                        <input type="file" class="form-control" id="profile_picture_url" name="profile_picture_url">
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label class="col-md-3">Name</label>
                                    <div class="col-sm-12">
                                        <input type="text" style="font-weight: bold;" class="form-control" id="full_name" name="full_name" placeholder="Enter your name" required value="<?php echo $row['full_name'] ?>">
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label class="col-md-3">Email address</label>
                                    <div class="col-sm-12">
                                        <input type="email" style="font-weight: bold;" class="form-control" id="email" name="email" placeholder="Enter your email address" value="<?php echo $row['email'] ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">Country</label>
                                    <div class="col-sm-12">
                                        <select id="country" name="country" class="custom-select" required>
                                                <option value=""><?php echo $cou['country'] ?></option>
                                                <?php
                                                    try {
                                                        $sql = "SELECT * from countries ORDER BY id ASC";
                                                        $country = $conn->query($sql);

                                                        while ($c = $country->fetch()) {
                                                            echo "<option value=\"".$c['id']."\">".$c['country']."</option>";
                                                        }
                                                            
                                                        $conn = null;
                                                    } catch(Exception $e) {
                                                        echo "<script>alert('Error: can't load countries')</script>";
                                                    }
                                                    
                                                ?>
                                            </select>
                                    </div>

                                </div>
                                
                                <br>
                                <hr><br>

                               
                                
                                <div class="form-group">
                                    <label class="col-md-3">Year Enrolled:</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="enroll_year" name="enroll_year" placeholder="Enter your year of study" value = "<?php echo $row['enroll_year']?>">
                                    </div>

                                </div>
                                
                                <div class="col-sm-12">

                                        <button id="submit" type="submit" class="btn btn-success" data-toggle="modal"
                                            data-target="#submitModal">Submit</button>
                                        <div class="modal fade" id="submitModal" tabindex=-1 role="dialog"
                                            aria-labelledby="submitModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="submitModalLabel">Submit your
                                                            profile</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <p>Your profile has been submitted!</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Cancel</button>
                                                        <button type="button" class="btn btn-primary"
                                                            data-dismiss="modal">OK</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <button type="button" id="cancel" class="btn btn-info" data-toggle="modal"
                                            data-target="#cancelModal">Cancel</button>
                                        <div class="modal fade" id="cancelModal" tabindex=-1 role="dialog"
                                            aria-labelledby=cancelModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="cancelModalLabel">Delete Your
                                                            Account</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Are you sure?</p>
                                                        <p>Changes made will not be saved</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Cancel</button>
                                                        <button type="button" class="btn btn-primary"
                                                            data-dismiss="modal" >Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                            


                                    </div>
                                <hr>

                                <div class="delete-section">
                                    <h3>Delete Account</h3>
                                    <p>Once you delete your account, there is no going back. Please be certain.                                    </p>

                                    <button type="button" class="btn btn-danger " data-toggle="modal"
                                    data-target="#deleteModal">Delete Account</button>

                                    <div class="modal fade" id="deleteModal" tabindex=-1 role="dialog"
                                        aria-labelledby="deleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel">Delete Your Account</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Cancel</button>
                                                    <button type="button" class="btn btn-primary"
                                                        data-dismiss="modal" href="delete_user.php?id='. $row['id'] . '">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                </div>

                                </div>
                                </div>

                                





                    </form>
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