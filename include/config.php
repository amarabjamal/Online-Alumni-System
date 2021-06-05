<?php
//Step 1: Connecting to a Database using PDO API
// modify these variables for your installation
try {	
	$connectionString = "mysql:host=localhost;dbname=alumni_system";
	$databaseUsername = 'user1';
	$databasePassword = 'user1abc';

	$pdo = new PDO($connectionString, $databaseUsername, $databasePassword);
	// set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
    echo "Database connected successfully <br>"; 
	
    }
catch(PDOException $e)
    {
    echo "Database connection failed: " . $e->getMessage();
}


?>