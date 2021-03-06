<?php
session_start();
define('__ROOT__', dirname(__FILE__)); 
require_once(__ROOT__.'/generalfunctions/database.php');
require_once(__ROOT__.'/generalfunctions/friends_functions.php');
$connect = connectToDatabase();
if (!$connect)
{
	$error = "failed to connect";
}

if (isset($_GET['w_id']))
{
	$wid = $_GET['w_id'];
	$query = sprintf("SELECT * FROM work_data WHERE w_id = %d", $_GET['w_id']);
	$result = mysql_query($query);
	if (!$result)
	{
		$error = "error retrieving work experience.";
	}
	$experience = mysql_fetch_assoc($result);
	$month_start = substr($experience['company_start'], 5, 2);
	$year_start = substr($experience['company_start'], 0, 4);
	$month_end = substr($experience['company_end'], 5, 2);
	$year_end = substr($experience['company_end'], 0, 4);
	$option = "Apply Changes";
}
else if ($_POST['add'] = "Add Another Job")
{
	$option = "Add";
}
else if ($_POST['skip']=="Skip")
{
	header("Location: home.php");
}

if ($_POST['send'] == "Apply Changes" || $_POST['send'] == "Add")
{
	$wid = $_POST['wid'];
	$company = $_POST['company'];
	$title = $_POST['title'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$work_month_start = $_POST['work_month_start'];
	$work_year_start = $_POST['work_year_start'];
	$work_month_end = $_POST['work_month_end'];
	$work_year_end = $_POST['work_year_end'];
	$achievement = $_POST['achievement'];
	$start_salary = $_POST['start_salary'];
	$end_salary = $_POST['end_salary'];
	$idnum = $_SESSION['idnum'];
	$company_start = $work_year_start."-".$work_month_start."-01"; //arbitrary day.
	$company_end = $work_year_end."-".$work_month_end."-01"; //arbitrary day.
	
	if ($_POST['send'] == "Apply Changes" && isset($_POST['present']))
	{
		$query = sprintf("UPDATE work_data SET company_name='$company', title='$title', city='$city', state='$state', company_start='$company_start', company_end='$company_end', present=1, achievement='$achievement' WHERE w_id=$wid");
	}
	else if ($_POST['send'] == "Apply Changes")
	{
		$query = sprintf("UPDATE work_data SET company_name='$company', title='$title', city='$city', state='$state', company_start='$company_start', company_end='$company_end', present=0, achievement='$achievement' WHERE w_id=$wid");
	}
	else if (isset($_POST['present']))
	{
		$query = sprintf("INSERT INTO work_data (idnum, company_name, title, company_start, company_end, city, state, present, achievement) VALUES ('$idnum', '$company', '$title', '$company_start', '$company_end', '$city', '$state', 1, '$achievement')");
	}
	else
	{
		$query = sprintf("INSERT INTO work_data (idnum, company_name, title, company_start, company_end, city, state, present, achievement) VALUES ('$idnum', '$company', '$title', '$company_start', '$company_end', '$city', '$state', 0, '$achievement')");
	}
	$result = mysql_query($query);
	if (!$result)
	{
		$error = mysql_error();
	}
	$message = "<p id='update_message'>Work experience updated.</p>";
	
	/**
	Pull up information after updating.
	**/
	$query = sprintf("SELECT * FROM work_data WHERE w_id = %d", $wid);
	$result = mysql_query($query);
	if (!$result)
	{
		$error = "error retrieving work experience.";
	}
	$experience = mysql_fetch_assoc($result);
	$month_start = substr($experience['company_start'], 5, 2);
	$year_start = substr($experience['company_start'], 0, 4);
	$month_end = substr($experience['company_end'], 5, 2);
	$year_end = substr($experience['company_end'], 0, 4);
	$option = "Apply Changes";
}
else if ($_POST['send'] == "Delete")
{
	$wid = $_POST['wid'];
	
	$query = sprintf("DELETE FROM work_data WHERE w_id=$wid");
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

$supervisor = listOfFriends($_SESSION['idnum'], $experience['supervisor']);

mysql_close();

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
			  <h1 id='edit_title'>Work Experience:</h1>
              <form action='work.php' method='post'>
              <?=$error?><?=$message?><br>
              <ul id='education'>
                <li>
                    <label class='field'>Company Name: </label><input type='text' name='company' size=20 value="<?=$experience['company_name']?>" />
                </li>
                <li>
                    <label class='field'>Title: </label><input type='text' name='title' value="<?=$experience['title']?>" />
                </li>
                <li>
                <label class="field">City: </label><input name="city" value="<?=$experience['city']?>" style="width: 150px;" /> State: <input name="state" value="<?=$experience['state']?>" style="width: 60px;" />
                </li>
                <li>
                    <label class='field'>Time Period: </label>
                    <script>
			document.write("<select name=\"work_month_start\">");
			months();
			document.write("<select name=\"work_year_start\">");
			years(<?=$year_start?>);
			document.write("<label class=\"hide_if_present\"> - </label>");
			document.write("<select class=\"hide_if_present\" name=\"work_month_end\">");
			months();
			document.write("<select class=\"hide_if_present\" name=\"work_year_end\">");
			years(<?=$year_end?>);
			selectMonth("work_month_start", "<?=$month_start?>");
			selectMonth("work_month_end", "<?=$month_end?>");
                    </script><br>
			<label class='subscript'>Currently Employed: </label><input onclick="hideIfPresent()" type="checkbox" name="present" value="1" <?=$c_employed?>>
                </li>
                <li>
                <label class='field'>Achievement(s): </label><textarea name='achievement' rows='3'><?=$experience['achievement']?></textarea>
                </li>
                <br>
                <li>
                <label class="field">Starting Salary: </label><input name="start_salary" value="<?=$experience['start_salary']?>" style="width: 110px;" /> Ending Salary: <input name="end_salary" value="<?=$experience['end_salary']?>" style="width: 110px;" />
                </li>
                <li>
                <label class='field'>Supervisor Name: </label><select name='supervisor'>
                <?=$supervisor?>
                </select>
                </li>
                
                <li><span style='margin-left: 300px;'>
                <input type="hidden" name="wid" value="<?=$wid?>">
                <input type='submit' name='send' value='<?=$option?>' />
                <input type='submit' name='skip' value='Cancel' onclick="location.href='cprofile.php'; return false;" />
                <input type='submit' name='send' value='Delete' />
                <input type='submit' name='add' value='Add Another Job' />
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
