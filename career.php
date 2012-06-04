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

if ($_POST['add_job'] == "Submit")
{
	$job_name = $_POST['job_name'];
	$major = $_POST['major'];
	$pay = $_POST['pay'];
	$internship = 0;
	if (isset($_POST['internship']))
	{
		$internship = 1;
	}
	$city = $_POST['city'];
	$state = $_POST['state'];
	$rate = $_POST['rate'];
	$description = $_POST['description'];
	$company_name = $_SESSION['company']['company_name'];
	$b_id = $_SESSION['company']['b_id'];
	
	if (trim($_POST['jid']) != "")
	{
		$query = sprintf("UPDATE careers SET company_name='$company_name', b_id='$b_id', job_name='$job_name', major='$major', job_description='$description', pay='$pay', rate='$rate', city='$city', state='$state', internship='$internship' WHERE jid=%d", $_POST['jid']);
	}
	else
	{
		$query = sprintf("INSERT INTO careers (company_name, b_id, job_name, major, job_description, pay, rate, city, state, country, internship) VALUES ('$company_name', '$b_id', '$job_name', '$major', '$description', '$pay', '$rate', '$city', '$state', 'United States', $internship)");
	}
	$result = mysql_query($query);
	if (!$result)
	{
		$error = $query.mysql_error();
	}
	$query = sprintf("SELECT * FROM careers WHERE company_name='$company_name' AND job_name='$job_name'");
	$result = mysql_query($query);
	if (!$result)
	{
		$error = $query." ".mysql_error();
	}
}

else if ($_POST['add_job'] == "Delete")
{
	$query = sprintf("DELETE FROM careers WHERE jid='%d'", $_POST['jid']);
	$result = mysql_query($query);
	if (!$result)
	{
		$error = $query." ".mysql_error();
	}
}

if (isset($_GET['jid']) || trim($_POST['jid']) != "")
{
	$query = sprintf("SELECT * FROM careers WHERE jid='%d'", $_GET['jid']);
	$result = mysql_query($query);
	$job = mysql_fetch_assoc($result);
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
            <h1 id='edit_title'>Edit Job Opening:</h1>
            <form id="careers" action="career.php" method="post">
            <?=$error?><?=$message?><br>
            <ul id="education">
            <li>
            <label class="field">Job Name: </label><input name="job_name" type="text" value="<?=$job['job_name']?>" />
            </li>
            <li>
            <label class="field">Major(s): </label><input name="major" type="text" value="<?=$job['major']?>" />
            </li>
            <li>
            <label class="field">Pay: </label><input name="pay" value="<?=$job['pay']?>" />
            <select name="rate">
            <option selected="selected">Annual/Total</option>
            <option>Hourly</option>
            <option>Weekly</option>
            </select> 
            <label>Internship: </label><input name="internship" type="checkbox" value="1" />
            </li>
            <li>
            <label class="field">City: </label><input name="city" value="<?=$job['city']?>" size=20 /> State: <input name="state" size=3 value="<?=$job['state']?>" />
            </li>
            <li>
            <label class="field">Description: </label><textarea name="description" rows="5"><?=$job['job_description']?></textarea>
            </li>
            <li>
            <label class="field">Qualification(s): </label><textarea name="qualifications" rows="5"><?=$job['qualifications']?></textarea>
            </li>
            <li><span style="margin-left: 300px;">
            <input type="submit" name="add_job" value="Submit"/>
            <input type="submit" name="add_job" value="Delete"/>
            </span>
            <input type="hidden" name="jid" value="<?=$_GET['jid']?>"/>
            </li></ul>
            </form>
            <script type="text/javascript">
			selectDefault('rate', '<?=$job['rate']?>');
			</script>
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
