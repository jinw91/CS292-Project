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

else if (isset($_GET['write']))
{
	$message = "<form action='register.php' method='post' onSubmit='return validate_work();'>
              <ul id='compose'>
                <li>
                    <label class='inbox' for='name'>To: </label>
                    <input type='text' name='name' id='name' size=20/>
                </li>
                <li>
                    <label class='inbox' for='subject'>Subject: </label> <input type='text' name='subject'/>
                </li>
                <li>
                <label class='inbox' for='message'>Message: </label><textarea name='message' rows='3'></textarea>
                </li>
                <li><span style='margin-left: 250px;'>
                <input type='submit' name='send' value='Send' />
                </span></li></ul>
            </form>";
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
		$message = "<ul id='messages'>";
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
		$message .= "</ul>";
	}
}
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
<script>
$(function(){
	$('#slides').slides({
	effect: 'fade',
	fadeSpeed:700,
	preload: false,
	play: 5000,
	pause: 5000,
	hoverPause: true,
	crossfade: true,
	bigTarget: true
	});
	$('.lightbox-image').prettyPhoto({theme:'facebook',autoplay_slideshow:false,social_tools:false,animation_speed:'normal'}).append('<span></span>');
	if($.browser.msie&&parseInt($.browser.version,10)<=8){$('.lightbox-image').find('span').css({opacity:.5})};
	$('.tooltips li a').find('strong').append('<span></span>').each(
	 	function(){
		var src=new Array()
		src=$(this).find('>img').attr('src').split('.')
		src=src[0]+'-hover.'+src[1]
		$(this).find('>span').css({background:'url('+src+')'})
	 });
});
</script>
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
	<!--<div class="wrapper">
		<div class="grid_12">
			<div class="text1"><?=$p_name?></div>
		</div>
	</div>-->
</div>
<!-- content -->
<section id="content">  
	<div class="container_12">
    <div class="wrapper border_bottom">
        	<div class="grid_4">
                <div align="center"><h2 style="font-family: 'Lato', Arial, Helvetica; text-transform: uppercase;">Compose Message</h2></div>
            </div>
            <div class="grid_6 suffix_2">
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