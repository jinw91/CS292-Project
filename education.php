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

$query = sprintf("SELECT * FROM education_data WHERE idnum=%d", $_SESSION['idnum']);
$result = mysql_query($query);
if (mysql_num_rows($result) == 0)
{
	$education = NULL;
}
else
{
	$education = mysql_fetch_assoc($result);
}
$month_start = substr($education['college_start'], 5, 2);
$year_start = substr($education['college_start'], 0, 4);
$month_end = substr($education['college_end'], 5, 2);
$year_end = substr($education['college_end'], 0, 4);

if ($_POST['submit'] == "Submit")
{
	$college = $_POST['college'];
	$title = $_POST['title'];
	$major = $_POST['major'];
	$minor = $_POST['minor'];
	$college_month_start = $_POST['college_month_start'];
	$college_year_start = $_POST['college_year_start'];
	$college_month_end = $_POST['college_month_end'];
	$college_year_end = $_POST['college_year_end'];
	$gpa = $_POST['gpa'];
	$honors = $_POST['honors'];
	$idnum = $_SESSION['idnum'];
	$college_start = $college_year_start."-".$college_month_start."-01"; //arbitrary day.
	$college_end = $college_year_end."-".$college_month_end."-01"; //arbitrary day.
	if (!is_null($education))
	{
		$query = sprintf("UPDATE education_data SET college='$college', title='$title', major='$major', minor='$minor', college_start='$college_start', college_end='$college_end', gpa='$gpa', honors='$honors' WHERE idnum=$idnum LIMIT 1");
	}
	else
	{
		$query = sprintf("INSERT INTO education_data (idnum, college, title, major, minor, college_start, college_end, gpa, honors) VALUES ('$idnum', '$college', '$title', '$major', '$minor', '$college_start', '$college_end', '$gpa', '$honors')");
	}
	$result = mysql_query($query);
	if (!$result)
	{
		echo mysql_error();	
	}
	$query = sprintf("SELECT * FROM education_data WHERE idnum=%d", $_SESSION['idnum']);
	$result = mysql_query($query);
	$education = mysql_fetch_assoc($result);
	$month_start = substr($education['college_start'], 5, 2);
	$year_start = substr($education['college_start'], 0, 4);
	$month_end = substr($education['college_end'], 5, 2);
	$year_end = substr($education['college_end'], 0, 4);
	$_SESSION['education'] = $education;
	$message = "<p id='update_message'>Education updated.</p>";
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
			  <h1 id='edit_title'>Education:</h1>
              <form action='education.php' method='post'>
              <?=$message?><br>
              <ul id='education'>
                <li><label class='field' for='college'>College Name: </label>
                <select id='college' name='college' size=1 style='width: 300px;' onchange='addothercollege();'>
                    <option value='Vanderbilt University'>Vanderbilt University</option>
					<option value='Duke University'>Duke University</option>
                    <option value='Northwestern University'>Northwestern University</option>
                 	<option value='University of Chicago'>University of Chicago</option>
                    <option value='University of Notre Dame'>University of Notre Dame</option>
                    <option value='University of North Carolina'>University of North Carolina</option>
                    <option value='University of Virginia'>University of Virginia</option>
                    <option value='Washington University in St. Louis'>Washington University in St. Louis</option>
                    <option value='other'>Other</option>		
                </select></li>
                <li id="school"></li>
                <li><label class='field' for='college'>Title: </label>
                <select name='title' size=1 style='width: 300px;'>
                    <option value='Bachelor of Arts'>Bachelor of Arts</option>
                    <option value='Bachelor of Science'>Bachelor of Science</option>
                    <option value='Bachelor of Engineering'>Bachelor of Engineering</option>
                    <option value='Bachelor of Nursing'>Bachelor of Nursing</option>
                    <option value='Associate's Degree'>Associate's Degree</option> </select></li>
                    
                <li><label class='field'>Major(s): <input type='text' name='major' value="<?=$education['major']?>" /></label>
            <label class='subscript'>Example: Computer Science, Math</label><br></li>
            <li><label class='field'>Minor(s): <input type='text' name='minor' value="<?=$education['minor']?>" /></label>
            <label class='subscript'>Example: Corporate Strategies, Engineering Management</label><br></li>
                <li><label class='field'>Time Attended: </label>
                <script>
                document.write("<select name=\"college_month_start\">");
				months();
				document.write("<select style=\"width: 60px;\" name=\"college_year_start\">");
				years("<?=$year_start?>");
				document.write("<label> - </label>");
				document.write("<select name=\"college_month_end\">");
				months();
				document.write("<select style=\"width: 60px;\" name=\"college_year_end\">");
				years("<?=$year_end?>");
				selectMonth("college_month_start", "<?=$month_start?>");
				selectMonth("college_month_end", "<?=$month_end?>");
				selectDefault('title', "<?=$education['title']?>");
				selectDefault('college', "<?=$education['college']?>");
                </script>
            </li>
                <li><label class='field'>Cumulative GPA: <input name='gpa' size=8 value="<?=$education['gpa']?>" /></label></li>
            <li><label class='field'>Honors: <textarea name='honors' rows='3'><?=$education['honors']?></textarea></label>
            <label class='subscript'>Example: Dean's List, National Merit Scholarship</label><br></li>
            <li>
            <span style='margin-left: 300px;'><input type='submit' name='submit' value='Submit' />
            <input type='submit' name='skip' value='Skip' /></span></li>
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
