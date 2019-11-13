<?php
include 'core/init.php';
$passwordChange_code = $_GET['code'];
$email = $getFromU->userIdbypasswordChange_code($passwordChange_code);
// check first if record exists
$query = "SELECT `user_id` FROM users WHERE passwordChange_code = :code AND verified = '1'";
$stmt = $pdo->prepare( $query );
$stmt->bindParam(":code", $_GET['code']);
$stmt->execute();
$num = $stmt->rowCount();
 
function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}

if($num==1){
     $rPassword = randomPassword();
     $uPassword = md5($rPassword);
     $query = "UPDATE users
                 SET `password` = :randompassword
                 WHERE `passwordChange_code` = :code";
 
     $stmt = $pdo->prepare($query);
     $stmt->bindParam(':randompassword', $uPassword);
     $stmt->bindParam(':code', $_GET['code']);
     $stmt->execute();

      if($stmt->execute()){
         include 'includes/newPassword_email.php'; 
        //header('Location: localhost:8080/camagru/index.php');
      }else{

          print_r($stmt->errorInfo());
      }
    }else{
    echo "<div>We can't find your verification code.</div>";
    //header('Location: index.php');
  }

?>