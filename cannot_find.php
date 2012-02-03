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

if ($_POST['submit'] == "Submit")
{
	$company_name = $_POST['company_name'];
	$sector = $_POST['sector'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$description = $_POST['description'];
	$idnum = $_SESSION['idnum'];
	if ($_SESSION['option_link'] == "edit")
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

$query = sprintf("SELECT * FROM businesses WHERE creator=%d", $_SESSION['idnum']);
$result = mysql_query($query);
if (!$result)
{
	echo mysql_error();
}
elseif (mysql_num_rows($result) == 0)
{
	$_SESSION['company'] = mysql_fetch_assoc($result);
	$option = "<li><a href='createbusiness.php'>New Business</a></li>";
	$_SESSION['option_link'] = "new";
}
else
{
	$option = "<li><a href='createbusiness.php'>Edit Business</a></li>
	<li><a href='business.php'>View Business</a></li>
	<li><a href='createjob.php'>Add Job Entry</a></li>";
	$_SESSION['option_link'] = "edit";
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

<div class="inner" id="sitebk">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <th height="56" class="top" scope="col">
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
    <th height="395" align="center" valign="middle" style="border-left: solid 1px #4F7D7D; border-right: solid 1px #4F7D7D;" scope="row"><p>The page you requested cannot be found.</p>
      <p>&nbsp;</p>
      <p>Sincerely,<br />
      Professional Archives Team</p></th>
    <th>&nbsp;</th>
  </tr>
  <tr>
    <th height="70" colspan="2" scope="row" style="border-top: 1px solid #4F7D7D;">
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