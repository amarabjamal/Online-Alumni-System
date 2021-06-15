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
                <div class= "col-sm-12 d-flex justify-content-center">
                    <form action="edit_exps.php" method="POST">
                        <div class="form-group">
                            <label class="col-md-3">Status</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3">Year start</label>
                            <div class="col-sm-12">
                                <input type="date" class="form-control">
                                
                            </div> 
                        </div>
                        <div class="form-group">
                            <label class="col-md-3">Year end</label>
                            <div class="col-sm-12">
                                <input type="date" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="col-md-3">Title/label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control">
                            </div>
                        </div> 
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button id="submit" class="btn btn-success">Submit</button>
                                <button id="delete" class="btn btn-danger">Delete</button>
                            </div>
                        </div>
                            
                    </form> 
                </div> 
            </div> 
        </div>
    </main>

    <?php include_once("footer.php") ?>

</body>
</html>