<?php 
include_once("include/config.php");

if (session_status() === PHP_SESSION_NONE){
    session_start();
}

if ($_POST) {
    $id      = (int) $_POST['id'];
    $profile_picture_url = trim($_POST['profile_picture_url']);
    $full_name    = trim($_POST['full_name']);
    $country   = trim($_POST['country']);
    $faculty = trim($_POST['faculty']);
    $enroll_year = trim($_POST['enroll_year']);

    try {
        $sql = 'UPDATE users 
                    SET profile_picture_url = :profile_picture_url, full_name = :full_name, country = :country, faculty = :faculty, enroll_year = :enroll_year 
                WHERE id = :id';

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":profile_picture_url", $profile_picture_url);
        $stmt->bindParam(":full_name", $full_name);
        $stmt->bindParam(":country", $country);
        $stmt->bindParam(":faculty", $faculty);
        $stmt->bindParam(":enroll_year", $enroll_year);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        if ($stmt->rowCount()) {
            header("Location: edit_profile.php?id=".$id."&status=updated");
            exit();
        }
        header("Location: edit_profile.php?id=".$id."&status=fail_update");
        exit();
    } catch (Exception $e) {
        echo "Error " . $e->getMessage();
        exit();
    }
} else {
    header("Location: edit_profile.php?id=".$id."&status=fail_update");
    exit();
}
?>



