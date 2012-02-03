<?php
session_start();
define('__ROOT__', dirname(__FILE__)); 
require_once(__ROOT__.'/generalfunctions/database.php');
$tbl_name="users";
$error = "";
$connect = connectToDatabase();
if (!$connect)
{
	$error = "failed to connect";	
}
if ($_POST['upload'] == "Home")
{
	header("Location: home.php");
}
else if ($_POST['upload'] == "Upload")
{
	$path = pathinfo($_FILES['picture']['name']);
	$filename = '/images/'.$_SESSION['idnum'].".".$path['extension'];
	$fname = __ROOT__.$filename;
	if (!move_uploaded_file($_FILES['picture']['tmp_name'], $fname))
	{
		$error = "failed to move uploaded file.";
	}
	$query = sprintf("UPDATE users SET picture='%s' WHERE idnum=%d LIMIT 1", $filename, $_SESSION['idnum']);
	$result = mysql_query($query);
	$option = "Home";
}
else if ($_POST['send'] == "Submit" || $_POST['add'] == "Add Another Job")
{
	$_SESSION['complete'] = 3;
	$company = $_POST['company'];
	$title = $_POST['title'];
	$work_month_start = $_POST['work_month_start'];
	$work_year_start = $_POST['work_year_start'];
	$work_month_end = $_POST['work_month_end'];
	$work_year_end = $_POST['work_year_end'];
	$achievement = $_POST['achievement'];
	$idnum = $_SESSION['idnum'];
	$work_start = $work_year_start."-".$work_month_start."-01"; //arbitrary day.
	$work_end = $work_year_end."-".$work_month_end."-01"; //arbitrary day.
	//Need to finish.
	$query = sprintf("INSERT INTO work_data (idnum, company_name, title, company_start, company_end, achievement) VALUES ('$idnum', '$company', '$title', '$work_start', '$work_end', '$achievement')");
	$result = mysql_query($query);
	if (!$result)
	{
		$error = mysql_error();	
	}
	
	if ($_POST['add'] == "Add Another Job")
	{
		header("Location: workregister.php");
	}
}

$query = sprintf("SELECT picture FROM users WHERE idnum=%d", $_SESSION['idnum']);
$result = mysql_query($query);
if (!$result)
{
	$error = mysql_error();
}
$mes = mysql_fetch_assoc($result);
$filename = $mes['picture'];

if (!isset($option))
{
	$option = "Upload";
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
<?=$error?>
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
    <form enctype="multipart/form-data" action="image.php" method="post">
	<div align="center"><p>For the best use of your profile, please add a recent picture of yourself. </p></div>
    <div>
        <label class="field" for="picture">Upload Picture: </label>
        <input type="file" name="picture"/>
    </div>
    <div align="center">
	<input type="submit" name="upload" value="<?=$option?>" />
	<input type="submit" name="skip" value="Skip" />
    </div>
</form>
<div align="center">
<?php
if (isset($filename))
{
	printf("<img src='%s' width='200' height='200'></img><br />", $filename);
}
?>
<?=$error?>
</div>
</th>
  <th scope="row">&nbsp;</th>
  </tr>
  <tr>
    <th height="70" colspan="2" scope="row"  style="border-top: 1px solid #4F7D7D;">
	<?php
	define('__ROOT__', dirname(__FILE__)); 
	require_once(__ROOT__.'/generalfunctions/template.php');
	echo printFooter();
	?>
    </th>
  </tr>
</table>
</div>
</body>
</html>