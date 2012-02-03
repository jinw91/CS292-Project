<?php
session_start();
if (!isset($_SESSION['idnum']))
{
	header("Location: home.php");
}
define('__ROOT__', dirname(__FILE__)); 
require_once(__ROOT__.'/generalfunctions/database.php');
$tbl_name="users";
$connect = connectToDatabase();
if (!$connect)
{
	$error = "failed to connect";	
}

//Coming from job add.
if ($_POST['add_job'] == "Submit")
{
	$job_name = $_POST['job_name'];
	$major = $_POST['major'];
	$pay = $_POST['pay'];
	$internship = 0;
	if (isset($_POST['internship']))
	{
		$internship = 1;
	}
	$city = $_POST['city'];
	$state = $_POST['state'];
	$description = $_POST['description'];
	$company_name = $_SESSION['company']['company_name'];
	
	$query = sprintf("INSERT INTO careers (company_name, job_name, major, job_description, pay, city, state, country, internship) VALUES ('$company_name', '$job_name', '$major', '$description', $pay, '$city', '$state', 'United States', $internship)");
	$result = mysql_query($query);
	if (!$result)
	{
		$error = $query.mysql_error();
	}
}
//Coming from company add/edit.
else if ($_POST['submit'] == "Submit")
{
	$company_name = $_POST['company_name'];
	$sector = $_POST['sector'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$description = $_POST['description'];
	$idnum = $_SESSION['idnum'];
	if ($_SESSION['option_link'] == "new")
	{
		$query = sprintf("INSERT INTO businesses (company_name, sector, description, city, state, creator) VALUES ('$company_name', '$sector', '$description', '$city', '$state', $idnum)");
	}
	else
	{
		$query = sprintf("UPDATE INTO businesses (company_name, sector, description, city, state, creator) VALUES ('$company_name', '$sector', '$description', '$city', '$state', $idnum)");
	}
	$result = mysql_query($query);
	if (!$result)
	{
		$error = mysql_error();
	}
}

//Find businesses started by the user.
$query = sprintf("SELECT * FROM businesses WHERE creator=%d", $_SESSION['idnum']);
$result = mysql_query($query);
if (!$result)
{
	echo mysql_error();
}
// User does not own business.
elseif ((!isset($_GET['jid']) && mysql_num_rows($result) == 0 && isset($_SESSION['education'])) || isset($_GET['usermode']))
{
	if ($_POST['search'] == "Search")
	{
		$majors = $_POST['major'];
	}
	else
	{
		$majors = $_SESSION['education']['major'];
	}
	$query = "SELECT * FROM careers WHERE ";
	while (strchr($majors, ", ") > 0)
	{
		$query = $query."major LIKE '%%".substr($majors, 0, strpos($majors, ", "))."%%' OR ";
		$majors = substr(strchr($majors, ", "), 2);
	}
	$query = $query."major LIKE '%%".$majors."%%' ORDER BY pay DESC";
	$result = mysql_query($query);
	if (!$result)
	{
		$error = $query."".mysql_error();
	}
	else if (mysql_num_rows($result) == 0)
	{
		$message = "<ul id='job_entries'><li>No jobs were found matching your major and pay.</li></ul>";
	}
	else
	{
		$message = "<ul id='job_entries'>";
		while ($job = mysql_fetch_assoc($result))
		{
			$message = $message."<li><a href='careers.php?jid=".$job['jid']."'>".$job['job_name']." at ".$job['company_name']." in ".$job['city'].", ".$job['state']."</a>
			<div id='edit_profile'><a href='apply.php?jid=".$job['jid']."'>Apply</a></div>"; //adds name and options.
			$message = $message."</li>";
		}
		$message = $message."</ul>";
	}
}
// User owns business.
else if (!isset($_GET['jid']) && mysql_num_rows($result) > 0)
{
	if (!isset($_SESSION['company']))
	{
		$_SESSION['company'] = mysql_fetch_assoc($result);
	}
	$query = sprintf("SELECT * FROM careers WHERE company_name='%s'", $_SESSION['company']['company_name']);
	$result = mysql_query($query);
	if (!$result)
	{
		$message = "<ul id='messages'><li>No jobs are found. Please <a href='createjob.php'>add a job</a></li></ul>";
		
	}
	else
	{
		$message = "<ul id='job_entries'>";
		while ($job =  mysql_fetch_assoc($result))
		{
			$message = $message."<li>".$job['job_name']." in ".$job['city'].", ".$job['state']."<div id='edit_profile'><a href='createjob.php?jid=".$job['jid']."'>Edit</a> <a href='search/searcharchives.php?jid=".$job['jid']."'>Find candidates</a></div>"; //adds name and options.
			$message = $message."</li>";
		}
		$message = $message."</ul>";
	}
	$_SESSION['career_options'] = "<div id='sidebar' align='left'>
    <ul>
	<li><a href='careers.php?usermode=on'>Search Careers</a></li>
	<li><a href='createbusiness.php'>Edit Business</a></li>
	<li><a href='business.php'>View Business</a></li>
	<li><a href='createjob.php'>Add Job Entry</a></li></ul></div>";
	$_SESSION['option_link'] = "edit";
}

//Redirect from job description.
else
{
	$query = sprintf("SELECT * FROM careers WHERE jid=%d LIMIT 1", $_GET['jid']);
	$result = mysql_query($query);
	if (!$result)
	{
		$error = mysql_error();
	}
	$message = "<ul id='messages'>";
	$mes = mysql_fetch_assoc($result);
	$message = $message."<li>".$mes['job_name']."<br />".$mes['company_name']."</li>";
	$message = $message."<li>Location: ".$mes['city'].", ".$mes['state']."<br />Major(s): ".$mes['major'];
	$message = $message."<li>".$mes['job_description']."</li>";
	$message = $message."</ul>";
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Careers</title>
<link href="member.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?=$error?>
<div class="inner" id="sitebk">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <th height="56" colspan="2" class="top" scope="col">
      <div id="sitenav" align="right"><ul>
        <li><a href="./home.php">Home</a></li> 
        <li><a href="profile.php">Profile</a></li>
        <li><a href="inbox.php">Inbox</a></li>
        <li><a href="careers.php">Careers</a></li>
        <!--<li><a href="#">&#9660;</a></li>--></ul>
      </div></th>
    <th width="15%" scope="col" class="tright">
      <div id="sitenav" align="center">
        <ul><li><a href="logout.php">Logout</a></li></ul></div>
    </th>
  </tr>
  <tr>
    <th width="25%" height="365" valign="top" align="center" scope="row" style="border-left: solid 1px #4F7D7D; border-right: solid 1px #4F7D7D;">
    <form action="careers.php" method="post">
    <label for="careers">Search Careers: </label>
    <br />
    <label for="company_name" style="float: left;">Company Name: </label>
    <input name="company_name" size="25" /><br />
    <label for="major" style="float: left;">Major: </label><br  />
    <input name="major" size="25"  /><br />
    
    <input type="submit" name="search" value="Search"/>
    </form>
    </th>
    <th width="60%" rowspan="2" valign="top" scope="row">
    <?=$message?>
    </th>
    <th rowspan="2">&nbsp;</th>
  </tr>
  <tr>
    <th height="23" valign="top" scope="row" style="border-left: solid 1px #4F7D7D; border-right: solid 1px #4F7D7D;">
    <?=$_SESSION['career_options']?>
    </th>
  </tr>
  <tr>
  <th height="70" colspan="3" scope="row" style="border-top: 1px solid #4F7D7D;">
  <?php
	define('__ROOT__', dirname(__FILE__)); 
	require_once(__ROOT__.'/generalfunctions/template.php');
	echo printFooter();
	?></th>
    </tr>
</table>
</div>
</body>
</html>