<?php
if ($_SERVER['REQUEST_METHOD'] == "GET" && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
	header('Location: ../index.php');
}
if(isset($_POST['signup'])){
	$screenName = $_POST['screenName'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$error = '';

	if(empty($screenName) or empty($password) or empty($email)){
		$error = 'All fields are required';
	}else {
		$email = $getFromU->checkInput($email);
		$screenName = $getFromU->checkInput($screenName);
		$password = $getFromU->checkInput($password);

		if(!filter_var($email)) {
			$error = 'Invalid email format';
		}else if(strlen($screenName) > 20){
			$error = 'Name must be between in 6-20 characters';
		}else if(strlen($password) < 8){
            $error = "Your Password Must Contain At Least 8 Characters!";
        }
        else if(!preg_match("#[0-9]+#",$password)) {
            $error = "Your Password Must Contain At Least 1 Number!";
        }
        else if(!preg_match("#[A-Z]+#",$password)) {
            $error = "Your Password Must Contain At Least 1 Capital Letter!";
        }
        else if(!preg_match("#[a-z]+#",$password)) {
            $error = "Your Password Must Contain At Least 1 Lowercase Letter!";
        }else {
			if($getFromU->checkEmail($email) === true){
				$error = 'Email is already in use';
			}else {
				 $verificationCode = md5(uniqid("yourrandomstringyouwanttoaddhere", true));
				 //$user_id = $getFromU->create('users', array('email' => $email, 'password' => md5($password) , 'screenName' => $screenName, 'profileImage' => 'assets/images/defaultProfileImage.png', 'profileCover' => 'assets/images/defaultCoverImage.png'));
				 //$_SESSION['user_id'] = $user_id;
				$user_id = $getFromU->create('users', array('email' => $email, 'password' => md5($password) , 'screenName' => $screenName, 'profileImage' => 'assets/images/defaultProfileImage.png', 'profileCover' => 'assets/images/defaultCoverImage.png', 'verified' => '0', 'verification_code' => $verificationCode, 'Permission' => '1'));
				$_SESSION['user_id'] = $user_id;
				include 'includes/verifying_email.php';
			}
		}
    }
}
?>
<form method="post">
<div class="signup-div">
	<h3>Sign up </h3>
	<ul>
		<li>
		    <input type="text" name="screenName" placeholder="Full Name"/>
		</li>
		<li>
		    <input type="email" name="email" placeholder="Email"/>
		</li>
		<li>
			<input type="password" name="password" placeholder="Password"/>
		</li>
		<li>
			<input type="submit" name="signup" Value="Signup for Camagru">
		</li>
		<?php
      if(isset($error)){
        echo '<li class="error-li">
        <div class="span-fp-error">'.$error.'</div>
        </li>';
      }
    ?>
	</ul>

</div>
</form>

