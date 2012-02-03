<?php
session_start();
if (!isset($_SESSION['idnum']))
{
	header("Location: index.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Professional Archives - Home</title>
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
	$query = sprintf("SELECT * FROM users WHERE idnum='%d'", $_SESSION['idnum']);
	$result = mysql_query($query);
	if (!$result) { echo mysql_error();} 
	$_SESSION['users'] = mysql_fetch_assoc($result);
	if (is_null($_SESSION['users']['picture']))
	{
		$_SESSION['users']['picture'] = "images/default.png";
	}
	$query = sprintf("SELECT * FROM personnel_email p JOIN users u ON p.from_id=u.idnum WHERE to_id='%d' AND is_read=0 ORDER BY time_sent DESC LIMIT 10", $_SESSION['idnum']);
	$result = mysql_query($query);
	if (!$result)
	{
		echo mysql_error();
	}
	if (mysql_num_rows($result) == 0)
	{
		$message1 = "You have no new notifications.";
		$message = "<ul id='jobbar'><li>You have no unread messages.<li></ul>";
	}
	else
	{
		$message1 = "You have ".mysql_num_rows($result)." new messages.";
		$message = "<ul id='messages_short'>";
		while ($mes = mysql_fetch_assoc($result))
		{
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
		$message = $message."</ul>";
	}
	
	$query = sprintf("SELECT * FROM subscribed s JOIN users u ON s.from_id=u.idnum WHERE to_id='%d' ORDER BY subscribed DESC;", $_SESSION['idnum']);
	$result = mysql_query($query);
	if (!$result)
	{
		echo $query." ".mysql_error();
	}
	$viewers = "";
	while ($sub = mysql_fetch_assoc($result))
	{
		$viewers = $viewers.$sub['first_name']." ".$sub['last_name']." subscribed to you.<br />";
	}
	$query = sprintf("SELECT * FROM viewed v JOIN users u ON v.from_id=u.idnum WHERE to_id='%d' AND from_id<>to_id ORDER BY viewed DESC LIMIT 5", $_SESSION['idnum']);
	$result = mysql_query($query);
	if (!$result)
	{
		echo $query." ".mysql_error();
	}
	while ($sub = mysql_fetch_assoc($result))
	{
		$viewers = $viewers.$sub['first_name']." ".$sub['last_name']." viewed your profile on ".$sub['viewed'].".<br />";
	}
?>
<div class="inner" id="sitebk">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <th height="56" colspan="3" class="top" scope="col">
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
    <th width="29%" height="193" scope="row">
    <div align="center">
    <a href="image.php">
    <img src="<?=$_SESSION['users']['picture']?>" width="200" height="200" style="display: block; border:solid 1px #666"/></a>
    </div>
    </th>
    <th width="28%" rowspan="3" scope="row" background="site_im/inbox_bk.png"  align="left" valign="top" style="background-repeat:no-repeat; background-position:center top;">
    <div align="left" style="margin-top:14px; margin-left:10px; margin-right: 10px;">
    <?=$message?>
    </div>
    <p align="right" id="see_all"><a href="inbox.php">See All</a></p>
    </th>
    <th width="28%" rowspan="2" scope="row" background="site_im/inbox_bk.png" style="background-repeat:no-repeat; background-position:center top;" align="left" valign="top">
    <div id="jobbar" align="left"><ul>
      <li>Please fill out your work experience <br />
      for jobs to appear.</li></ul>
      </div>
      <p align="right" id="see_all"><a href="careers.php">See All</a></p>
    </th>
    <th rowspan="3">&nbsp;</th>
  </tr>
  <tr>
    <th height="178" scope="row" background="site_im/news_bk.png" align="left" valign="top" style="background-repeat:no-repeat; background-position:center top;">
    <div style="margin-left:15px; margin-top:5px;"><p>Welcome back, <?=$_SESSION['users']['first_name']?>.</p>
      <br />
      <p><?=$message1?>&nbsp;</p>
      <p><?=$viewers?>&nbsp;</p>
    </div>
      </th>
  </tr>
  <tr>
    <th height="58" scope="row" background="site_im/news_bk.png" align="left" valign="bottom" style="background-repeat:no-repeat; background-position:center bottom;">
    <div id="sidebar_home" align="left">
    <ul>
      <li><a href="basicinfo.php">Edit Basic Information </a></li>
      <li><a href="education.php">Edit Education </a></li>
    </ul>
    </div>
    </th>
    <th width="28%" scope="row" background="site_im/inbox_bk.png" style="background-repeat:no-repeat; background-position: center bottom;" align="left" valign="top">
    <div align="center" style="border-top: 1px solid #999; margin-left: 5px; margin-right:5px;">
      <p align="center">Search Archives<br /></p>
      <form action="search/searcharchives.php" method="post"> 
      <input name="archives" />
      <input name="submit" type="submit" value="Search" />
      </form></div>
      </th>
  </tr>
  <tr>
  <th height="70" colspan="4" scope="row"><?php
	define('__ROOT__', dirname(__FILE__)); 
	require_once(__ROOT__.'/generalfunctions/template.php');
	echo printFooter();
	?></th>
    </tr>
</table>
</div>
</body>
</html>