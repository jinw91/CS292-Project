<?php
session_start();

if (isset($_GET['jid']))
{
	$query = sprintf("SELECT * FROM careers WHERE jid=%d", $_GET['jid']);
	$result = mysql_query($query);
	if (!$result)
	{
		$error = mysql_error();
	}
	$job = mysql_fetch_assoc($result);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Start a Business Page</title>
<link href="member.css" rel="stylesheet" type="text/css" />
</head>

<body>
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
    <th width="25%" height="365" valign="top" scope="row" align="center" style="border-left: solid 1px #4F7D7D; border-right: solid 1px #4F7D7D;">
    <form action="careers.php" method="post">
    <label for="careers">Search Careers: </label>
    <input name="careers" size="30" /><br /><br />
    <label for="major">Major: </label>
    <input name="major" size="25"  />
    <input type="submit" name="Search" value="Search"/>
    </form>
    </th>
    <th width="60%" rowspan="2" valign="top" scope="row"><br />
	<form id="careers" action="careers.php" method="post">
    <div id="careers">
        <label class="field" for="job_name">Job Name: </label>
        <input name="job_name" value="<?=$job['job_name']?>"/>
    </div>
    <div id="careers">
        <label class="field" for="major">Major(s): </label>
        <input name="major" value="<?=$job['major']?>"/>
    </div>
    <div id="careers">
        <label class="field" for="pay">Pay: </label>
        <input name="pay" value="<?=$job['pay']?>"/> 
       	<label for="internship">Internship: </label>
        <input name="internship" type="checkbox" value="1"/>
    </div>
    <div id="careers">
	<label class="field" for="city">City: </label><input name="city" value="<?=$job['city']?>" size=20/> State: <input name="state" size=3 value="<?=$job['state']?>" />
    </div>
    <div id="careers">
        <label class="field" for="description">Description: </label>
        <textarea name="description" rows="10"><?=$job['job_description']?></textarea>
    </div>
    <div align="center">
    	<input type="submit" name="add_job" value="Submit"/>
    </div>
    </form>    </th>
    <th rowspan="2">&nbsp;</th>
  </tr>
  <tr>
    <th height="23" valign="top" scope="row">
    <div id="sidebar" align="left">
    <ul>
    <?=$_SESSION['career_options']?>
    </ul>
    </div>
    </th>
  </tr>
  <tr>
  <th height="70" colspan="3" scope="row" style="border-top: 1px solid #4F7D7D;">
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