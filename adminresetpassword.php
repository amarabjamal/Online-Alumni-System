<?php
include_once("include/config.php");

include_once("include/userapprovalsystem.php");

session_start();

if(isset($_POST['resetaccid'])) {	
    $id = $_POST['resetaccid'];

    $sql = "SELECT * FROM users WHERE users.id = $id";
    $result = $conn->query($sql);

    $acc = $result->fetch();
}

if(isset($_POST['id']) && isset($_POST['pass']) && isset($_POST['rpass'])) {	
    $id = $_POST['id'];
    $pass = $_POST['pass'];
    $rpass = $_POST['rpass'];
    $hpass = password_hash($pass, PASSWORD_DEFAULT);

    try {
        
        $conn->beginTransaction();
        $sql = "UPDATE users SET password = '$hpass' WHERE id = '$id'";
        $conn->query($sql);  

        $conn->commit();
        header('Location: http://localhost/Online-alumni-system/approved.php?passwordreset ');
        
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

        <title>Alumni System</title>
    </head>
<body class="d-flex flex-column h-100">
    <!--Bootstrap js-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <?php include_once("adminnavigation.php"); ?>

    <main >
        
    <div class="container py-5">
        <div class="formthing">
            <form action="adminresetpassword.php" method="post">
                <input type="text" name = "id" value="<?php echo "".$acc['0'].""; ?>" hidden>
                <?php echo "<h4>Account Name: ".$acc['full_name']."</h4>";?>
                <div class="form-group py-3">
                    <label >Type in new Password </label><br>
                    <input required type="password" id="pass" name="pass" class="form-control" placeholder="" value="">
                </div>

                <div class="form-group">
                    <label >Re-type Password </label><br>
                    <input required type="password" id="rpass" name="rpass" class="form-control" placeholder="" value="">
                </div>

                <div class="py-3">
                    <button type="submit" class="btn btn-success btn-block" name="submit" id="submit" disabled>Submit</button>
                </div>
            </form>

            <script>
                $("#pass").keyup(function () {
                var user_pass = $("#pass").val();
                var user_pass2 = $("#rpass").val();
                
                if(user_pass != null){
                    if (user_pass == user_pass2) {
                    $("#submit").prop('disabled', false)//use prop()
                    } else {
                    $("#submit").prop('disabled', true)//use prop()
                    }
                }
                
            });
                $("#rpass").keyup(function () {
                var user_pass = $("#pass").val();
                var user_pass2 = $("#rpass").val();

                if(user_pass != null){
                    if (user_pass == user_pass2) {
                    $("#submit").prop('disabled', false)//use prop()
                    } else {
                    $("#submit").prop('disabled', true)//use prop()
                    }
                }
            });
            </script>

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
        $conn = null;
    ?>

</body>
</html>