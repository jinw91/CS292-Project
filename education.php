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
$query = "SELECT * FROM education_general";
$result = mysql_query($query);
$college_list = "";
while ($college = mysql_fetch_assoc($result)) {
	$college_list = $college_list."<option value='".$college['college']."'>".$college['college']."</option>";
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
	$type = $_POST['type'];
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
		$query = sprintf("UPDATE education_data SET college='$college', type='$type', title='$title', major='$major', minor='$minor', college_start='$college_start', college_end='$college_end', gpa='$gpa', honors='$honors' WHERE idnum=$idnum LIMIT 1");
	}
	else
	{
		$query = sprintf("INSERT INTO education_data (idnum, type, college, title, major, minor, college_start, college_end, gpa, honors) VALUES ('$idnum', '$type', '$college', '$title', '$major', '$minor', '$college_start', '$college_end', '$gpa', '$honors')");
	}
	$result = mysql_query($query);
	if (!$result)
	{
		echo mysql_error();	
	}
}
$query = sprintf("SELECT * FROM education_data WHERE idnum=%d", $_SESSION['idnum']);
$result = mysql_query($query);
$education = mysql_fetch_assoc($result);

//Select box
if ($education['type']==0)
{
	$attended = "<input type='radio' name='type' value='2' />Graduate School
				<input type='radio' name='type' value='1' />College
				<input type='radio' name='type' value='0' checked/>High School";
}
else if ($education['type']==1)
{
	$attended = "<input type='radio' name='type' value='2' />Graduate School
				<input type='radio' name='type' value='1' checked />College
				<input type='radio' name='type' value='0' />High School";
}
else if ($education['type'] == 2)
{
	$attended = "<input type='radio' name='type' value='2' checked/>Graduate School
				<input type='radio' name='type' value='1' />College
				<input type='radio' name='type' value='0' />High School";
}
else
{
	$attended = "<input type='radio' name='type' value='2' />Graduate School
				<input type='radio' name='type' value='1' />College
				<input type='radio' name='type' value='0' />High School";
}

$month_start = substr($education['college_start'], 5, 2);
$year_start = substr($education['college_start'], 0, 4);
$month_end = substr($education['college_end'], 5, 2);
$year_end = substr($education['college_end'], 0, 4);
$_SESSION['education'] = $education;
$message = "<p id='update_message'>Education updated.</p>";
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
		<?=$college_list?>
		<option value='other'>Other</option>		
                </select></li>
                <li id="school"></li>
                <li><label class='field' for='college'>Attended School for: </label>
                <?=$attended?>
                </li>
                <li><label class='field' for='college'>Title: </label><input type='text' name='title' value='<?=$education['title']?>'></li>
                <li><label class='field'>Major(s): </label><input type='text' name='major' value="<?=$education['major']?>" />
            <label class='subscript'>Example: Computer Science, Math</label></li><br>
            <li><label class='field'>Minor(s): </label><input type='text' name='minor' value="<?=$education['minor']?>" />
            <label class='subscript'>Example: Corporate Strategies, Engineering Management</label></li><br>
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
				//selectDefault('title', "<?=$education['title']?>");
				selectDefault('college', "<?=$education['college']?>");
                </script>
            </li>
                <li><label class='field'>Cumulative GPA: </label><input name='gpa' size=8 value="<?=$education['gpa']?>" /></li>
            <li><label class='field'>Honors: </label><textarea name='honors' rows='3'><?=$education['honors']?></textarea>
            <label class='subscript'>Example: Dean's List, National Merit Scholarship</label><br></li>
            <li>
            <span style='margin-left: 300px;'><input type='submit' name='submit' value='Submit' />
            <input type='submit' name='skip' value='Cancel' onclick="location.href='cprofile.php'; return false;" />
            <input type='submit' name='add' value='Add Another School' /></span></li>
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
