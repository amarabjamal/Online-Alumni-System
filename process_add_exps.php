<?php 
include_once("include/config.php");

if (session_status() === PHP_SESSION_NONE){
    session_start();
}

if ($_POST) {
    $id = $_SESSION['user_id'];
    $statuses = trim($_POST['statuses']);
    $year_start    = trim($_POST['year_start']);
    $year_end  = trim($_POST['year_end']);
    $title = trim($_POST['title']);

    try {
        $sql = 'INSERT INTO exps(statuses, year_start, year_end, title, user_id) 
                VALUES(:statuses, :year_start, :year_end, :title, :id)';

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":statuses", $statuses);
        $stmt->bindParam(":year_start", $year_start);
        $stmt->bindParam("year_end", $year_end);
        $stmt->bindParam(":title", $title);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        if ($stmt->rowCount()) {
            header("Location: add_exps.php?status=created");
            exit();
        }
        header("Location: add_exps.php?status=fail_create");
        exit();
    } catch (Exception $e) {
        echo "Error " . $e->getMessage();
        exit();
    }
} else {
    header("Location: add_exps.php?status=fail_create");
    exit();
}
?>