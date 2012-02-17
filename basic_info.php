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

$query = sprintf("SELECT * FROM users WHERE idnum=%d", $_SESSION['idnum']);
$result = mysql_query($query);
$user_info = mysql_fetch_assoc($result);
if ($_POST['submit'] == "Save")
{
	$city = $_POST['city'];
	$state = $_POST['state'];
	$field = $_POST['field'];
	$pay = $_POST['income'];
	$skills = $_POST['skills'];
	if (isset($_POST['hourly']))
	{
		$hourly = 1;
	}
	else
	{
		$hourly = 0;
	}
	$query = sprintf("UPDATE users SET city='%s', state='%s', country='United States', field='%s', pay='$pay', hourly=$hourly, skills='$skills' WHERE idnum=%d LIMIT 1", $city, $state, $field, $_SESSION['idnum']);
	$message = "<p id=\"update_message\">Basic information updated.</p>";
	$result = mysql_query($query);	
	if (!$result)
	{
		$error = mysql_error();	
	}
}

$query = sprintf("SELECT * FROM users WHERE idnum=%d", $_SESSION['idnum']);
$result = mysql_query($query);
$user_info = mysql_fetch_assoc($result);
if ($user_info['hourly'] == 1)
{
	$hourly_mes = "checked='checked'";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Professional Archives</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width; initial-scale=1.0">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/styles.css">
<link rel="stylesheet" href="css/skeleton.css">
<script src="js/jquery-1.7.1.min.js"></script>
<script src="js/superfish.js"></script>
<script src="js/hoverIntent.js"></script>
<script src="js/script.js"></script>
<script src="js/FF-cash.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
<script src="js/slides.min.jquery.js"></script>
<script type="text/javascript" src="simple.js"></script>
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
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
	</div>
</header>
<!-- content -->
<section id="content">  
	<div class="container_12">
		<div class="wrapper">
		  <div class="grid_10">
			  <h1 id='edit_title'>Basic Information:</h1>
              <form action='basic_info.php' method='post'>
              <?=$error?><?=$message?><br>
              <ul id='education'>
                <li><label class="field" for="city">City: </label><input name="city" value="<?=$user_info['city']?>" width="150px"/> State: <input name="state" value="<?=$user_info['state']?>" style="width: 60px;" /></li>
                <li id="school"></li>                    
                <li><label class="field" for="income">Expected Pay: </label> 
    <input name="income" value="<?=$user_info['pay']?>"/><label for="hourly">  &nbsp;Hourly: </label>
    <input type="checkbox" name="hourly" <?=$hourly_mes?>/></li>
                <li><label class='field' for='field'>Primary Field: </label> <input type='text' name='field' value="<?=$user_info['field']?>"/></li>
            <label class='subscript' for='major'>Example: Computer Science, Math</label><br>
            <li><label class='field' for='skills'>Technical Skills: </label>
            <textarea name='skills' rows='2'><?=$user_info['skills']?></textarea></li>
            <label class='subscript' for='honors'>Example: Microsoft Excel, HTML</label><br>
            <li>
            <span style='margin-left: 300px;'><input type='submit' name='submit' value='Save' />
            <input type='submit' name='skip' value='Skip' /></span></li>
            </ul>
        	</form>
			</div>
		</div>
	</div>
</section>
<!-- footer -->
<?php
	define('__ROOT__', dirname(__FILE__)); 
	require_once(__ROOT__.'/generalfunctions/template.php');
	echo footer();
?>
</body>
</html>
