<?php
session_start();
if (!isset($_SESSION['idnum']))
{
	header("Location: index.php");
}
define('__ROOT__', dirname(__FILE__)); 
require_once(__ROOT__.'/generalfunctions/database.php');
require_once(__ROOT__.'/generalfunctions/profile_functions.php');
$tbl_name="users";
$connect = connectToDatabase();
if (!$connect)
{
	echo "failed to connect";	
}
if ($_GET['submit'] == "Search" || isset($_GET['idnum']))
{
	$idnum = $_GET['idnum'];
    $query = sprintf("SELECT * FROM friends WHERE from_id=%d AND to_id=%d", $_GET['idnum'], $_SESSION['idnum']);
    $result = mysql_query($query);
    if (!$result)
    {
        echo mysql_error();	
    }
    $friends = (mysql_num_rows($result) > 0);
}
else
{
	$idnum = $_SESSION['idnum'];
}

//Will phase out eventually.
$query = sprintf("SELECT * FROM users WHERE idnum=%d", $idnum);
$result = mysql_query($query);
if (!$result)
{
	echo mysql_error();	
}

$v_users = mysql_fetch_assoc($result);

//Adding about.
$query = sprintf("SELECT * FROM about WHERE idnum=%d", $idnum);
$result = mysql_query($query);
if (!$result)
{
	echo mysql_error();	
}

$v_about = mysql_fetch_assoc($result);

//Retrieve privacy settings.
$query = sprintf("SELECT * FROM privacy WHERE idnum=%d", $idnum);
$result = mysql_query($query);
if (!$result)
{
	echo mysql_error();	
}

$v_privacy = mysql_fetch_assoc($result);

//Checks if visited.
/*
$query = sprintf("SELECT * FROM viewed WHERE to_id=%d", $idnum);
$result = mysql_query($query);
if (!$result)
{
	$error = mysql_error();	
}
else if (mysql_num_rows($result) == 0 && $idnum != $_SESSION['idnum'])
{
	$query = sprintf("INSERT INTO viewed (from_id, to_id, viewed) VALUES (%d, %d, NOW())", $_SESSION['idnum'], $idnum);
	$result = mysql_query($query);
}
else if (mysql_num_rows($result) > 0)
{
	$query = sprintf("UPDATE viewed SET viewed=NOW() WHERE to_id=$idnum");
	$result = mysql_query($query);
}*/
if (isset($_GET['addfriend'])) {
    $query = sprintf("INSERT INTO friends (from_id, to_id, friends_since) VALUES ('%d', '%d', NOW())", $_SESSION['idnum'], $_GET['idnum']);
    mysql_query($query);
}

if (is_null($v_users['picture']))
{
	$picture = "<div class='box-img'>";
	$grid = "grid_11 suffix_2";
}
else
{
	$picture = "<div class='grid_4'><div class='box-img'><a href='".$v_users['picture']."' data-gal='prettyPhoto[gallery]' class='lightbox-image'><img src='".$v_users['picture']."' alt=''></a></div>";
	$grid = "grid_6 suffix_2";
}
$p_name = $v_users['first_name']." ".$v_users['last_name'];

$query = sprintf("SELECT * FROM education_data WHERE idnum=%d", $idnum);
$result = mysql_query($query);
$v_education = mysql_fetch_assoc($result);
/**
Creates the message under education.
**/
if ($idnum == $_SESSION['idnum'])
{
	$v_education_message = ceducation_own($idnum);
}
else if (isset($_SESSION['company']))
{
	$v_education_message = ceducation($idnum);
}
else
{
	$v_education_message = education($idnum);
}
/**
Creates the message under experience.
**/
if ($idnum == $_SESSION['idnum'])
{
	$v_work_message = work_own($idnum);
}
else
{
	$v_work_message = work($idnum);
}
/**
Creates the message under extracurriculars.
**/
if ($idnum == $_SESSION['idnum'])
{
	$v_extracurriculars = extra_own($idnum);
}
else
{
	$v_extracurriculars = extra($idnum);
}

