<?php
session_start();
if (!isset($_SESSION['idnum']))
{
	header("Location: index.php");
}
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
	if (!isset($_POST['subject'])) {
		$subject = "[untitled]";
	} else {
		$subject = $_POST['subject'];
	}
	$body = $_POST['body'];
	
	
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
	$query = sprintf("INSERT INTO personnel_email (from_name, subject, body, from_id, to_id, time_sent) VALUES ('%s', '$subject',  '$body', '%d', '%d', NOW( ))", 
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
	$query = sprintf("SELECT * FROM personnel_email p JOIN users u ON p.from_id=u.idnum WHERE to_id='%d' AND mid='%d';", $_SESSION['idnum'], $_GET['mid']);
	$result = mysql_query($query);
	if (!$result)
	{
		echo mysql_error();
		$message = "Cannot open message";
	}
	$mes = mysql_fetch_assoc($result);
        if (is_null($mes['picture']))
        {
		$mes['picture'] = "images/default.png";
        }
        $message = $message."<div style='height:0px;width:80px;float:left'><img margin-right:2px' src='".$mes['picture']."' width='35' height='35'/><br>";
        $message = $message."<a href='profile.php?idnum=".$mes['from_id']."'>".$mes['first_name']." ".$mes['last_name']."</a></div>"; //adds name.
        $message = $message."<span style='float:left; margin-left:80px'><div style='font-weight: bold; color: black;'>";
	if ($mes['subject'] == "") {
		$message = $message."[untitled]";
	} else {
		$message = $message.$mes['subject'];
	}
        $message = $message."</div>".$mes['body']."</span>";
        $message = $message."<span style='clear:both; float:left; margin-left:80px;'><form method='post' action='inbox.php?write=true&reply=true'><input type='submit' value='Reply' /></form>";
	$_SESSION['to'] = $mes['first_name']." ".$mes['last_name'];
	$_SESSION['subject'] = "Re: ".$mes['subject'];
	$query = sprintf("UPDATE personnel_email SET is_read=1 WHERE mid='%d';", $_GET['mid']);
	$result = mysql_query($query);
	if (!$result)
	{
		$message = $query."\n".mysql_error();
	}
}

