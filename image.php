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

/**
Change picture.
**/
if ($_POST['upload'] == "Upload")
{
	$path = pathinfo($_FILES['picture']['name']);
	$ext = strtolower($path['extension']);
	$filename = '/images/'.$_SESSION['idnum'].".".$ext;
	$fname = __ROOT__.$filename;
	if (!move_uploaded_file($_FILES['picture']['tmp_name'], $fname))
	{
		$error = "failed to move uploaded file.";
	}
	$query = sprintf("UPDATE users SET picture='%s' WHERE idnum=%d LIMIT 1", $filename, $_SESSION['idnum']);
	$result = mysql_query($query);
	$option = "Home";
}
else if ($_POST['send'] == "Submit" || $_POST['add'] == "Add Another Job")
{
	$_SESSION['complete'] = 3;
	$company = $_POST['company'];
	$title = $_POST['title'];
	$work_month_start = $_POST['work_month_start'];
	$work_year_start = $_POST['work_year_start'];
	$work_month_end = $_POST['work_month_end'];
	$work_year_end = $_POST['work_year_end'];
	$achievement = $_POST['achievement'];
	$idnum = $_SESSION['idnum'];
	$work_start = $work_year_start."-".$work_month_start."-01"; //arbitrary day.
	$work_end = $work_year_end."-".$work_month_end."-01"; //arbitrary day.
	//Need to finish.
	$query = sprintf("INSERT INTO work_data (idnum, company_name, title, company_start, company_end, achievement) VALUES ('$idnum', '$company', '$title', '$work_start', '$work_end', '$achievement')");
	$result = mysql_query($query);
	if (!$result)
	{
		$error = mysql_error();	
	}
	
	if ($_POST['add'] == "Add Another Job")
	{
		header("Location: register.php");
	}
}
else if ($_POST['upload'] == "Home" || $_POST['skip'] == "Skip")
{
	header("Location: home.php");
}
$query = sprintf("SELECT picture FROM users WHERE idnum = %d", $_SESSION['idnum']);
$result = mysql_query($query);
if (!$result)
{
	$error = mysql_error();
}
$mes = mysql_fetch_assoc($result);
$filename = $mes['picture'];
if (!is_null($filename))
{
	$picture_html = sprintf("<img src='%s' width='300px'></img><br />", $filename);
}

if (!isset($option))
{
	$option = "Upload";
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
				<form enctype="multipart/form-data" action="image.php" method="post">
                <div align="center">
                <?=$picture_html?>
                </div>
                <div>
                    <label class="field" for="picture">Upload Picture: </label>
                    <input type="file" name="picture" width="300px;"/>
                </div>
                <span id="image_mes" style="color:#999; text-align: center;">
                
                </span>
                <div align="center">
                <input type="submit" name="upload" value="<?=$option?>" onClick="return img_up();"/>
                <input type="submit" name="skip" value="Skip" />
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
