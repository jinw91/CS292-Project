<!DOCTYPE html>
<html lang="en">
<head>
<title>Terms of Agreement and Privacy Policy</title>
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
<script type="text/javascript" src="simple.js"></script>
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
			<?
			define('__ROOT__', dirname(__FILE__)); 
			require_once(__ROOT__.'/generalfunctions/template.php');
			echo navBar($_SESSION['num_mes']);
			?>
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
	</div>
</header>
<!-- content -->
<section id="content">  
	<div class="container_12">
		<div class="wrapper">
			<div class="grid_10">
				<h1 id='edit_title'>Terms of Agreement:</h1>
            	<h3>Purpose</h3>
        		<p>The purpose of Professional Archives is to allow a simple interface for users to manage job offers and to allow for users to find jobs and internships that match their criteria. Also, it provides employers the ability to manage Professional Archive resumes and to find top candidates to match each criteria.</p>
		
				<h3>Privacy and Safety</h3>
        		<p>Your privacy is very important to us. Our privacy policy explains how we use the information we collect to better help your needs as well as protect the privacy and security of your information. We use a variety of security measures to protect your sensitive information. Also, please keep your password safe from other users and refrain from letting others use your account.</p>
		
				<h3>Information Use</h3>

				<p>When you register, we collect information regarding your username and password just to verify your membership. Any information you fill out regarding your education history, work experience, extracurricular, and skills are provided only to businesses that are registered with the site. This information is kept strictly on Professional Archives and any software that are certified by Professional Archives which is permitted to sync with the Professional Archives database.</p>
		
				<p>By using our Site, you agree to understand the policy. We reserve the right to sue you from misuse and abuse of our site.
				</p>
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
