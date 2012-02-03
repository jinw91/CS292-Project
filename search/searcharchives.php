<?php
session_start();
define('__ROOT__', dirname(__FILE__)); 
require_once('../generalfunctions/database.php');
$tbl_name="users";
$connect = connectToDatabase();
if (!$connect)
{
	echo "failed to connect";	
}
if ($_POST['submit'] == "Search")
{
	$archives = $_POST['archives'];
	$school = $_POST['education'];
	$spaceplace = strpos($archives, " ");
	if ($spaceplace > 0)
	{
		$first_name = substr($archives, 0, strpos($archives, " "));
		$last_name = substr(strchr($archives, " "), 1);
		$query = sprintf("SELECT * FROM users WHERE first_name='%s' AND last_name='%s'", $first_name, $last_name);
	}
	else if ($archives == "")
	{
		$query = sprintf("SELECT * FROM users u JOIN subscribed s ON u.idnum=s.to_id WHERE from_id=%d ORDER BY last_name ASC", $_SESSION['idnum']);
	}
	else if ($archives == "all")
	{
		$query = sprintf("SELECT * FROM users");
	}
	else
	{
		$query = sprintf("SELECT * FROM users u WHERE first_name LIKE '%%$archives%%' OR last_name LIKE '%%$archives%%'");
	}
	
	
	$result = mysql_query($query);
	if (!$result)
	{
		$error = mysql_error();
	}
	
	$message = "";
	if (mysql_num_rows($result) == 0) { $message = "<strong>No results found.</strong>"; }
	else
	{
		while ($mes =  mysql_fetch_assoc($result))
		{
				$message = $message."<li><img style='float:left; margin-right:2px' src='".$mes['picture']."' width='35' height='35'/><a href='../profile.php?idnum=".$mes['idnum']."'>".$mes['first_name']." ".$mes['last_name']."</a>";
				$message = $message."<br>".$mes['field']."</li>"; //adds name.
		}
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Search</title>
<link href="../member.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="inner" id="sitebk">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <th height="56" colspan="2" class="top" scope="col">
      <div id="sitenav" align="right"><ul>
        <li><a href="../home.php">Home</a></li> 
        <li><a href="../profile.php">Profile</a></li>
        <li><a href="../inbox.php">Inbox</a></li>
        <li><a href="../careers.php">Careers</a></li></ul>
      </div></th>
    <th width="15%" scope="col" class="tright">
      <div id="sitenav" align="center">
        <ul><li><a href="../logout.php">Logout</a></li></ul></div>
    </th>
  </tr>
  <tr>
    <th width="25%" height="387" scope="row" style="border-left: solid 1px #4F7D7D; border-right: solid 1px #4F7D7D; border-bottom: solid 1px #4F7D7D;" align="left" valign="top">
	<form action="searcharchives.php" method="post">
    <ul style="list-style-type:none; margin-top: 5px; margin-left: 5px; padding-left:0;">
    <li><input name="archives" value="<?=$archives?>" size="35" style="margin-left:5px; margin-right:5px;"/><br />&nbsp;</li>
	
    <li><label for="education" style="float:left; width: 50px; margin-left: 5px; margin-right: 5px;">School: </label>
    <select name="education" style="width:150px;">
    	<option>Select School</option>
        <option>Vanderbilt University</option>
        </select></li>
	<?=$modifiers?>
    <li style="text-align:center;"><input type="submit" name="submit" value="Search" /></li>
  	</ul>
    </form>
    </th>
    <th width="60%" scope="row" valign="top">
    <ul id="messages">
	<?=$message?>
    </ul></th>
    <th>&nbsp;</th>
  </tr>
  <tr>
  <th height="70" colspan="3" scope="row" style="border-top: 1px solid #4F7D7D;"><?php
	define('__ROOT__', dirname(__FILE__)); 
	require_once('../generalfunctions/template.php');
	echo printFooter();
	?></th>
    </tr>
</table>
</div>
</body>
</html>