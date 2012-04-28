<?php
session_start();
if (!isset($_SESSION['idnum']))
{
	header("Location: home.php");
}
define('__ROOT__', dirname(__FILE__)); 
require_once(__ROOT__.'/generalfunctions/database.php');
require_once(__ROOT__.'/generalfunctions/career.php');
$tbl_name="users";
$connect = connectToDatabase();
if (!$connect)
{
	$error = "failed to connect";	
}

//Apply to a job.
else if (isset($_GET['jid']) && isset($_GET['apply']))
{
	applyJob();
}

//Find businesses started by the user.
/**
$query = sprintf("SELECT * FROM businesses WHERE creator=%d", $_SESSION['idnum']);
$result = mysql_query($query);
if (!$result)
{
	echo mysql_error();
}
**/
// User does not own business.
elseif ((!isset($_GET['jid']) && !isset($_SESSION['company'])) || isset($_GET['usermode']))
{
	if ($_POST['search'] == "Search")
	{
		$majors = $_POST['major'];
	}
	else
	{
		$majors = $_SESSION['education']['major'];
	}
	$query = "SELECT * FROM careers WHERE ";
	while (strchr($majors, ", ") > 0)
	{
		$query = $query."major LIKE '%%".substr($majors, 0, strpos($majors, ", "))."%%' OR ";
		$majors = substr(strchr($majors, ", "), 2);
	}
	$query = $query."major LIKE '%%".$majors."%%' ORDER BY pay DESC";
	$result = mysql_query($query);
	if (!$result)
	{
		$error = $query." ".mysql_error();
	}
	else if (mysql_num_rows($result) == 0)
	{
		$message = "<ul id='job_entries'><li>No jobs were found matching your major and pay.</li></ul>";
	}
	else
	{
		$message = "<ul id='job_entries'>";
		while ($job = mysql_fetch_assoc($result))
		{
			$message = $message."<li><a href='careers.php?jid=".$job['jid']."'>".$job['job_name']." at ".$job['company_name']." in ".$job['city'].", ".$job['state']."</a>
			<div id='edit_profile'><a href='careers.php?jid=".$job['jid']."&apply=1'>Apply</a></div>"; //adds name and options.
			$message = $message."</li>";
		}
		$message = $message."</ul>";
	}
}
// User owns business.
else if (!isset($_GET['jid']) && isset($_SESSION['company']))
{
	$query = sprintf("SELECT * FROM careers WHERE company_name='%s'", $_SESSION['company']['company_name']);
	$result = mysql_query($query);
	if (!$result)
	{
		$error = mysql_error();
	}
	else if (mysql_num_rows($result) == 0)
	{
		$message = "<ul id='messages'><li>No jobs are found. Please <a href='career.php'>add a job</a></li></ul>";
	}
	else
	{
		$message = "<ul id='job_entries'>";
		while ($job =  mysql_fetch_assoc($result))
		{
			$new_interested = "";
			$message = $message."<li>".$job['job_name']." in ".$job['city'].", ".$job['state']."<div id='edit_profile'><a href='career.php?jid=".$job['jid']."'>Edit</a>";
			$query = sprintf("SELECT * FROM c_applied_%d i, users u, education_data ed WHERE i.idnum=u.idnum AND u.idnum=ed.idnum AND jid='%d' AND is_read=0", $_SESSION['company']['b_id'], $job['jid']);
			$res2 = mysql_query($query);
			if (!$res2)
			{
				$error = $query." ".mysql_error();
			}
			// More than 0 applicants
			if (mysql_num_rows($res2) > 0)
			{
				$message .= "<a href='groups.php?jid=".$job['jid']."'>View Candidates</a>";
				$new_interested = "<ul id='user_entries'>";
				while ($users = mysql_fetch_assoc($res2))
				{
					if (is_null($users['picture']))
					{
						$users['picture'] = "images/default.png";
					}
					$new_interested = $new_interested."<li><img style='float:left; margin-right:2px' src='".$users['picture']."' width='35' height='35'/><a href='cprofile.php?idnum=".$users['idnum']."'>".$users['first_name']." ".$users['last_name']."</a>"; //adds name.
					$new_interested = $new_interested."<br />".$users['field']." at ".$users['college'];
					$new_interested .= "</li>";
					/**
					$query = sprintf("UPDATE c_applied SET is_read=1 WHERE jid='%d' AND idnum='%d'", $job['jid'], $users['idnum']);
					$result = mysql_query($query);
					if (!$result)
					{
						$error = $query." ".mysql_error();
					}
					**/
				}
				$new_interested .= "</ul>";
			}
			$message .= "<a href='search.php?jid=".$job['jid']."'>Find candidates</a></div>"; //adds name and options.
			$message = $message."</li>".$new_interested;
		}
		$message = $message."</ul>";
	}
	$_SESSION['career_options'] = "<div id='sidebar' align='left'>
    <ul id='career_options'>
	<li><a href='careers.php?usermode=on'>Search Careers</a></li>
	<li><a href='business.php'>Edit Business</a></li>
	<li><a href='profile.php?b_id=".$_SESSION['company']['b_id']."'>View Business</a></li>
	<li><a href='career.php'>Add Job Entry</a></li></ul></div>";
	$_SESSION['option_link'] = "edit";
}

//Redirect from job description.
else
{
	$query = sprintf("SELECT * FROM careers WHERE jid=%d LIMIT 1", $_GET['jid']);
	$result = mysql_query($query);
	if (!$result)
	{
		$error = mysql_error();
	}
	$message = "<ul id='careers'>";
	$mes = mysql_fetch_assoc($result);
	$message = $message."<li>".$mes['job_name']."<br />".$mes['company_name']."</li>";
	$message = $message."<li>Location: ".$mes['city'].", ".$mes['state']."<br />Major(s): ".$mes['major'];
	$message = $message."<li>".$mes['job_description']."</li>";
	$message = $message."</ul>";
}

mysql_close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Professional Archives</title>
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
</div>
<!-- content -->
<section id="content">  
	<div class="container_12">
    <div class="wrapper border_bottom">
        	<div class="grid_4">
                <form action="careers.php" method="post">
                <div id = "search_careers">
                <label for="careers">Search Careers: </label>
                </div>
                <div align="right">
                <label class="company_name" for="company_name">Company Name: </label>
                <input name="company_name"/><br />
                <label class="major" for="major">Major: </label>
                <input name="major"/><br />
                <?=$_SESSION['career_options']?><br />                
                <input type="submit" name="search" value="Search"/>
                </div>
                </form>
            </div>
            <div class="grid_6 suffix_2">
                    <fieldset>
                    <?=$error?>
                    <div class="message">
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