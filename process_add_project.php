<?php 
include_once("include/config.php");

if (session_status() === PHP_SESSION_NONE){
    session_start();
}

if ($_POST) {
    $id = $_SESSION['user_id'];
    $name = trim($_POST['name']);
    $start_date    = trim($_POST['start_date']);
    $end_date  = trim($_POST['end_date']);
    $content = trim($_POST['content']);

    try {
        $sql = 'INSERT INTO projects(name, start_date, end_date, content, user_id) 
                VALUES(:name, :start_date, :end_date, :content, :id)';

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":start_date", $start_date);
        $stmt->bindParam("end_date", $end_date);
        $stmt->bindParam(":content", $content);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        if ($stmt->rowCount()) {
            header("Location: add_project.php?status=created");
            exit();
        }
        header("Location: add_project.php?status=fail_create");
        exit();
    } catch (Exception $e) {
        echo "Error " . $e->getMessage();
        exit();
    }
} else {
    header("Location: add_project.php?status=fail_create");
    exit();
}
?>