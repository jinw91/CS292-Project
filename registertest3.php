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

if ($_POST['submit'] == "Register Now")
{
	$_SESSION['complete'] = 1;
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$emailaddress = $_POST['emailaddress'];
	$user_password = $_POST['user_password'];
	
	$emailavailable = emailAvailable($emailaddress);
	if ($emailavailable)
	{
		$query = "INSERT INTO users (email, password, first_name, last_name) VALUES ('$emailaddress', '$user_password', '$first_name', '$last_name')";
	
		$result = mysql_query($query);
		if (!$result)
		{
			$error = mysql_error();	
		}
		$_SESSION['idnum'] = validateLogin($emailaddress, $user_password);
		
		
	}
	else
	{
		//header("Location: index.php");
	}
}
else if ($_POST['education']=="Submit")
{
	$_SESSION['complete'] = 2;
	$college = $_POST['college'];
	$other = $_POST['other'];
	$title = $_POST['title'];
	$major = $_POST['major'];
	$college_month_start = $_POST['college_month_start'];
	$college_year_start = $_POST['college_year_start'];
	$college_month_end = $_POST['college_month_end'];
	$college_year_end = $_POST['college_year_end'];
	$gpa = $_POST['gpa'];
	$idnum = $_SESSION['idnum'];
	$honors = $_POST['honors'];
	 
	$college_start = $college_year_start."-".$college_month_start."-01"; //arbitrary day.
	$college_end = $college_year_end."-".$college_month_end."-01"; //arbitrary day.
	if ($college == 'other')
	{
		$query = sprintf("INSERT INTO education_data (idnum, college, title, major, college_start, college_end, gpa, honors) VALUES ('$idnum', '$other', '$title', '$major', '$college_start', '$college_end', '$gpa', '$honors')");
	}
	else
	{
		$query = sprintf("INSERT INTO education_data (idnum, college, title, major, college_start, college_end, gpa, honors) VALUES ('$idnum', '$college', '$title', '$major', '$college_start', '$college_end', '$gpa', '$honors')");
	}
	$result = mysql_query($query);
	if (!$result)
	{
		echo mysql_error();	
	}
	$form_info = "<h2>For the best use of your profile, please fill out your general work experience.</h2>
              <form action='image.php' method='post'>
              <ul id='education'>
                <li>
                    <label class='field' for='company'>Company Name: </label>
                    <input type='text' name='company' size=20/>
                </li>
                <li>
                    <label class='field' for='title'>Title: </label> <input type='text' name='title'/>
                </li>
                <li>
                    <label class='field' for='work_year_start'>Time Period: </label>
                    <script>
                    work_form();
                    </script>
                </li>
                <li>
                <label class='field' for='achievement'>Achievement(s): </label><textarea name='achievement' rows='3'></textarea>
                </li>
                <li><span style='margin-left: 300px;'>
                <input type='submit' name='send' value='Submit' />
                <input type='submit' name='skip' value='Skip' />
                <input type='submit' name='add' value='Add Another Job' />
                </span></li>
            </form>";
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
          	  <img src='site_im/two-thirds.png'>
			  <p><h2>Since you have no work experience, please fill out your extracurriculars.<br>Here's how it will appear:</h2></p>
              <img src='site_im/sample_extra.png'>
              <h2>Please fill out your extracurricular activities and leadership: </h2>
              <form action='image.php' method='post' onSubmit='return validate_work();'>
              <ul id='education'>
                <li>
                    <label class='field' for='organization'>Organization Name: </label>
                    <input type='text' name='organization' id='name' size=20/>
                </li>
                <li>
                    <label class='field' for='title'>Title: </label> <input type='text' name='title' id='title'/>
                </li>
                <li><label class='field' for='city'>City: </label><input name='city' id='city' width='150px'/> State: <input name='state' id='state' style='width: 60px;' /></li>
                <li>
                    <label class='field' for='work_year_start'>Time Period: </label>
                    <script>
                    work_form();
                    </script><br>
                <label class='subscript' for='present'>Currently Involved: </label>
                    <input type="checkbox" name="present" value="1">
                    </li>
                <li>
                <label class='field' for='achievement'>Achievement(s): </label><textarea name='achievement' rows='3'></textarea>
                </li>
                <li><span style='margin-left: 300px;'>
                <input type='submit' name='send' value='Submit' />
                <input type='submit' name='send' value='Skip' />
                <input type='submit' name='add' value='Add Another Job' />
                </span></li></ul>
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
