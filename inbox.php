<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Inbox</title>
<link href="member.css" rel="stylesheet" type="text/css" />
</head>

<body>
<script type="text/javascript" src="mailbox.js"></script>
<?php
define('__ROOT__', dirname(__FILE__)); 
require_once(__ROOT__.'/generalfunctions/database.php');
$tbl_name="personnel_email";
$connect = connectToDatabase();
if (!$connect)
{
	echo "failed to connect";
}

//sending a message
if ($_POST['send'] == "Send")
{
	$to_name = $_POST['to_name'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];
	
	if (is_numeric($to_name))
	{
		$to_idnum = $to_name;
	}
	else
	{
		$first_name = substr($to_name, 0, strpos($to_name, " "));
		$last_name = substr(strchr($to_name, " "), 1);
		$query = sprintf("SELECT idnum FROM users WHERE first_name='%s' AND last_name='%s'", $first_name, $last_name);
		$result = mysql_query($query);
		if (!$result)
		{
			$message = "Cannot find user to send message.";
		}
		else
		{
			$to_idnum = mysql_result($result, 0);
		}
	}
	$query = sprintf("INSERT INTO personnel_email (from_name, subject, body, from_id, to_id, time_sent) VALUES ('%s', '$subject',  '$message', '%d', '%d', NOW( ))", 
		$_SESSION['users']['first_name']." ".$_SESSION['users']['last_name'], $_SESSION['idnum'], $to_idnum);
	$result = mysql_query($query);
	if ($result)
	{
		$message = "Message sent.";
	}
	else
	{
		$message = mysql_error();
	}
}

//Reading message if mid is found.
if (isset($_GET['mid']))
{
	$query = sprintf("SELECT * FROM personnel_email WHERE to_id='%d' AND mid='%d';", $_SESSION['idnum'], $_GET['mid']);
	$result = mysql_query($query);
	if (!$result)
	{
		echo mysql_error();
		$message = "Cannot open message";
	}
	$mes = mysql_fetch_assoc($result);
	$message = "";
	$message = $message."<li>From: "."<a href='profile.php?idnum=".$mes['from_id']."'>".$mes['from_name']."</a></li>";
	$message = $message."<li>".$mes['body']."</li>";
	$query = sprintf("UPDATE personnel_email SET is_read=1 WHERE mid='%d';", $_GET['mid']);
	$result = mysql_query($query);
	if (!$result)
	{
		$message = $query."\n".mysql_error();
	}
}
//Sets the inbox to show all emails.
else
{
	$query = sprintf("SELECT * FROM personnel_email p JOIN users u ON p.from_id=u.idnum WHERE to_id='%d' ORDER BY time_sent DESC;", $_SESSION['idnum']);
	$result = mysql_query($query);
	if (!$result)
	{
		echo mysql_error();
	}
	else if (mysql_num_rows($result) == 0)
	{
		$message = "<li><div align='center'>No new messages</div></li>";
	}
	else
	{
		$message = "";
		while ($mes =  mysql_fetch_assoc($result))
		{
			if (is_null($mes['picture']))
			{
				$mes['picture'] = "images/default.png";
			}
			$message = $message."<li><img style='float:left; margin-right:2px' src='".$mes['picture']."' width='35' height='35'/><a href='profile.php?idnum=".$mes['from_id']."'>".$mes['from_name']."</a>"; //adds name.
			if ($mes['read'] == 0)
			{
				$message = $message."<br /><a href='inbox.php?mid=".$mes['mid']."'style='font-weight: bold; color: black;'>".$mes['subject'];
			}
			else
			{
				$message = $message."<br /><a href='inbox.php?mid=".$mes['mid']."'style='font-weight: lighter; color: black;'>".$mes['subject'];
			}
			$message = $message."</a></li>";
		}
	}
}
?>
<div class="inner" id="sitebk">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <th height="56" colspan="2" class="top" scope="col">
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
    <th width="26%" height="387" scope="row" valign="top" align="left">
    <div id="sidebar"><ul>
	<li><a href="inbox.php">Inbox</a></li>
    <li><a href="inbox.php?comp=1">Verified Inbox</a></li>
    <li><a href="compose.php">New Message</a></li>
    </ul></div>
    </th>
    <th width="59%" scope="row" valign="top" align="left">
    <ul id="messages">
    <?=$message?>
    </ul>
    </th>
    <th>&nbsp;</th>
  </tr>
  <tr>
  <th height="70" colspan="3" scope="row" style="border-top: 1px solid #4F7D7D;"><?php
	define('__ROOT__', dirname(__FILE__)); 
	require_once(__ROOT__.'/generalfunctions/template.php');
	echo printFooter();
	?></th>
    </tr>
</table>
</div>
</body>
</html>