else if (isset($_GET['write']))
{
	if (isset($_GET['single'])) {
		$mes_to = $_SESSION['to'];
		$mes_sub = $_SESSION['subject'];
		$mes_body = $_SESSION['body'];
		if ($_SESSION['time_edit']) {
			$time = "<li><label class='inbox' for='time'>Time of Interview: </label><input type='text' name='time' value='Sep. 1 at 9:00AM'/></li>";
		}
	} else if (isset($_GET['multiple'])) {
		$tmp = $_SESSION['to'];
		$mes_to = "";
		for ($i=0; $i<count($tmp); $i++)
		{
			$mes_to = $mes_to.$tmp[$i].", ";
		}
		$mes_to = substr($mes_to, 0, strlen($substr)-2);
		$mes_sub = $_SESSION['subject'];
		$mes_body = $_SESSION['body'];
		if ($_SESSION['time_edit']) {
			$time = "<li><label class='inbox' for='time'>Time of Interview: </label><input type='text' name='time' value='Sep. 1 at 9:00AM'/></li>";
		}
	} else if (isset($_GET['reply'])) {
		$mes_to = $_SESSION['to'];
		$mes_sub = $_SESSION['subject'];
	}
	$message = "<form action='inbox.php' method='post'>
                  <ul id='education'>
                    <li id='compose'></li>
                    <li><label class='inbox' for='to_name'>To: </label>
                    <input type='text' name='to_name' value='".$mes_to."' style='width:450px'/></li>
                    <li><label class='inbox' for='subject'>Subject: </label> <input type='text' name='subject' value='".$mes_sub."' style='width:450px'/></li>
                    <li><label class='inbox' for='body'>Body: </label>
                    <textarea name='body' rows='10' style='width:450px'>".$mes_body."</textarea></li>
                    ".$time."
                    <li>
                    <span style='margin-left: 58px;'><input type='submit' name='send' value='Send'/></span></li>
                    </ul>
                </form>";
}
//Sets the inbox to show all emails.
else
{
	if (isset($_GET['limit']))
	{
		$limit = $_GET['limit'];
	}
	else
	{
		$limit = 0;
	}
	$query = sprintf("SELECT * FROM personnel_email p JOIN users u ON p.from_id=u.idnum WHERE to_id='%d' ORDER BY time_sent DESC LIMIT %d, 10", $_SESSION['idnum'], $_GET['limit']);
	$result = mysql_query($query);
	if (!$result)
	{
		echo mysql_error();
	}
	else if (mysql_num_rows($result) == 0)
	{
		$message = "<ul id='messages'><li><div align='center'>No messages</div></li>";
		if (isset($_GET['limit']))
		{
			$message .= "<span style='float: left; position: absolute;'><a href='inbox.php?limit=".($limit-10)."'>Previous</a></span>";
		}
		$message .= "</ul>";
	}
	else
	{
		$message = "<ul id='meslist'>";
		while ($mes =  mysql_fetch_assoc($result))
		{
			if (is_null($mes['picture']))
			{
				$mes['picture'] = "images/default.png";
			}
			$message = $message."<li><div style='height:40px;width:80px;float:left'><img margin-right:2px' src='".$mes['picture']."' width='35' height='35'/><br>";
			$from_name = $mes['first_name']." ".$mes['last_name'];
			$message = $message."<a href='profile.php?idnum=".$mes['from_id']."'>";
			if (strlen($from_name) <= 11) {
				$message = $message.$from_name."</a></div>";
			} else {
				$message = $message.substr($from_name,0,11)."...</a></div>";
			}
			//decides how unread messages look
			/*if ($mes['read'] == 0)
			{
				$message = $message."<a href='inbox.php?mid=".$mes['mid']."'style='font-weight: bold; color: black;'>".$mes['subject'];
			}
			else
			{
				$message = $message."<a href='inbox.php?mid=".$mes['mid']."'style='font-weight: lighter; color: black;'>".$mes['subject'];
			}*/
			//$message = $message."<a href='inbox.php?mid=".$mes['mid']."'style='font-weight: bold; color: black;'>".$mes['subject'];
			if ($mes['subject'] == "") {
				$message = $message."<a href='inbox.php?mid=".$mes['mid']."'style='font-weight: bold; color: black;'>[untitled]";
			} else {
				$message = $message."<a href='inbox.php?mid=".$mes['mid']."'style='font-weight: bold; color: black;'>".$mes['subject'];
			}
			if (strlen($mes['body']) <= 80) {
				$message = $message."</a><br>".$mes['body']."</li>";
			} else {
				$message = $message."</a><br>".substr($mes['body'],0,80)."......</li>";
			}
		}
		$message .= "<div class='paginator'>";
		if ($limit != 0)
		{
			$message .= "<span style='float: left; position: absolute;'><a href='inbox.php?limit=".($limit-10)."'>Previous</a></span>";
		}
		
		$message .= "<span style='float: right; position: relative;'><a href='inbox.php?limit=".($limit+10)."'>Next</a></span></div>";
		$message .= "</ul>";
	}
}

mysql_close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Inbox</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width; initial-scale=1.0">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/skeleton.css">
<script src="js/jquery-1.7.1.min.js"></script>
<script src="js/superfish.js"></script>
<script src="js/hoverIntent.js"></script>
<script src="js/script.js"></script>
<script src="js/FF-cash.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
<script src="js/slides.min.jquery.js"></script>
</head>
<body>
<!-- header -->
<header>
	<div class="top-header">
		<div class="container_12">
			<div class="grid_12">
				<div class="fright">
					<ul class="top-menu">
						<li></li>
						<li></li>
					</ul>
				</div>
				<div class="fleft"></div>
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<div class="header-line"></div>
	<div class="container_12">
	  <div class="grid_12">
			<h1 class="fleft"><a href="index.php"><img src="site_im/p_a_logo_new.png" alt=""></a></h1>
			
        <?
		define('__ROOT__', dirname(__FILE__)); 
		require_once(__ROOT__.'/generalfunctions/template.php');
		echo navBar($_SESSION['num_mes']);
		?>
		</div>
	</div>
</header>
</div>
<div class="container_12">
</div>
<!-- content -->
<section id="content">
<div class="container_12">
<div class="wrapper border_bottom">
<div class="grid_4">
<?php
if (isset($_GET['write']) or isset($_GET['mid'])) {
        echo '<div align="center"><h2 style="font-family: \'Lato\', Arial, Helvetica; text-transform: uppercase;"><a href="inbox.php">Back to Inbox</a></h2></div>';
} else {
        echo '<div align="center"><h2 style="font-family: \'Lato\', Arial, Helvetica; text-transform: uppercase;"><a href="inbox.php?write=true">Compose Message</a></h2></div>';
}
?>
</div>
<div class="grid_7">
<fieldset>
<div style="padding-top: 10px; font-size:12px;">
<?=$message?>
</div>
</fieldset>
</div>
</div>
</div>
</section>
	<!-- footer -->
<?php
	echo footer();
?>
</body>
</html>
