<?php     

function mysqlTableExists($dsn, $user, $password, $table) {
    // Connect to DATABASE previously created
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$exists = $pdo->prepare("SELECT 1 FROM $table LIMIT 0");
    try {
        $exists->execute();
        return true;
    } catch (PDOException $e){
		return false;
    }
	
}
?>