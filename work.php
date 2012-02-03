<?php
session_start();
if ($_POST['skip'] == "Cancel")
{
	header("Location: home.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Professional Archives</title>
<script type="text/javascript" src="simple.js"></script>
<link href="member.css" rel="stylesheet" type="text/css" />
</head>

<body>
<script type="text/javascript">
var counter = 1;
var limit = 3;
function addfield(divName)
{
	if (counter == limit)  
	{
		alert("Only 3 majors allowed per institution.");
	}
	else 
	{
		var newdiv = document.createElement('div');
		newdiv.innerHTML = "<label class='field' for='major"+counter+"'>Major: </label> <input type='text' name='major'/>";
		document.getElementById(divName).appendChild(newdiv);
		counter++;
	}
}
</script>
<?php
define('__ROOT__', dirname(__FILE__)); 
require_once(__ROOT__.'/generalfunctions/database.php');
$tbl_name="users";
$connect = connectToDatabase();
if (!$connect)
{
	echo "failed to connect";	
}

if (isset($_GET['w_id']))
{
	$query = sprintf("SELECT * FROM work_data WHERE w_id = %d", $_GET['w_id']);
	$result = mysql_query($query);
	if (!$result)
	{
		echo "error retrieving work experience.";
	}
	$experience = mysql_fetch_assoc($result);
	$month_start = substr($experience['company_start'], 5, 2);
	$year_start = substr($experience['company_start'], 0, 4);
	$month_end = substr($experience['company_end'], 5, 2);
	$year_end = substr($experience['company_end'], 0, 4);
}

if ($_POST['send'] == "Apply Changes")
{
	$company = $_POST['company'];
	$title = $_POST['title'];
	$work_month_start = $_POST['work_month_start'];
	$work_year_start = $_POST['work_year_start'];
	$work_month_end = $_POST['work_month_end'];
	$work_year_end = $_POST['work_year_end'];
	$achievement = $_POST['achievement'];
	$idnum = $_SESSION['idnum'];
	$company_start = $work_year_start."-".$work_month_start."-01"; //arbitrary day.
	$company_end = $work_year_end."-".$work_month_end."-01"; //arbitrary day.
	
	$query = sprintf("INSERT INTO work_data (idnum, company_name, title, company_start, company_end, achievement) VALUES ('$idnum', '$company', '$title', '$company_start', '$company_end', '$achievement')");
	$result = mysql_query($query);
	if (!$result)
	{
		echo mysql_error();	
	}
	$message = "<p id='update_message'>Work experience updated.</p>";
}
else if ($_POST['send'] == "Delete")
{
	$w_id = $_POST['w_id'];
	
	$query = sprintf("DELETE FROM work_data WHERE w_id=$w_id");
	$result = mysql_query($query);
	if (!$result)
	{
		echo mysql_error();	
	}
	$message = "<p id='update_message'>Work experience deleted.</p>";
}

$connect = mysql_close();
if (!$connect) {echo "database not closed";}
?>
<div class="inner" id="sitebk">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <th height="56" colspan="2" scope="col" class="top">
    <div id="sitenav" align="right"><ul>
    <li><a href="./home.php">Home</a></li> 
    <li><a href="profile.php">Profile</a></li>
    <li><a href="inbox.php">Inbox</a></li>
    <li><a href="careers.php">Careers</a></li></ul>
    </div></th>
    <th width="15%" scope="col" class="tright">
    <div id="sitenav" align="center">
    <ul><li><a href="logout.php">Logout</a></li></ul></div>
    </th>
  </tr>
  <tr>
    <th colspan="2" scope="row">
    <form action="work.php" method="post">
	<h1 id="edit_title">Work:</h1>
    <?=$message?><br />
    <div>
        <label class="field" for="company">Company Name: </label>
        <input type="text" name="company" value="<?=$experience['company_name']?>" size=20/>
    </div>
    <div id="static_major">
        <label class="field" for="title">Title: </label> <input type="text" name="title" value="<?=$experience['title']?>"/>
    </div>
    <div id="date">
    	<label class="field" for="work_year_start">Time Period: </label>
        <script>
		document.write("<select name=\"work_month_start\">");
		months();
		document.write("<select name=\"work_year_start\">");
		years(<?=$year_start?>);
		document.write("<label for=\"work_month_end\"> - </label>");
		document.write("<select name=\"work_month_end\">");
		months();
		document.write("<select name=\"work_year_end\">");
		years(<?=$year_end?>);
		selectMonth("work_month_start", "<?=$month_start?>");
		selectMonth("work_month_end", "<?=$month_end?>");
		</script>
    </div>
	<div>
	<label class="field" for="achievement">Achievement(s): </label><textarea name="achievement" rows="3"><?=$experience['achievement']?></textarea>
    </div>
    <div align="center">
    <input type="hidden" name="w_id" value="<?=$_GET['w_id']?>" />
	<input type="submit" name="send" value="Apply Changes" />
	<input type="submit" name="send" value="Delete" />
	<input type="submit" name="add" value="Add Another Job" />
    </div>
</form></th>
  <th scope="row">&nbsp;</th>
  </tr>
  <tr>
    <th height="70" colspan="2" scope="row"  style="border-top: 1px solid #4F7D7D;">
    <?php
	define('__ROOT__', dirname(__FILE__)); 
	require_once(__ROOT__.'/generalfunctions/template.php');
	echo printFooter();
	?>
    <th scope="row">&nbsp;</th>
  </tr>
</table>
</div>
</body>
</html>