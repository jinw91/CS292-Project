<?php
session_start();
if (isset($_SESSION['idnum']))
{
	header("Location: home.php");
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

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-28417433-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
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
			<h1 class="fleft"><a href="index.php"><img src="site_im/p_a_logo.png" alt=""></a></h1>
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
<div id="slides">
	<div>
		<div class="text1">Professional Archives</div>
	</div>
</div>
<!-- content -->
<section id="content">  
	<div class="container_12">
		<div class="wrapper">
			<div class="grid_6 padbot2">
				<h2>About Us</h2>
				<div class="box-img"><a href="#"><img src="site-images/1page_img2.jpg" alt="" width="400"></a></div>
				<p class="padtop padbot">Professional Archives is a website formed by Vanderbilt students to connect students with professionals and companies around the world.</p>
				<a href="#" class="button1">Continue reading</a>
			</div>
			<div class="padbot2">
				<h2 align="center">Register Now</h2>
				<form action="register.php" method="post" onSubmit="return validate_fields()">
    <div align="right">
    <label for="first_name" style="float: left; text-align: right;">First Name: </label><input id="first_name" name="first_name" width="200px"/> <br>
 	<label for="last_name" style="float: left; text-align: right;">Last Name: </label><input id="last_name" name="last_name" width="200px"/> <br>
    <label for="emailaddress" style="float: left; text-align: right;">Email: </label><input id="emailaddress" name="emailaddress" width="200px"/> <br>
    <label for="user_password" style="float: left; text-align: right;">Password: </label> <input id="user_password" name="user_password" type="password" width="200px"/> <br><br>

    <center><input type="submit" name="submit" id="submit" value="Register Now"/></center>
    </div>
    </form>
			</div>
		</div>
	</div>
</section>
<!-- footer -->
<?php
	define('__ROOT__', dirname(__FILE__)); 
	require_once(__ROOT__.'/generalfunctions/template.php');
	echo footer();
?>
</body>
</html>
