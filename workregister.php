<?php
session_start();
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
<?php
define('__ROOT__', dirname(__FILE__)); 
require_once(__ROOT__.'/generalfunctions/database.php');
$tbl_name="users";
$connect = connectToDatabase();
if (!$connect)
{
	echo "failed to connect";	
}

if ($_POST['submit'] == "Submit")
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
}
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
    <form action="image.php" method="post">
	<div align="center"><p>For the best use of your profile, please fill out your general work experience. </p></div>
    <div>
        <label class="field" for="company">Company Name: </label>
        <input type="text" name="company" size=20/>
    </div>
    <div id="static_major">
        <label class="field" for="title">Title: </label> <input type="text" name="title"/>
    </div>
    <div id="date">
    	<label class="field" for="work_year_start">Time Period: </label>
        <script>
		document.write("<select name=\"work_month_start\">");
		months();
		document.write("<select name=\"work_year_start\">");
		years();
		document.write("<label for=\"work_month_end\"> - </label>");
		document.write("<select name=\"work_month_end\">");
		months();
		document.write("<select name=\"work_year_end\">");
		years();
		</script>
    </div>
	<div>
	<label class="field" for="achievement">Achievement(s): </label><textarea name="achievement" rows="3"></textarea>
    </div>
    <div align="center">
	<input type="submit" name="send" value="Submit" />
	<input type="submit" name="skip" value="Skip" />
	<input type="submit" name="add" value="Add Another Job" />
    </div>
</form></th>
  <th scope="row">&nbsp;</th>
  </tr>
  <tr>
    <th height="70" colspan="2" scope="row">
    <?php
	define('__ROOT__', dirname(__FILE__)); 
	require_once(__ROOT__.'/generalfunctions/template.php');
	echo printFooter();
	?>
    </th>
    <th scope="row">&nbsp;</th>
  </tr>
</table>
</div>
</body>
</html>