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

$work_code = "<img src='site_im/two-thirds.png'>
			  <p><h2>Here's how it will appear:</h2></p>
              <img src='site_im/sample_work.png'>
              <h2>Please fill out your work experience: </h2>
              <form action='image.php' method='post'>
              <ul id='education'>
                <li>
                    <label class='field' for='company'>Company Name: </label>
                    <input type='text' name='company' size=20/>
                </li>
                <li>
                    <label class='field' for='title'>Title: </label> <input type='text' name='title'/>
                </li>
                <li><label class='field' for='city'>City: </label><input name='city' width='150px'/> State: <input name='state' style='width: 60px;' /></li>
                <li>
                    <label class='field' for='work_year_start'>Time Period: </label>
                    <script>
                    work_form();
                    </script>
        		<br/><label class='subscript' for='present'>Currently Employed: </label>
                    <input type='checkbox' name='present' value='1'>
                </li>
                <li>
                <label class='field' for='achievement'>Achievement(s): </label><textarea name='achievement' rows='3'></textarea>
                </li>
                <li><span style='margin-left: 300px;'>
                <input type='submit' name='send' value='Submit' />
                <input type='submit' name='skip' value='Skip' />
                <input type='submit' name='add' value='Add Another Job' />
                </span></li></ul>
            </form>";
