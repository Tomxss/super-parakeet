<?php
                $verificationLink = "http://localhost:8080/camagru/activate.php?code=" . $verificationCode;
                $htmlStr = "";
                $htmlStr .= "Hi " . $email . ",<br /><br />";
 
                $htmlStr .= "Please click the button below to verify your sign-up.<br /><br /><br />";
                $htmlStr .= "<a href='{$verificationLink}' target='_blank' style='padding:1em; font-weight:bold; background-color:blue; color:#fff;'>VERIFY EMAIL</a><br /><br /><br />";
                $htmlStr .= "Kind regards,<br />";
                $htmlStr .= "<a href='http://localhost:8080/camagru/index.php' target='_blank'>Camagru</a><br />";
 
 
                $name = "Camagru";
                $email_sender = "no-reply@Camagru";
                $subject = "Verification Link | Camagru | Sign-up";
                $recipient_email = $email;
 
                $headers  = "MIME-Version: 1.0\r\n";
                $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
                $headers .= "From: {$name} <{$email_sender}> \n";
 
                $body = $htmlStr;
 
                // send email using the mail function, you can also use php mailer library if you want
                if( mail($recipient_email, $subject, $body, $headers) ){
 
                    // tell the user a verification email were sent
                    echo "<div id='successMessage'>A verification email were sent to <b>" . $email . "</b>, please open your email inbox and click the given link so you can login.</div>";
 
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