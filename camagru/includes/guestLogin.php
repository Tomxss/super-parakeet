<?php
include '../core/init.php';

 $email = 'Guest@gmail.com';
 $user_id = $getFromU->userIdbyEmail($email);
//echo "what user is this $user_id";
  $_SESSION['user_id'] = $user_id;
  if($getFromU->loggedIn())
  {
      header('Location: http://localhost:8080/camagru/hashtag/php?f=photos');
  }else
  {
    $getFromU->logoutGuest();
      echo "could not connect to guest account";
      header("refresh:5;url=http://localhost:8080/camagru/index.php");
  }
?>