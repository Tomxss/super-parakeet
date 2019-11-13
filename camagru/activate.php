<?php
include 'core/init.php';
// check first if record exists
$query = "SELECT `user_id` FROM users WHERE verification_code = :code and verified = '0'";
$stmt = $pdo->prepare( $query );
$stmt->bindParam(":code", $_GET['code']);
$stmt->execute();
$num = $stmt->rowCount();
 
if($num==1){
     //update the 'verified' field, from 0 to 1 (unverified to verified)
     $query = "UPDATE users
                 SET verified = '1'
                 WHERE `verification_code` = :code";
 
     $stmt = $pdo->prepare($query);
     $stmt->bindParam(':code', $_GET['code']);
     $stmt->execute();
      if($stmt->execute()){
        header('Location: includes/signup.php?step=1');
      }else{

          print_r($stmt->errorInfo());
      }

  }else{
    echo "<div>We can't find your verification code.</div>";
    echo "<input type='submit' name='Back' value='back'>";
    //header('Location: index.php');
  }

?>