if ($_POST['submit'] == "Register Now")
{
	$_SESSION['complete'] = 1;
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$emailaddress = $_POST['emailaddress'];
	$user_password = mysql_real_escape_string(sha1(encrypt($_POST['user_password'])));
	
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
	$query = "SELECT * FROM education_general";
	$result = mysql_query($query);
	$college_list = "";
	while ($college = mysql_fetch_assoc($result)) {
		$college_list = $college_list."<option value='".$college['college']."'>".$college['college']."</option>";
	}

	$form_info = sprintf("<img src='site_im/one-thirds.png'>
			  <p><h2>Here's how it will appear:</h2></p>
              <img src='site_im/sample_education.png'>
              <h2>Please fill out your education: </h2>
              <form action='register.php' method='post' onSubmit='return validate_education();'>
              <ul id='education'>
                <li><label class='field' for='college'>College Name: </label>
                <select id='college' name='college' size=1 style='width: 300px;' onchange='addothercollege();'>".$college_list."
                    <option value='other'>Other</option>		
                </select></li>
                <li id='school'></li>
                <li><label class='field' for='college'>Title: </label>
                <select name='title' size=1 style='width: 300px;'>
                    <option value='Bachelor of Arts'>Bachelor of Arts</option>
                    <option value='Bachelor of Science'>Bachelor of Science</option>
                    <option value='Bachelor of Engineering'>Bachelor of Engineering</option>
                    <option value='Bachelor of Nursing'>Bachelor of Nursing</option>
                    <option value='Associate's Degree'>Associate's Degree</option> </select></li>
                    
                <li><label class='field' for='major'>Area(s) of Study: </label> <input type='text' name='major' id='major'/></li>
            <label class='subscript' for='major'>Example: Computer Science, Math</label><br>
                <li><label class='field' for='college_year_start'>Time Attended: </label>
                <script type='text/javascript'>
                college_form();
                </script>
            </li>
                <li><label class='field' for='gpa'>Cumulative GPA: </label> <input name='gpa' size=8/></li>
            <li><label class='field' for='honors'>Honors: </label>
            <textarea name='honors' rows='3'></textarea></li>
			<label class='subscript' for='honors'>Example: Dean's List, National Merit Scholarship</label><br>
            <li>
            <span style='margin-left: 300px;'><input type='submit' name='education' value='Submit'/></span></li>
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
	$form_info = $work_code;
}
/**
If resubmitting the work experience.
**/
else if ($_POST['add']=="Add Another Job")
{
	$_SESSION['complete'] = 2;
	$company = $_POST['company'];
	$title = $_POST['title'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$work_month_start = $_POST['work_month_start'];
	$work_year_start = $_POST['work_year_start'];
	$work_month_end = $_POST['work_month_end'];
	$work_year_end = $_POST['work_year_end'];
	$achievement = $_POST['achievement'];
	$idnum = $_SESSION['idnum'];
	$work_start = $work_year_start."-".$work_month_start."-01"; //arbitrary day.
	$work_end = $work_year_end."-".$work_month_end."-01"; //arbitrary day.
	$query = sprintf("INSERT INTO work_data (idnum, company_name, title, company_start, company_end, city, state, achievement) VALUES ('$idnum', '$company', '$title', '$work_start', '$work_end', '$city', '$state', '$achievement')");
	$result = mysql_query($query);
	if (!$result)
	{
		$error = mysql_error();	
	}
	$form_info = $work_code;
}
/**
If no work experience.
**/
else if ($_POST['send']=="Skip")
{
	$_SESSION['complete'] = 2;
	$form_info = "<img src='site_im/two-thirds.png'>
			  <p><h2>Since you have no work experience, please fill out your extracurriculars.<br>Here's how it will appear:</h2></p>
              <img src='site_im/sample_extra.png'>
              <h2>Please fill out your extracurricular activities and leadership: </h2>
              <form action='register.php' method='post' onSubmit='return validate_extra();'>
              <ul id='education'>
                <li>
                    <label class='field' for='name'>Organization Name: </label>
                    <input type='text' name='name' id='name' size=20/>
                </li>
                <li>
                    <label class='field' for='title'>Title: </label> <input type='text' name='title' id='title'/>
                </li>
                <li>
                    <label class='field' for='work_year_start'>Time Period: </label>
                    <script>
                    work_form();
                    </script><br>
                <label class='subscript' for='present'>Currently Involved: </label>
                    <input type='checkbox' name='present' value='1'>
                    </li>
                <li>
                <label class='field' for='achievement'>Achievement(s): </label><textarea name='achievement' rows='3'></textarea>
                </li>
                <li><span style='margin-left: 300px;'>
                <input type='submit' name='extra' value='Submit' />
                <input type='submit' name='extra' id='skip' value='Skip' />
                <input type='submit' name='add' value='Add Another Activity' />
                </span></li></ul>
            </form>";
}
else if ($_POST['send'] == "Submit")
{
	$_SESSION['complete'] = 3;
	$company = $_POST['company'];
	$title = $_POST['title'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$work_month_start = $_POST['work_month_start'];
	$work_year_start = $_POST['work_year_start'];
	$work_month_end = $_POST['work_month_end'];
	$work_year_end = $_POST['work_year_end'];
	$achievement = $_POST['achievement'];
	$idnum = $_SESSION['idnum'];
	$work_start = $work_year_start."-".$work_month_start."-01"; //arbitrary day.
	$work_end = $work_year_end."-".$work_month_end."-01"; //arbitrary day.
	$query = sprintf("INSERT INTO work_data (idnum, company_name, title, company_start, company_end, achievement) VALUES ('$idnum', '$company', '$title', '$work_start', '$work_end', '$achievement')");
	$result = mysql_query($query);
	if (!$result)
	{
		$error = mysql_error();	
	}
	header("Location: image.php");
}

/**
Adding extracurricular
**/
else if ($_POST['add']=="Add Another Activity")
{
	$_SESSION['complete'] = 3;
	$name = $_POST['name'];
	$title = $_POST['title'];
	$work_month_start = $_POST['work_month_start'];
	$work_year_start = $_POST['work_year_start'];
	$work_month_end = $_POST['work_month_end'];
	$work_year_end = $_POST['work_year_end'];
	$achievement = $_POST['achievement'];
	$idnum = $_SESSION['idnum'];
	$extra_start = $work_year_start."-".$work_month_start."-01"; //arbitrary day.
	$extra_end = $work_year_end."-".$work_month_end."-01"; //arbitrary day.
	if (isset($_POST['present']))
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
		$error = mysql_error();	
	}
	$form_info = "<img src='site_im/two-thirds.png'>
			  <p><h2>Here's how it will appear:</h2></p>
              <img src='site_im/sample_extra.png'>
              <h2>Please fill out your extracurricular activities and leadership: </h2>
              <form action='register.php' method='post' onSubmit='return validate_extra();'>
              <ul id='education'>
                <li>
                    <label class='field' for='name'>Organization Name: </label>
                    <input type='text' name='name' id='name' size=20/>
                </li>
                <li>
                    <label class='field' for='title'>Title: </label> <input type='text' name='title' id='title'/>
                </li>
                <li>
                    <label class='field' for='work_year_start'>Time Period: </label>
                    <script>
                    work_form();
                    </script><br>
                <label class='subscript' for='present'>Currently Involved: </label>
                    <input type='checkbox' name='present' value='1'>
                    </li>
                <li>
                <label class='field' for='achievement'>Achievement(s): </label><textarea name='achievement' rows='3'></textarea>
                </li>
                <li><span style='margin-left: 300px;'>
                <input type='submit' name='extra' value='Submit' />
                <input type='submit' name='extra' id='skip' value='Skip' />
                <input type='submit' name='add' value='Add Another Activity' />
                </span></li></ul>
            </form>";
}

/**
Finished adding
**/
else if ($_POST['extra'] == "Submit")
{
	$_SESSION['complete'] = 3;
	$name = $_POST['name'];
	$title = $_POST['title'];
	$work_month_start = $_POST['work_month_start'];
	$work_year_start = $_POST['work_year_start'];
	$work_month_end = $_POST['work_month_end'];
	$work_year_end = $_POST['work_year_end'];
	$achievement = $_POST['achievement'];
	$idnum = $_SESSION['idnum'];
	$extra_start = $work_year_start."-".$work_month_start."-01"; //arbitrary day.
	$extra_end = $work_year_end."-".$work_month_end."-01"; //arbitrary day.
	if (isset($_POST['present']))
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
		$error = mysql_error();	
	}
	header("Location: image.php");
}
/**
Skipped
**/
else if ($_POST['extra'] == "Skip")
{
	header("Location: image.php");
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
