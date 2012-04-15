<?php
session_start();
define('__ROOT__', dirname(__FILE__)); 
require_once(__ROOT__.'/generalfunctions/database.php');
$tbl_name="users";
$connect = connectToDatabase();
if (!$connect)
{
	$error = "failed to connect";
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
              <form action='register.php' method='post' onSubmit='return validate_education();'>
              <?=$calendar?>
        	  <table width="100%" border="0">
        	    <tr>
                  <th scope="col">Sunday</th>
        	      <th scope="col">Monday</th>
        	      <th scope="col">Tuesday</th>
        	      <th scope="col">Wednesday</th>
        	      <th scope="col">Thursday</th>
        	      <th scope="col">Friday</th>
        	      <th scope="col">Saturday</th>
      	      </tr>
        	    <tr align="center" style="font-weight:normal;">
        	      <th scope="row"><input type='checkbox' name='select[]'/>8:00AM</th>
        	      <td><input type='checkbox' name='select[]'/>8:00AM</td>
        	      <td>&nbsp;</td>
        	      <td>&nbsp;</td>
        	      <td>&nbsp;</td>
        	      <td>&nbsp;</td>
        	      <td>&nbsp;</td>
      	      </tr>
        	    <tr>
        	      <th scope="row">&nbsp;</th>
        	      <td>&nbsp;</td>
        	      <td>&nbsp;</td>
        	      <td>&nbsp;</td>
        	      <td>&nbsp;</td>
        	      <td>&nbsp;</td>
        	      <td>&nbsp;</td>
      	      </tr>
        	    <tr>
        	      <th scope="row">&nbsp;</th>
        	      <td>&nbsp;</td>
        	      <td>&nbsp;</td>
        	      <td>&nbsp;</td>
        	      <td>&nbsp;</td>
        	      <td>&nbsp;</td>
        	      <td>&nbsp;</td>
      	      </tr>
        	    <tr>
        	      <th scope="row">&nbsp;</th>
        	      <td>&nbsp;</td>
        	      <td>&nbsp;</td>
        	      <td>&nbsp;</td>
        	      <td>&nbsp;</td>
        	      <td>&nbsp;</td>
        	      <td>&nbsp;</td>
      	      </tr>
        	    <tr>
        	      <th scope="row">&nbsp;</th>
        	      <td>&nbsp;</td>
        	      <td>&nbsp;</td>
        	      <td>&nbsp;</td>
        	      <td>&nbsp;</td>
        	      <td>&nbsp;</td>
        	      <td>&nbsp;</td>
      	      </tr>
        	    <tr>
        	      <th scope="row">&nbsp;</th>
        	      <td>&nbsp;</td>
        	      <td>&nbsp;</td>
        	      <td>&nbsp;</td>
        	      <td>&nbsp;</td>
        	      <td>&nbsp;</td>
        	      <td>&nbsp;</td>
      	      </tr>
      	    </table>
            
            <div align="center">
            <h1>Message</h1>
            <label for='subject'>Subject: </label><input type="text" name="subject" value="Interview Requested" /><br>
            <label for='subject'>Body: </label><textarea name="message"></textarea>
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
