<?php
session_start();
ob_start();
if (isset($_SESSION['idnum']))
{
	header("Location: home.php");
}

	define('__ROOT__', dirname(__FILE__)); 
	require_once(__ROOT__.'/generalfunctions/database.php');
	$tbl_name="users";
	$connect = connectToDatabase();
	if (!$connect)
	{
		$error = "failed to connect";	
	}
	if ($_POST['login'] == "Log In")
	{
		$_SESSION['email'] = $_POST['email'];
		$password = $_POST['password'];
		$idnum = validateLogin($_SESSION['email'], $password);
		if ($idnum == -1 || $idnum == 57)
		{
			$error = "Invalid Username/Password. Please try again.";
		}
		else
		{
			$_SESSION['idnum'] = $idnum;
			$query = sprintf("SELECT * FROM education_data WHERE idnum=%d",$_SESSION['idnum']);
			$result = mysql_query($query);
			if ($result && mysql_num_rows($result) > 0)
			{
				$_SESSION['education'] = mysql_fetch_assoc($result);
			}
			//setcookie("idnum", $idnum, time() + 60 * 60 * 24 * 60);
			header("Location: home.php");
		}
	}
	else if ($_POST['submit'] == "Submit")
	{
		$emailaddress = $_POST['email_address'];
		$query = sprintf("SELECT * FROM users WHERE email='%s'", $emailaddress);
		$result = mysql_query($query);
		if (!$result || mysql_affected_rows() == 0)
		{
			$error = "Invalid Email Address. Please try again.";
		}
		else
		{
			$res = mysql_fetch_assoc($result);
			if ($res['idnum'] != 57 && $res['idnum'] != 5)
			{
				$error = "Message sent. Please check your inbox.";
			$message = "Your password is: ".$res['password']."<br/><br/>Thanks, <br/>Professional Archives<br/>Please do not respond to this email.";
			$msgheader = "From: Professional Archives <proarc@proarcs.com>\r\n";
			$msgheader .= "MIME-Version: 1.0\n";
			$msgheader .= "Content-type: text/html; charset=us-ascii\n";
			mail($emailaddress, "Professional Archives Lost Password", $message, $msgheader);
			}
			else
			{
				$error = "Your account has been disabled due to impromper use.
				<br />Please contact an administrator if you wish to unlock it.";
			}
		}
	}
	else
	{
		$error = "Error message.";
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Professional Archives</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width; initial-scale=1.0">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/styles.css">
<link rel="stylesheet" href="css/skeleton.css">
<script src="js/jquery-1.7.1.min.js"></script>
<script src="js/superfish.js"></script>
<script src="js/hoverIntent.js"></script>
<script src="js/script.js"></script>
<script src="js/FF-cash.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
<script src="js/slides.min.jquery.js"></script>
<script>
$(function(){
	$('#slides').slides({
	effect: 'fade',
	fadeSpeed:700,
	preload: false,
	play: 5000,
	pause: 5000,
	hoverPause: true,
	crossfade: true,
	bigTarget: true
	});
	$('.lightbox-image').prettyPhoto({theme:'facebook',autoplay_slideshow:false,social_tools:false,animation_speed:'normal'}).append('<span></span>');
	if($.browser.msie&&parseInt($.browser.version,10)<=8){$('.lightbox-image').find('span').css({opacity:.5})};
	$('.tooltips li a').find('strong').append('<span></span>').each(
	 	function(){
		var src=new Array()
		src=$(this).find('>img').attr('src').split('.')
		src=src[0]+'-hover.'+src[1]
		$(this).find('>span').css({background:'url('+src+')'})
	 });
});
</script>
</head>
<body>
<!-- header -->
<header>
	<div class="top-header">
		<div class="container_12">
			<div class="grid_12">
				<div class="fright">
					<ul class="top-menu">
						<li></li>
						<li></li>
					</ul>
				</div>
				<div class="fleft"></div>
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<div class="header-line"></div>
	<div class="container_12">
		<div class="grid_12">
			<h1 class="fleft"><a href="index.php"><img src="site_im/p_a_logo_new.png" alt=""></a></h1>
			<div id="main-menu">
            <form action="login.php" method="post">
				<ul class="sf-menu fright responsive-menu">
					<li>
                    <label for="username">Email: </label><input type="text"
width="100px" name="email">
					</li>
					<li>
                    <label for="username">Password: </label><input type="password"
width="100px" name="password">
<div align="center" style="margin-top: 5px;">
<label for="cookie">Remember Me </label><input type="checkbox" name="cookie" /></div>
                    </li>
                    <li>
                    <input type="submit" name="login" value="Log In">
                    </li>
				</ul>
                </form>
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
	</div>
</header>
<div align="center">
	<p style="font-family: 'Lato', Arial, Helvetica; font-size-adjust: 150%">The page you requested is not found. <br>
This issue has been sent to the Professional Archives Team.</p><br>
    <p style="font-family: 'Lato', Arial, Helvetica;">Thanks, <br> The Professional Archives Team</p>
</div>
<!-- content -->
<section id="content"></section>
<!-- footer -->
<?php
	define('__ROOT__', dirname(__FILE__)); 
	require_once(__ROOT__.'/generalfunctions/template.php');
	echo footer();
?>
</body>
</html>
