<?php
include_once("include/config.php");

if (session_status() === PHP_SESSION_NONE){
    session_start();
}

if ($_POST) {
    $id = (int) $_POST['id'];
    $statuses = $_POST['statuses'];
    $year_start  = trim($_POST['year_start']);
    $year_end  = trim($_POST['year_end']);
    $title = trim($_POST['title']);

    try {
        $sql = 'UPDATE exps 
                    SET  statuses = :statuses, year_start = :year_start, year_end = :year_end, title = :title
                WHERE id = :id';

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":statuses", $statuses);
        $stmt->bindParam(":year_start", $year_start);
        $stmt->bindParam(":year_end", $year_end);
        $stmt->bindParam(":title", $title);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        if ($stmt->rowCount()) {
            header("Location: edit_exps.php?id=".$id."&status=updated");
            exit();
        }
        header("Location: edit_exps.php?id=".$id."&status=fail_update");
        exit();
    } catch (Exception $e) {
        echo "Error " . $e->getMessage();
        exit();
    }
} else {
    header("Location: edit_exps.php?id=".$id."&status=fail_update");
    exit();
}


?>