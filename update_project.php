<?php
include_once("include/config.php");

if (session_status() === PHP_SESSION_NONE){
    session_start();
}


if ($_POST) {
    $id = $_SESSION['user_id'];
    $name = trim($_POST['name']);
    $start_date  = trim($_POST['year_start']);
    $end_date  = trim($_POST['year_end']);
    $content = trim($_POST['content']);

    try {
        $sql = 'UPDATE project 
                    SET  name = :name, start_date = :start_date, end_date = :year_end, content = :content
                WHERE id = :id';

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":start_date", $year_start);
        $stmt->bindParam(":end_date", $year_end);
        $stmt->bindParam(":content", $content);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        if ($stmt->rowCount()) {
            header("Location: edit_project.php?id=".$id."&status=updated");
            exit();
        }
        header("Location: edit_project.php?id=".$id."&status=fail_update");
        exit();
    } catch (Exception $e) {
        echo "Error " . $e->getMessage();
        exit();
    }
} else {
    header("Location: edit_project.php?id=".$id."&status=fail_update");
    exit();
}

?>

