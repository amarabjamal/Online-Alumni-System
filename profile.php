<?php
include_once("include/config.php");

session_start();

$result = $conn->prepare("SELECT * FROM users ");
$result->execute();
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
                    <div class="card-box  ">
                        <div class="text-center">
                            <img src="images/avatar-2.png" width="30%" alt="icon"><br><br>
                            <?php 
                            
                            ?>

                        </div>
                        <hr>
                        <div class="pt-3">
                            <h4 class="text-center">Skills</h4>
                            <h6>HTML5<span class="float-right">Intermediate</span></h6>
                            <div class="progress progress-sm m-0">
                                <div class="progress-bar" role="progressbar" aria-valuenow="85" aria-valuemin="0"
                                    aria-valuemax="100" style="width: 85%">
                                    <span class="sr-only">90% Complete</span>

                                </div>
                            </div>
                        </div>
                        <div class="mt-2 pt-1">
                            <h6>PHP<span class="float-right">Intermediate</span></h6>
                            <div class="progress progress-sm m-0">
                                <div class="progress-bar" role="progressbar" aria-valuenow="67" aria-valuemin="0"
                                    aria-valuemax="100" style="width: 67%">
                                    <span class="sr-only">67% Complete</span>

                                </div>
                            </div>
                        </div>
                        <div class="mt-2 pt-1">
                            <h6>Javascript<span class="float-right">Intermediate</span></h6>
                            <div class="progress progress-sm m-0">
                                <div class="progress-bar" role="progressbar" aria-valuenow="67" aria-valuemin="0"
                                    aria-valuemax="100" style="width: 67%">
                                    <span class="sr-only">67% Complete</span>

                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="text-center"> <a href="editProfile.html"><button class="edit">Edit</button></a>
                        </div>





                    </div>



                </div>
                <div class=" col-xl-8 col-lg-8 col-sm-12 ">
                    <div class="card-box">
                        <div class="card-body">
                            <h5>EXPERIENCE</h5><br>
                            <script type="text/javascript" src="scripts/edit_table.js"></script>
                            <div class="table-responsive">
                                <table id="data_table1" class="table table-borderless mb-0">
                                    <thead class="table-head">
                                        <tr class="center">

                                            <th>Description</th>
                                            <th>Year</th>
                                            <th>Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr id="row1">

                                            <td id="desc1">Internship at ...</td>
                                            <td id="year1">2020-2021</td>
                                            <td class="center">
                                                <input type="button" id="edit_btn1" value="Edit" class="edit"
                                                    onclick="edit_row('1')">
                                                <input type="button" id="save_btn1" value="Save" class="save"
                                                    onclick="save_row('1')">
                                                <input type="button" id="del_btn1" value="Delete" class="delete"
                                                    onclick="delete_row('1')">
                                            </td>

                                        </tr>
                                        <tr>
                                            <td><input type="text" id="new_desc"></td>
                                            <td><input type="text" id="new_year"></td>
                                            <td class="center"><input type="button" class="add" onclick="add_row();" value="Add"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <hr>

                            <h5>PROJECTS</h5><br>
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
                                        <tr id=row1>

                                            <td id="project_name1">Online Alumni System</td>
                                            <td id="date1">5.06.2020</td>
                                            <td class="center">
                                                <input type="button" id="edit_btn1" value="Edit" class="edit"
                                                    onclick="edit_r('1')">
                                                <input type="button" id="save_btn1" value="Save" class="save"
                                                    onclick="save_r('1')">
                                                <input type="button" id="del_btn1" value="Delete" class="delete"
                                                    onclick="delete_r('1')">
                                            </td>

                                        </tr>
                                        <tr id=row2>

                                            <td id="project_name2">Feseni UM</td>
                                            <td id="date2">7.11.2020</td>
                                            <td class="center">
                                                <input type="button" id="edit_btn1" value="Edit" class="edit"
                                                    onclick="edit_r('2')">
                                                <input type="button" id="save_btn1" value="Save" class="save"
                                                    onclick="save_r('2')">
                                                <input type="button" id="del_btn1" value="Delete" class="delete"
                                                    onclick="delete_r('2')">
                                            </td>

                                        </tr>
                                        <tr>
                                            <td><input type="text" id="new_project"></td>
                                            <td><input type="text" id="new_date"></td>
                                            <td class="center"><input type="button" class="add" onclick="add_r();" value="Add"></td>
                                        </tr>


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