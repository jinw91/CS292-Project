<?php
session_start();
define('__ROOT__', dirname(__FILE__)); 
require_once('generalfunctions/database.php');
$tbl_name="users";
$connect = connectToDatabase();
if (!$connect)
{
	echo "failed to connect";	
}
if ($_POST['search'] == "Search")
{
	$name = $_POST['name'];
	$major = $_POST['major'];
	$gpa = $_POST['gpa'];
	$work_start = $_POST['work_start'];
	$work_end = $_POST['work_end'];
	$skills = $_POST['skills'];
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
				$message = $message."<li><img style='float:left; margin-right:2px' src='".$mes['picture']."' width='35' height='35'/><a href='../cprofile.php?idnum=".$mes['idnum']."'>".$mes['first_name']." ".$mes['last_name']."</a>";
				$message = $message."<br>".$mes['field']."</li>"; //adds name.
		}
	}
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
                <form action="search.php" method="post">
                <div align="center" style="font-size: 16px; font-family: 'Lato', Arial, Helvetica; font-weight:bold; text-transform:uppercase;">
                <label for="careers">Search Candidates: </label>
                </div>
                <div align="right">
                <label for="name" style="float: left;">Name: </label>
                <input name="name" size="25" /><br />
                <label for="major" style="float: left;">Major: </label>
                <input name="major" size="25"  /><br />
                <label for="gpa" style="float: left;">Minimum GPA: </label>
                <input name="gpa" size="25"  /><br />
                <label for="work_start" style="float: left;">Work Experience: </label>
                <input name="work_start" size="10"  />-<input name="work_end" size="10"><br />
                <label for="skills" style="float:left;">Skill(s): </label><input name="skills" size="25"><br>
                <input type="submit" name="search" value="Search"/>
                </div>
                </form>
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