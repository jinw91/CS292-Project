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

if (isset($_GET['l_id']))
{
	$lid = $_GET['l_id'];
	$query = sprintf("SELECT * FROM leadership_data WHERE l_id = %d", $_GET['l_id']);
	$result = mysql_query($query);
	if (!$result)
	{
		$error = "error retrieving work experience.";
	}
	$experience = mysql_fetch_assoc($result);
	$month_start = substr($experience['start'], 5, 2);
	$year_start = substr($experience['start'], 0, 4);
	$month_end = substr($experience['end'], 5, 2);
	$year_end = substr($experience['end'], 0, 4);
	$option = "Apply Changes";
}
else if ($_POST['add'] = "Add Another Activity")
{
	$option = "Add";
}
else if ($_POST['skip']=="Skip")
{
	header("Location: home.php");
}

if ($_POST['send'] == "Apply Changes" || $_POST['send'] == "Add")
{
	$lid = $_POST['lid'];
	$organization = $_POST['organization'];
	$title = $_POST['title'];
	$extra_month_start = $_POST['extra_month_start'];
	$extra_year_start = $_POST['extra_year_start'];
	$extra_month_end = $_POST['extra_month_end'];
	$extra_year_end = $_POST['extra_year_end'];
	$achievement = $_POST['achievement'];
	$idnum = $_SESSION['idnum'];
	$extra_start = $extra_year_start."-".$extra_month_start."-01"; //arbitrary day.
	$extra_end = $extra_year_end."-".$extra_month_end."-01"; //arbitrary day.
	
	if ($_POST['send'] == "Apply Changes" && isset($_POST['present']))
	{
		$query = sprintf("UPDATE leadership_data SET organization='$organization', title='$title', start='$extra_start', end='$extra_end', achievement='$achievement', present=1 WHERE l_id=$lid");
	}
	else if ($_POST['send'] == "Apply Changes")
	{
		$query = sprintf("UPDATE leadership_data SET organization='$organization', title='$title', start='$extra_start', end='$extra_end', achievement='$achievement', present=0 WHERE l_id=$lid");
	}
	else if (isset($_POST['present']))
	{
		$query = sprintf("INSERT INTO leadership_data (idnum, organization, title, start, end, present, achievement) VALUES ('$idnum', '$organization', '$title', '$extra_start', '$extra_end', 1, '$achievement')");
	}
	else
	{
		$query = sprintf("INSERT INTO leadership_data (idnum, organization, title, start, end, present, achievement) VALUES ('$idnum', '$organization', '$title', '$extra_start', '$extra_end', 0, '$achievement')");
	}
	$result = mysql_query($query);
	if (!$result)
	{
		$error = $query." lid=".$lid." ".mysql_error();
	}
	$message = "<p id='update_message'>Extracurricular updated.</p>";
	
	/**
	Pull up information after updating.
	**/
	$query = sprintf("SELECT * FROM leadership_data WHERE l_id = %d", $lid);
	$result = mysql_query($query);
	if (!$result)
	{
		$error = "error retrieving work experience.";
	}
	$experience = mysql_fetch_assoc($result);
	$month_start = substr($experience['extra_start'], 5, 2);
	$year_start = substr($experience['extra_start'], 0, 4);
	$month_end = substr($experience['extra_end'], 5, 2);
	$year_end = substr($experience['extra_end'], 0, 4);
	$option = "Apply Changes";
}
else if ($_POST['send'] == "Delete")
{
	$lid = $_POST['lid'];
	
	$query = sprintf("DELETE FROM leadership_data WHERE l_id=$lid");
	$result = mysql_query($query);
	if (!$result)
	{
		$error = mysql_error();	
	}
	$message = "<p id='update_message'>Work experience deleted.</p>";
}

if (isset($experience) && $experience['present'] > 0)
{
	$c_employed = "checked='checked'";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Professional Archives</title>
<meta charset="utf-8">
<meta name="viewport" content="lidth=device-lidth; initial-scale=1.0">
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
			  <h1 id='edit_title'>Extracurriculars:</h1>
              <form action='extracurricular.php' method='post'>
              <?=$error?><?=$message?><br>
              <ul id='education'>
                <li>
                    <label class='field'>Organization: <input type='text' name='organization' size=20 value="<?=$experience['organization']?>" /></label>
                </li>
                <li>
                    <label class='field'>Title (If Applicable): <input type='text' name='title' value="<?=$experience['title']?>" /></label>
                </li>
                <li>                    
                	<label class='field'>Time Period: </label>
                    <script>
                    document.write("<select name=\"extra_month_start\">");
					months();
					document.write("<select name=\"extra_year_start\">");
					years(<?=$year_start?>);
					document.write("<label> - </label>");
					document.write("<select name=\"extra_month_end\">");
					months();
					document.write("<select name=\"extra_year_end\">");
					years(<?=$year_end?>);
					selectMonth("extra_month_start", "<?=$month_start?>");
					selectMonth("extra_month_end", "<?=$month_end?>");
                    </script><br>
					<label class='subscript'>Currently Involved: <input type="checkbox" name="present" value="1" <?=$c_employed?> /></label>
                </li>
                <li>
                <label class='field'>Achievement(s): <textarea name='achievement' rows='3'><?=$experience['achievement']?></textarea></label>
                </li>
                <li><span style='margin-left: 300px;'>
                <input type="hidden" name="lid" value="<?=$lid?>">
                <input type='submit' name='send' value='<?=$option?>' />
                <input type='submit' name='send' value='Delete' />
                <input type='submit' name='add' value='Add Another Activity' />
                </span></li>
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
