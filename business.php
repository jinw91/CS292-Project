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

if ($_POST['submit'] == "Save")
{
	$company_name = $_POST['company_name'];
	$sector = $_POST['sector'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$description = $_POST['description'];
	$idnum = $_SESSION['idnum'];
	//Picture exists
	if (!empty($_FILES['picture']['tmp_name']))
	{
		$path = pathinfo($_FILES['picture']['name']);
		$ext = strtolower($path['extension']);
		$filename = '/business_img/'.$_SESSION['idnum'].".".$ext;
		$fname = __ROOT__.$filename;
		if (!move_uploaded_file($_FILES['picture']['tmp_name'], $fname))
		{
			$error = "failed to move uploaded file.";
		}
		if (isset($_SESSION['company']))
		{
			$query = sprintf("UPDATE businesses SET company_name='$company_name', sector='$sector', description='$description', city='$city', state='$state', picture='$filename' WHERE b_id=%d", $_SESSION['company']['b_id']);
		}
		else
		{
			$query = sprintf("INSERT INTO businesses (company_name, sector, description, city, state, creator, picture) VALUES ('$company_name', '$sector', '$description', '$city', '$state', $idnum, '$filename')");
		}
	}
	else if (isset($_SESSION['company']))
	{
		$query = sprintf("UPDATE businesses SET company_name='$company_name', sector='$sector', description='$description', city='$city', state='$state' WHERE b_id=%d", $_SESSION['company']['b_id']);
	}
	else
	{
		$query = sprintf("INSERT INTO businesses (company_name, sector, description, city, state, creator) VALUES ('$company_name', '$sector', '$description', '$city', '$state', $idnum)");
	}
	$result = mysql_query($query);
	if (!$result)
	{
		$error = mysql_error();
	}
	$query = sprintf("SELECT * FROM businesses WHERE company_name='%d' AND creator='%d'", $_SESSION['company']['b_id'], $idnum);
	$result = mysql_query($query);
	if (!$result)
	{
		$error = mysql_error();
	}
	$_SESSION['company'] = mysql_fetch_assoc($result);
	$message = "<p id='update_message'>Business updated.</p>";
}

if (isset($_SESSION['company']))
{
	$filename = $_SESSION['company']['picture'];
	if (trim($filename) != "")
	{
		$picture = "<img align='center' src='$filename' width='265px' />";
	}
	$company_name = $_SESSION['company']['company_name'];
	$sector = $_SESSION['company']['sector'];
	$city = $_SESSION['company']['city'];
	$state = $_SESSION['company']['state'];
	$description = $_SESSION['company']['description'];
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
			  <h1 id='edit_title'>EDIT BUSINESS:</h1>
              <form id="careers" enctype="multipart/form-data" action="business.php" method="post">
              <?=$error?><?=$message?><br>
              <ul id='education'>
              <?=$picture?>
              <li><label class="field" for="company_name">Company Name: </label><input type="text" name="company_name" value="<?=$company_name?>"/></li>
              <li><label class="field" for="sector">Sector: </label><input name="sector" type="text" value="<?=$sector?>"/></li>
    		  <li><label class="field" for="city">City: </label><input name="city" size=20 value="<?=$city?>"/> State: <input name="state" size=3 value="<?=$state?>"/></li>
			  <li><label class="field" for="description">Description: </label><textarea name="description" rows="10"><?=$description?></textarea></li>
              <fieldset>
              <li><label class="field" for="description">Company Image: </label><input type="file" name="picture"></li>
              </fieldset>
    		  <li>
            <span style='margin-left: 300px;'><input type="submit" name="submit" value="Save"/></span></li>
            </ul>
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
