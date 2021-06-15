<?php
include_once("include/config.php");

session_start();


?>

<!DOCTYPE HTML>

<head>
    <title>Edit Experience | UM Alumni </title>
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

    <?php include_once(navigation.php); ?>

    <main class="flex-shrink-0">
        <div class="container">
            <div class="row gutters">
                <div class="col-sm">
                    <a href="profile.php" class="mb-3 text-dark"><< Back</a>
                    <div class="card-box">
                                <div class="card-body">
                                    <h5>EXPERIENCE</h5><br>
                                    <?php if (isset($_GET['status']) && $_GET['status'] == "updated") : ?>
                                        <div class="alert alert-success" role="alert">
                                            <strong>Created</strong>
                                        </div>
                                    <?php endif ?>
                                    <?php if (isset($_GET['status']) && $_GET['status'] == "fail_update") : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <strong>Fail Create</strong>
                                        </div>
                                    <?php endif ?>
                                    <div class="table-responsive">
                                        <form  action="update_exps.php" method="POST">

                                            <table id="data_table1" class="table table-borderless mb-0">

                                                <thead class="table-head">
                                                    <tr class="center">
                                                        <th>Status</th>
                                                        <th>Year Start</th>
                                                        <th>Year End</th>
                                                        <th>Description</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <tr class="table-row">
                                                        <td><input type="text" class="form-control" id="status" name="statuses" placeholder="Current / Past?"></td>
                                                        <td><input type="text" class="form-control" id="year_start" name="year_start" placeholder="Year Start"></td>
                                                        <td><input type="text" class="form-control" id="year_end" name="year_end" placeholder="Year End"></td>
                                                        <td><input type="text" class="form-control" id="title" name="title" placeholder="Description"></td>
                                                    </tr>
                                                </tbody>
                                                
                                            </table>
                                            <button type="submit" class="btn btn-success">Save</button>
                                        </form>
                                        
                                    </div>
                                    <hr>

                                </div>

                            </div>
                    </div>
                </div>
        </div>
        </div>
    </main>

    <?php include_once("footer.php") ?>

</body>
</html>