<?php
 if ($_SERVER['REQUEST_METHOD'] == "GET" && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
 	header('Location: ../index.php');
 }
	if(isset($_POST['submit'])){
		$email = $_POST['email'];
		if (empty($email))
		{
			$errorMsg = "Email required";
		}else{

		$email = $getFromU->checkInput($email);

		if(!filter_var($email,FILTER_VALIDATE_EMAIL))
		{
			$errorMsg = "Invalid format";
		}
		else if($getFromU->checkEmail($email) == false)
		{
			$errorMsg = "this email does not exist on our servers";
		}else
		{
			$changepassword = $getFromU->checkEmail_UpdatePassword($email);
			$passwordChange_code = $getFromU->fetchPasswordChange_code($email);
			include 'forgotPassword_email.php';
		}
	}
		
}
?>
<div class="login-div">
<form method="post">
	<ul>
		<li>
		  <input type="text" name="email" placeholder="Please enter your Email here"/>
		</li>
		<li>
		  <input type="submit" name="submit" value="Submit"/> Forgot Password?
		</li>
		<li>
    <?php
      if(isset($errorMsg)){
        echo '<li class="error-li">
        <div class="span-fp-error">'.$errorMsg.'</div>
        </li>';
      }
    ?>
	</ul>

	</form>
</div>