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
Modify education.
**/
if (isset($_GET['education']))
{
	
	if ($_POST['submit'] == "Submit")
	{
		$college = $_POST['college'];
		$title = $_POST['title'];
		$major = $_POST['major'];
		$college_month_start = $_POST['college_month_start'];
		$college_year_start = $_POST['college_year_start'];
		$college_month_end = $_POST['college_month_end'];
		$college_year_end = $_POST['college_year_end'];
		$gpa = $_POST['gpa'];
		$organization = $_POST['activities'];
		$idnum = $_SESSION['idnum'];
		$college_start = $college_year_start."-".$college_month_start."-01"; //arbitrary day.
		$college_end = $college_year_end."-".$college_month_end."-01"; //arbitrary day.
		if (!is_null($education))
		{
			$query = sprintf("UPDATE education_data SET college='$college', title='$title', major='$major', college_start='$college_start', college_end='$college_end', gpa='$gpa', organization='$organization' WHERE idnum=$idnum LIMIT 1");
		}
		else
		{
			$query = sprintf("INSERT INTO education_data (idnum, college, title, major, college_start, college_end, gpa, organization) VALUES ('$idnum', '$college', '$title', '$major', '$college_start', '$college_end', '$gpa', '$organization')");
		}
		$result = mysql_query($query);
		if (!$result)
		{
			echo mysql_error();	
		}
		$query = sprintf("SELECT * FROM education_data WHERE idnum=%d", $_SESSION['idnum']);
		$result = mysql_query($query);
		$education = mysql_fetch_assoc($result);
		$_SESSION['education'] = $education;
		$message = "<p id='update_message'>Education updated.</p>";
	}
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
	$form_info = sprintf("<h1 id='edit_title'>Education:</h1>
              <form action='register.php' method='post'>
              <ul id='education'>
                <li><label class='field' for='college'>College Name: </label>
                <select id='college' name='college' size=1 style='width: 300px;' onchange='addothercollege()'>
                    <option value='Vanderbilt University'>Vanderbilt University</option> 
                    <option value='other'>Other</option>		
                </select></li>
                <li><input id='other' type='hidden' name='other' width='100'/></li>
                <li><label class='field' for='college'>Title: </label>
                <select name='title' size=1 style='width: 300px;'>
                    <option value='Bachelor of Arts'>Bachelor of Arts</option>
                    <option value='Bachelor of Science'>Bachelor of Science</option>
                    <option value='Bachelor of Engineering'>Bachelor of Engineering</option>
                    <option value='Bachelor of Nursing'>Bachelor of Nursing</option>
                    <option value='Associate's Degree'>Associate's Degree</option> </select></li>
                    
                <li><label class='field' for='major'>Area(s) of Study: </label> <input type='text' name='major'/></li>
            <label class='subscript' for='major'>Example: Computer Science, Math</label><br>
                <li><label class='field' for='college_year_start'>Time Attended: </label>
                <script type='text/javascript'>
                college_form();
                </script>
            </li>
                <li><label class='field' for='gpa'>Cumulative GPA<sup>1</sup>: </label> <input name='gpa' size=8/></li>
            <li><label class='field' for='activities'>Activities during College: </label>
            <textarea name='activities' rows='3'></textarea></li>
            <li>
            <span style='margin-left: 300px;'><input type='submit' name='education' value='Submit' />
            <input type='submit' name='skip' value='Skip' /></span></li>
            </ul>
        </form>");
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
	$organization = $_POST['organization'];
	 
	$college_start = $college_year_start."-".$college_month_start."-01"; //arbitrary day.
	$college_end = $college_year_end."-".$college_month_end."-01"; //arbitrary day.
	if ($college == 'other')
	{
		$query = sprintf("INSERT INTO education_data (idnum, college, title, major, college_start, college_end, gpa, organization) VALUES ('$idnum', '$other', '$title', '$major', '$college_start', '$college_end', '$gpa', '$organization')");
	}
	else
	{
		$query = sprintf("INSERT INTO education_data (idnum, college, title, major, college_start, college_end, gpa, organization) VALUES ('$idnum', '$college', '$title', '$major', '$college_start', '$college_end', '$gpa', '$organization')");
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
			  <?=$form_info?>
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
