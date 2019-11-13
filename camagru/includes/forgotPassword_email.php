<?php
                $verificationLink = "http://localhost:8080/camagru/activate_password.php?code=" . $passwordChange_code;
                $htmlStr = "";
                $htmlStr .= "Hi " . $email . ",<br /><br />";
 
                $htmlStr .= "Please click the button below to change your password.<br /><br /><br />";
                $htmlStr .= "<a href='{$verificationLink}' target='_blank' style='padding:1em; font-weight:bold; background-color:blue; color:#fff;'>CHANGE PASSWORD</a><br /><br /><br />";
 
                $htmlStr .= "Kind regards,<br />";
                $htmlStr .= "<a href='http://localhost:8080/camagru/activate_password.php' target='_blank'>Camagru</a><br />";
 
 
                $name = "Camagru";
                $email_sender = "no-reply@Camagru";
                $subject = "Change password Link | Camagru | forgot password";
                $recipient_email = $email;
 
                $headers  = "MIME-Version: 1.0\r\n";
                $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
                $headers .= "From: {$name} <{$email_sender}> \n";
 
                $body = $htmlStr;
 
                // send email using the mail function, you can also use php mailer library if you want
                if( mail($recipient_email, $subject, $body, $headers) ){
 
                    // tell the user a verification email were sent
                    echo "<div id='successMessage'>A Forgot Password email is sent to <b>" . $email . "</b>, please open your email inbox and click the given link so you can change your password.</div>";
 
                     // Execute the query
                    if($stmt->execute()){
                         echo "<div>Unverified email was saved to the database.</div>";
                    }else{
                        echo "<div>Unable to save your email to the database.";
                        //print_r($stmt->errorInfo());
                    }
 
                }else{
		   	        die("Sending failed.");
                 }			
?>