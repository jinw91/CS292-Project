<?php
session_start();
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
}
else
{
	$idnum = $_SESSION['idnum'];
}
$query = sprintf("SELECT * FROM users WHERE idnum=%d", $idnum);
$result = mysql_query($query);
if (!$result)
{
	echo mysql_error();	
}

$v_users = mysql_fetch_assoc($result);

//Checks if visited.
$query = sprintf("SELECT * FROM viewed WHERE to_id=%d", $idnum);
$result = mysql_query($query);
if (!$result)
{
	$error = mysql_error();	
}
else if (mysql_num_rows($result) == 0)
{
	$query = sprintf("INSERT INTO viewed (from_id, to_id, viewed) VALUES (%d, %d, NOW())", $_SESSION['idnum'], $idnum);
	$result = mysql_query($query);
}
else if (mysql_num_rows($result) > 0)
{
	$query = sprintf("UPDATE viewed SET viewed=NOW() WHERE to_id=$idnum");
	$result = mysql_query($query);
}

if (is_null($v_users['picture']))
{
	$v_users['picture'] = "images/default.png";
}
$p_name = $v_users['first_name']." ".$v_users['last_name'];

$query = sprintf("SELECT * FROM education_data WHERE idnum=%d", $idnum);
$result = mysql_query($query);
$v_education = mysql_fetch_assoc($result);
$query = sprintf("SELECT * FROM work_data WHERE idnum=%d", $idnum);
$result = mysql_query($query);
$v_work = mysql_fetch_assoc($result);
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
if ($v_education['organization'] == "")
{
	$extracurriculars = "<li>Extracurriculars not available.";
	if ($idnum == $_SESSION['idnum'])
	{
		$extracurriculars .= "<div id='edit_profile'><a href='education.php#activities'>Add</a></div>";
	}
	$extracurriculars .= "</li>";
}
else
{
	$extracurriculars = "<li>".$v_education['organization']."</li>";
	if ($idnum == $_SESSION['idnum'])
	{
		$extracurriculars .= "<div id='edit_profile'><a href='education.php#activities'>Edit</a></div>";
	}
	$extracurriculars .= "</li>";
}

if (isset($_GET['follow']) && $idnum != $_SESSION['idnum'])
{
		$query = sprintf("INSERT INTO subscribed (from_id, to_id, subscribed) VALUES ('%d', '%d', NOW())", $_SESSION['idnum'], $idnum);
		$result = mysql_query($query); 
		$message = "<script type='text/javascript'>alert('You are now following $p_name');</script>";
}
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
        	<div class="grid_4">
                <div class="box-img"><a href="<?=$v_users['picture']?>" data-gal="prettyPhoto[gallery]" class="lightbox-image"><img src="<?=$v_users['picture']?>" alt=""></a></div>
            </div>
            <div class="grid_6 suffix_2">
                    <fieldset>
                    <div style="font-family: 'Lato', Arial, Helvetica; text-align: center; padding-top: 30px; font-size:18px;">
                    <?=$v_education['college']?><br />
					<?=$v_education['major']?><br />
                    <?php 
                    if ($v_users['city'] != "" && $v_users['state'] != "")
                    {
                        echo $v_users['city'].", ".$v_users['state']."<br />";
                    }
                    $temp = substr($v_education['college_end'], 0, 4);
                    $tmpmonth = intval(substr($v_education['college_end'], 5, 2));
                    if ($temp != '0000' && isset($temp))
                    {
                        if ($tmpmonth <= 6) 
                            echo "Expected Graduation: Spring ".$temp;
                        else if ($tmpmonth < 8)
                            echo "Expected Graduation: Summer ".$temp;
                        else
                            echo "Expected Graduation: Fall ".$temp;
                    }
                    ?>
                    <br />
                    </p>
                    <p><?=$v_users['status']?></p>
                    </div>
                    </fieldset>
            </div>
        </div>
		<div class="wrapper">
			<div class="grid_11 padbot2">
				<script type="text/javascript">
		function clear()
		{
			var tag = document.getElementById("start");
			tag.innerHTML = "";
		}
		function experience()
		{
			clear();
			var tag = document.getElementById("start");
			tag.innerHTML += "<?=$v_work_message?>";
			return true;
		}
		function skills()
		{
			clear();
			var tag = document.getElementById("start");
			tag.innerHTML += "<li>Skills not available.</li>";
			return true;
		}
		function extra()
		{
			clear();
			var tag = document.getElementById("start");
			tag.innerHTML += "<?=$extracurriculars?>";
			return true;
		}
		</script>
                  <br>
                  <ul id="prof_cat">
                  <li>
                  <a id="experience" href="javascript:experience();">Experience</a></li>
                  <li><a id="skills" href="javascript:skills();">Skills</a></li>
                  <li><a id="extra" href="javascript:extra();">Extracurriculars</a></li>
                  <!--<li><a id="resume" href="resumes/<?=$resume?>" onclick="return true;">Resume</a></li>-->
                  </ul>
                  <fieldset>
                  <br>
                  <ul id="start"><script>experience();</script></ul>
                  <br>
				<a href="#" class="button_pro">See all</a>
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