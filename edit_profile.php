<?php
session_start();

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
    <header>
    <?php 
    
    include_once("navigation.php");

    ?>

    </header>
    <!-- ===================================== End Header Area ===================================== -->


    <main class="flex-shrink-0">
        <div class="container ">
            <div class="row gutters">
                <div class="col-sm-12 d-flex justify-content-center ">
                    <form class="horizontal" action="profile.php" method="POST">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3>Edit User Profile</h3>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="col-md-3">Profile picture</label>
                                    <div class="col-sm-12">
                                        <input type="file" class="form-control">
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label class="col-md-3">Name</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" placeholder="Enter your name">
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label class="col-md-3">Email address</label>
                                    <div class="col-sm-12">
                                        <input type="email" class="form-control" placeholder="Enter your email address">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Country</label>
                                    <div class="col-sm-12">
                                        <select class="form-control">
                                            <option selected="">Select country</option>
                                            <option>Bangladesh</option>
                                            <option>Brunei</option>
                                            <option>China</option>
                                            <option>Egypt</option>
                                            <option>India</option>
                                            <option>Indonesia</option>
                                            <option>Japan</option>
                                            <option>Malaysia</option>
                                            <option>Nigeria</option>
                                            <option>Pakistan</option>
                                            <option>Philipines</option>
                                            <option>Qatar</option>
                                            <option>Saudi Arabia</option>
                                            <option>Singapore</option>
                                            <option>Thailand</option>
                                            <option>United Arab Emirates</option>
                                            <option>United States</option>


                                        </select>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label class="col-md-3">Company Name</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" placeholder="Enter your company name">

                                    </div>

                                </div>
                                <div class="form-group">
                                    <label class="col-md-3">Position</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control"
                                            placeholder="Enter your position at the company">
                                    </div>
                                </div>
                                <br>
                                <hr><br>

                                <div class="form-group">
                                    <label class="col-md-3">Faculty</label>
                                    <div class="col-sm-12">
                                        <select class="form-control">
                                            <option selected="">Select faculty</option>
                                            <option>Faculty of Education</option>
                                            <option>Faculty of Dentistry</option>
                                            <option>Faculty of Engineering</option>
                                            <option>Faculty of Science</option>
                                            <option>Faculty of Law</option>
                                            <option>Faculty of Medicine</option>
                                            <option>Faculty of Arts and Social Sciences</option>
                                            <option>Faculty of Business and Accountancy</option>
                                            <option>Faculty of Economics and Administration</option>
                                            <option>Faculty of Languages and Linguistics</option>
                                            <option>Faculty of Built Environment</option>
                                            <option>Faculty of Computer Science and Information Technology</option>
                                            <option>Faculty of Pharmacy</option>
                                            <option>Faculty of Creative Arts</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3">Major</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" placeholder="Enter your major">
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label class="col-md-3">Year of study</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" placeholder="Enter your year of study">
                                    </div>

                                </div>
                                <br>
                                <div class="form-group">
                                    <div class="col-sm-12">

                                        <button id="submit"type="button" class="btn btn-success" data-toggle="modal"
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
                                                            data-dismiss="modal">Submit</button>
                                                    </div>
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
                                                        data-dismiss="modal">Submit</button>
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
</body>

</html>