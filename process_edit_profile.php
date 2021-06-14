<?php
include_once("include/config.php");

session_start();
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