/**
Creates message under skills.
**/
if ($idnum == $_SESSION['idnum'])
{
	$v_skills = skills_own($idnum);
}
else
{
	$v_skills = skills($idnum);
}
/**
Subscribing.
if (isset($_GET['follow']) && $idnum != $_SESSION['idnum'])
{
		$query = sprintf("INSERT INTO subscribed (from_id, to_id, subscribed) VALUES ('%d', '%d', NOW())", $_SESSION['idnum'], $idnum);
		$result = mysql_query($query); 
		$message = "<script type='text/javascript'>alert('You are now following $p_name');</script>";
}**/
mysql_close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title><?=$p_name?></title>
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
<script src="simple.js"></script>
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
			<div class="grid_12"></div>
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
	<div class="wrapper">
		<div class="grid_12">
			<div class="text1"><?=$p_name?></div>
		</div>
	</div>
</div>
<!-- content -->
<section id="content">  
	<div class="container_12">
    <div class="wrapper border_bottom">
        	<?=$picture?>
            
            </div>
            <div class="<?=$grid?>">
                    <fieldset>
                    <div style="font-family: 'Lato', Arial, Helvetica; text-align: center; padding-top: 30px; font-size:18px;">
                    <?=$v_education['college']?><br />
					<?=$v_education['major']?><br />
                    <?php 
                    if ($v_about['city'] != "" && $v_about['state'] != "")
                    {
                        echo $v_about['city'].", ".$v_about['state']."<br />";
                    }
					if (isset($v_education['college_end']))
					{
                    	$temp = substr($v_education['college_end'], 0, 4);
                    	$tmpmonth = intval(substr($v_education['college_end'], 5, 2));
                    	if (isset($temp) && $temp > '2012')
                    	{
                        	if ($tmpmonth <= 6) 
                            	echo "Expected Graduation: Spring ".$temp;
							else if ($tmpmonth < 8)
								echo "Expected Graduation: Summer ".$temp;
							else
								echo "Expected Graduation: Fall ".$temp;
								
							echo "<br>";
						}
					}
					echo "</p>";
					if (isset($v_about['status']))
					{
						echo "<p>";
						if ($v_about['status'] != "Employed")
						{
							echo "Looking for ".$v_about['status'];
						}
						else
						{
							echo $v_about['status'];
						}
						echo "</p>";
					}
                    if (isset($_GET['idnum'])) {
                        $new_buttons = $friends?"":"<a href='cprofile.php?idnum=".$_GET['idnum']."&addfriend=true'><img src='site_im/addusericon.jpg' width='40' height='40' onclick='if(confirm_add_friend(\"".$p_name."\")){}else return false;'/></a>";
                        $new_buttons .= "<a href='generalfunctions/message_template.php?messagetype=blank&single=true&to_id=".$_GET['idnum']."'><img src='site_im/messageicon.jpg' width='40' height='40'/></a>";
                        echo $new_buttons;
                    }
                    ?>
                    </div>
                    </fieldset>
            </div>
        </div>
		<div class="wrapper">
			<div class="grid_11 padbot2">          
				<br>
                <span style="font-size: 14px;">
				<h1 id="cprof_cat">EDUCATION</h1><hr style="margin-top:0; padding-top:0px;">
				<fieldset>
				<ul style="margin-left: 10px;"><?=$v_education_message?></ul>
				<br>
                </fieldset>
                <h1 id="cprof_cat">WORK EXPERIENCE</h1><hr style="margin-top:0; padding-top:0px;">
                <fieldset>
                <ul style="margin-left: 10px;"><?=$v_work_message?></ul>
                <br>
                </fieldset>
                <h1 id="cprof_cat">EXTRACURRICULAR</h1><hr style="margin-top:0; padding-top:0px;">
                <fieldset>
                <ul style="margin-left: 10px;"><?=$v_extracurriculars?></ul>
                <br>
                </fieldset>
                <h1 id="cprof_cat">SKILLS/ACTIVITIES/INTERESTS</h1><hr style="margin-top:0; padding-top:0px;">
                <fieldset>
                <ul style="margin-left: 10px;"><?=$v_skills?></ul>
                <br>
                </fieldset>
                </span>
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
