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
if (isset($_GET['idnum']))
	$compose = "";
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
    <th width="59%" scope="row" valign="top"><br />
    <form action="inbox.php" method="post">
    <div id="message">
        <label class="field" for="to_name">To: </label>
        <input name="to_name" value="<?=$_GET['idnum']?>"/>
    </div>
    <div id="message">
        <label class="field" for="subject">Subject: </label>
        <input name="subject"/>
    </div>
    <div id="message">
        <label class="field" for="message">Message: </label>
        <textarea name="message" rows="10"></textarea>
    </div>
    <div id="message">
    	<input type="submit" name="send" value="Send"/>
    </div>
    </form>
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