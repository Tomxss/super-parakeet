<?php
// session_start();
// LOGIN PAGE
// $_SESSION['id'] = $val['id'];
// $_SESSION['username'] = $val['username'];

// MONTAGE.PHP
// $montages = get_all_montage();
include_once("functions/montage.php");

$montages = get_all_montage();  //array of picture query results are put inside of montages
?>
<?php
include 'core/init.php';
 if (isset($_GET['username']) === true && empty($_GET['username']) === false) {
  $username = $getFromU->checkInput($_GET['username']);
  $profileId = $getFromU->userIdByUsername($username);
  $profileData = $getFromU->userData($profileId);
  $user_id = @$_SESSION['user_id'];
  $user = $getFromU->userData($user_id);
  $notify  = $getFromM->getNotificationCount($user_id);

}

?>

<!doctype html>
<html>
	<head>
	<title><?php echo $profileData->screenName.' (@'.$profileData->username.')'; ?></title>
	<meta charset="UTF-8" />
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css"/>
  	<link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/style-complete.css"/>
	  <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/gallery.css">
  	<script src="https://code.jquery.com/jquery-3.1.1.js" integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA=" crossorigin="anonymous"></script>
    </head>
<!--Helvetica Neue-->
<body>
<div class="wrapper">
<!-- header wrapper -->
<div class="header-wrapper">
	<div class="nav-container">
    	<div class="nav">
		<div class="nav-left">
			<ul>
				 <li><a href="<?php echo BASE_URL; ?>home.php"><i class="fa fa-home" aria-hidden="true"></i>Home</a></li>
      			
      			<?php if($getFromU->loggedIn()=== true){?>
					<li><a href="<?php echo BASE_URL;?>i/notifications"><i class="fa fa-bell" aria-hidden="true"></i>Notifications<span id="notificaiton"><?php if($notify->totalN > 0){echo '<span class="span-i">'.$notify->totalN.'</span>';}?></span></a></li>
					<li id="messagePopup"><i class="fa fa-envelope" aria-hidden="true"></i>Messages<span id="messages"><?php if($notify->totalM > 0){echo '<span class="span-i">'.$notify->totalM.'</span>';}?></span></li>
				<?php }?>
			
			</ul>
		</div><!-- nav left ends-->
		<div class="nav-right">
			<ul>
				<li><input type="text" placeholder="Search" class="search"/><i class="fa fa-search" aria-hidden="true"></i>
					<div class="search-result">
					</div>
				</li>
        <?php if($getFromU->loggedIn() === true){ ?>
				<li class="hover"><label class="drop-label" for="drop-wrap1"><img src="<?php echo BASE_URL.$user->profileImage; ?>"/></label>
				<input type="checkbox" id="drop-wrap1">
				<div class="drop-wrap">
					<div class="drop-inner">
						<ul>
							<li><a href="<?php echo BASE_URL.$user->username; ?>"><?php echo $user->username; ?></a></li>
							<li><a href="<?php echo BASE_URL; ?>settings/account">Settings</a></li>
							<li><a href="<?php echo BASE_URL; ?>includes/logout.php">Log out</a></li>
						</ul>
					</div>
				</div>
				</li>
				<li><label for="pop-up-tweet" class="addTweetBtn">Post</label></li>
      <?php }else{
        echo '<li><a href="'.BASE_URL.'index.php">Have an account? Log in!</a></li>';
      } ?>
      </ul>
		</div><!-- nav right ends-->

	</div><!-- nav ends -->
	</div><!-- nav container ends -->
</div><!-- header wrapper end -->
<!--Profile cover-->
<div class="profile-cover-wrap">
<div class="profile-cover-inner">
	<div class="profile-cover-img">
		<!-- PROFILE-COVER -->
        <center><div class="video-wrap">
        <video id ="video" playsinline autoplay></video>
	    </div></center>
</div>
<div class="profile-nav">
 <div class="profile-navigation">
      <!--LISTS EDITED-->

		<span>
        <button style = "margin-left: 50%" class='f-btn' id ="snap">Take Picture</button>
 		</span>
    </div>
</div>
</div><!--Profile Cover End-->
<script type="text/javascript" src="<?php echo BASE_URL;?>assets/js/follow.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL;?>assets/js/notification.js"></script>

<!---Inner wrapper-->
<div class="in-wrapper">
 <div class="in-full-wrap">
   <div class="in-left">
     <div class="in-left-wrap">
	<!--PROFILE INFO WRAPPER END-->
	<div class="profile-info-wrap">
	 <div class="profile-info-inner">
	 <!-- PROFILE-IMAGE -->

