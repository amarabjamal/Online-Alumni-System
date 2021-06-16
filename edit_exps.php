<?php
include_once("include/config.php");

if (session_status() === PHP_SESSION_NONE){
    session_start();
}

// FETCH DATA FROM TABLE EXPS
$id = $_GET['id'] ? intval($_GET['id']) : 0;
$experience = $conn->prepare("SELECT title, statuses, year_start, year_end, id FROM exps WHERE id='$id'");
$experience->execute();
$row = $experience->fetch(PDO::FETCH_ASSOC);

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
                                            <strong>Updated!</strong>
                                        </div>
                                    <?php endif ?>
                                    <?php if (isset($_GET['status']) && $_GET['status'] == "fail_update") : ?>
                                        <div class="alert alert-danger" role="alert">
                                            <strong>Fail to update!</strong>
                                        </div>
                                    <?php endif ?>
                                    <div class="table-responsive">
                                        <form  action="process_edit_exps.php" method="POST">
                                        <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                            
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
                                                    <div class="form-row">
                                                        <td class="form-group">
                                                            <div class="input-group mb-3">
                                                                <select id="status" name="statuses"  class="custom-select">
                                                                    <?php if($row['statuses'] == "current"){ ?>
                                                                        <option value="past" >Past</option>
                                                                        <option value="current" selected>Current</option>
                                                                    <?php } else{ ?>
                                                                        <option value="current">Current</option>
                                                                        <option value="past" selected>Past</option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </td>
                                            
                                                        <!-- <td><input type="text" class="form-control" id="status" name="statuses" placeholder="Current / Past?" value="<?php echo $row['statuses'] ?>"></td> -->
                                                        <td><input type="text" class="form-control" id="year_start" name="year_start" placeholder="Year Start" value="<?php echo $row['year_start'] ?>"></td>
                                                        <td><input type="text" class="form-control" id="year_end" name="year_end" placeholder="Year End" value="<?php echo $row['year_end'] ?>"></td>
                                                        <td><input type="text" class="form-control" id="title" name="title" placeholder="Description" value="<?php echo $row['title'] ?>"></td>
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