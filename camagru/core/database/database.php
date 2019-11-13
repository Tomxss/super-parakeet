<?php 
	$db_name= "camm";
	$server = "mysql:host=localhost;";
	$dsn = 'mysql:host=localhost; dbname='.$db_name;
	$user = 'root';
	$password = 'password';

    $pdo = new PDO($server, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE DATABASE IF NOT EXISTS `".$db_name."`";
    $pdo->exec($sql);

	try {
		$pdo = new PDO($dsn, $user, $password);
	}catch(PDOException $e){
		echo "Connection Issue: ".$e. " Running setup.php...";
	}	
?>