<div class="profile-extra-info">
	<div class="profile-extra-inner">
		<ul>


			<li>
				<div class="profile-ex-location-i">
					<!-- <i class="fa fa-calendar-o" aria-hidden="true"></i> -->
				</div>
				<div class="profile-ex-location">
 				</div>
			</li>
			<li>
				<div class="profile-ex-location-i">
					<!-- <i class="fa fa-tint" aria-hidden="true"></i> -->
				</div>
				<div class="profile-ex-location">
				</div>
			</li>
		</ul>
	</div>
</div>

<div class="profile-extra-footer">
	<div class="profile-extra-footer-head">
		<div class="profile-extra-info">
			<ul>
				<li>
					<div class="profile-ex-location-i">
						<!-- <i class="fa fa-camera" aria-hidden="true"></i> -->
					</div>
					<div class="profile-ex-location">
						<!-- <a href="#">0 Photos and videos </a> -->
					</div>
				</li>
			</ul>
		</div>
	</div>
	<div class="profile-extra-footer-body">
		<ul>
			 <!-- <li><img src="#"/></li> -->
		</ul>
	</div>
</div>

	 </div>
	<!--PROFILE INFO INNER END-->

	</div>
	<!--PROFILE INFO WRAPPER END-->

	</div>
	<!-- in left wrap-->

  </div>
	<!-- in left end-->

<div class="in-center">
	<div class="in-center-wrap">

      <div class="body">
        <?php if(isset($user_id)) { ?>
        <div class="main">
    		  <div class="select">
      			<img class="thumbnail" src="../assets/stickers/cadre.png"></img>
      			<input id="cadre.png" type="radio" name="img" value="./../assets/stickers/cadre.png" onclick="onCheckBoxChecked(this)">
      			<img class="thumbnail" src="../assets/stickers/cigarette.png"></img>
      			<input id="cigarette.png" type="radio" name="img" value="./../assets/stickers/cigarette.png" onclick="onCheckBoxChecked(this)">
      			<img class="thumbnail" src="../assets/stickers/hat.png"></img>
      			<input id="hat.png" type="radio" name="img" value="./../assets/stickers/hat.png" onclick="onCheckBoxChecked(this)">
    		  </div>

          <img id="hat" style="display:none;" src="../assets/stickers/hat.png"></img>
          <img id="cigarette" style="display:none;" src="../assets/stickers/cigarette.png"></img>
          <img id="cadre" style="display:none;" src="../assets/stickers/cadre.png"></img>
    		  <div class="capture" id="pickImage">
            <img class="camera" src="../assets/stickers/camera.png"></img>
          </div>
		  <div class="controller">
          <canvas id="canvas" width="640" height="480"></canvas>
		  </div>
          <div class="captureFile" id="pickFile">
            <img class="camera" src="../assets/stickers/camera.png"></img>
          </div>
          <input type="file" id="take-picture" style="display:none;" accept="image/*">
        </div>
        <div class="side">
			<div class="title">Montages</div>
      <div id="miniatures">
        <?php
          $gallery = "";
          if ($montages != null) {
            for ($i = 0; $montages[$i] ; $i++) {
              $class = "icon";
              if ($montages[$i]['userid'] === $user_id) {  //if logged in user created the picture
                $class .= " removable";                           //toggle as removeable
              }
              $gallery .= "<img class=\"" . $class . "\" src=\"./montage/" . $montages[$i]['img'] . "\" data-userid=\"" . $montages[$i]['userid'] . "\"></img>";
            }
            echo $gallery;
          }
        ?>
      </div>
		</div>
        <?php } else { ?>
          You need to connect to use the gallery
        <?php } ?>
      </div>








	</div><!-- in left wrap-->
  <script>
  
  </script>

  <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/like.js"></script>
  <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/retweet.js"></script>
  <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/popuptweets.js"></script>
  <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/delete.js"></script>
  <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/comment.js"></script>
  <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/popupForm.js"></script>
  <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/fetch.js"></script>
  <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/search.js"></script>
  <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/hashtag.js"></script>
  <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/messages.js"></script>
  <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/postMessage.js"></script>

</div>
<!-- in center end -->

<!-- <div class="in-right">
	<div class="in-right-wrap"> -->

		<!--==WHO TO FOLLOW==-->
	    <?php //$getFromF->whoToFollow($user_id, $profileId); ?>
 		<!--==WHO TO FOLLOW==-->

		<!--==TRENDS==-->
   	   <?php //$getFromT->trends(); ?>
 	 	<!--==TRENDS==-->

	<!-- </div>
</div> -->
 <!-- in right end -->
 <?php if(isset($user_id)) { ?>
  <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/webcam.js"></script>
  <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/drop.js"></script>
  <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/import.js"></script>
  <?php } ?>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/follow.js"></script>

		</div>
		<!--in full wrap end-->
	</div>
	<!-- in wrappper ends-->
 </div>
 <!-- ends wrapper -->
</body>
</html>
