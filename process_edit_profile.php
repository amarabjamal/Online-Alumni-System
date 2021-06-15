<?php
include_once("include/config.php");
// $id = $_GET['id'] ? intval($_GET['id']) : 0;
$id = $_SESSION['user_id'];
try {
    $sql = "SELECT * FROM users WHERE id =:id LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();    
} catch (Exception $e) {
    echo "Error " . $e->getMessage();
    exit();
}

if (!$stmt->rowCount()) {
    header("Location: edit_profile.php");
    exit();
}
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (isset($_POST['submit']))
{
    if ((!isset($_POST['name'])) || 
        (!isset($_POST['email']))  
        
    {
        $error = "*" . "Please fill all the required fields";
    }
    else
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $yeare = $_POST['year_enroll'];
        $country = $_POST['country'];
        
    }

    $sql = "INSERT INTO users(name, email, year_enroll, country) VALUES(:name, :email, :year_enroll, :country)";
	$query = $conn->prepare($sql);
				
	$query->bindparam(':name', $name);
	$query->bindparam(':email', $email);
	$query->bindparam(':year_enroll', $yeare);
	$query->execute();

    header("Location: profile.php");
}



