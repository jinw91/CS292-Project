<?php
session_start();
if (!isset($_SESSION['idnum']))
{
	header("Location: index.php");
}

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
		$num_mes = mysql_num_rows($result);
		$message1 = "You have ".$num_mes." new messages.";
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
	
	$job_mes = "Please fill out your work experience for jobs to appear.";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Home</title>
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
		echo navBar($num_mes);
		?>
		</div>
	</div>
</header>
</div>
<div class="container_12">
	<div class="wrapper">
		<div class="grid_12">
			<div class="text1"><? echo $_SESSION['users']['first_name']." ".$_SESSION['users']['last_name']?></div>
		</div>
	</div>
</div>
<!-- content -->
<section id="content">  
	<div class="container_12">
		<div class="wrapper">
			<div class="grid_4 padbot2">
				<h2>Notifications</h2>
				<div class="box-img"><a href="site-images/image-blank.png" data-gal="prettyPhoto[gallery]" class="lightbox-image"><img src="<?=$_SESSION['users']['picture']?>" alt=""></a></div>
				<p class="padtop padbot">Welcome back, <?=$_SESSION['users']['first_name']?>.</p>
      <br />
      <p><?=$message1?></p>
      <p><?=$viewers?></p>
				<a href="#" class="button1">See all</a>
			</div>
			<div class="grid_4 padbot2">
				<h2>Inbox</h2>
				<p class="padtop padbot"><?=$message?></p>
				<a href="inbox.php" class="button1">See all</a>
			</div>
			<div class="grid_4 padbot2">
				<h2>Jobs</h2>
				<p class="padtop padbot"><?=$job_mes?></p>
				<a href="careers.php" class="button1">See all</a>
			</div>
		</div>
		<!--<div class="wrapper"><div class="grid_12"><h2>Latest News</h2></div></div>
		<div class="wrapper">
			<div class="grid_4">
				<ul class="list-1">
					<li><a href="#">Lorem ipsum dolor sit amet consec</a></li>
					<li><a href="#">Cum sociis natoque penatibus et magnis dis 
parturient montes</a></li>
					<li><a href="#">Osum dolor sit amet, consec tetuer</a></li>
					<li><a href="#">Lorem ipsum dolor sit amet, consec tetuer</a></li>
				</ul>
				<a href="#" class="link1">all news</a>
			</div>
			<div class="grid_3 padtop3">
				<div class="box-img2"><a href="site-images/image-blank.png" data-gal="prettyPhoto" title="" class="lightbox-image"><img src="site-images/1page_img4.jpg" alt=""></a></div>
			</div>
			<div class="grid_5 padtop3 box-right">
				<strong class="text2">Lorem ipsum dolor sit amet consec</strong>
				<p class="text3 padtop4">Lorem ipsum dolor sit amet, consec tetuer adipiscing elit. Praesent vestibulum molestie lacus. Aenean nonummy</p> 
				<p class="text3">Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla dui. Fusce feugiat malesuada odio. Morbi nunc odio, gravida at, cursus nec, luctus a, lorem. Maecenas tristique orci ac sem. Duis ultricies pharetra magna.</p>
				<a href="#" class="button1">Continue reading</a>
			</div>
		</div>-->
	</div>
</section>
<!-- footer -->
<?php
	echo footer();
?>
</body>
</html>