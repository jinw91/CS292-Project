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

//Coming from job add.
if ($_POST['add_job'] == "Submit")
{
	$job_name = $_POST['job_name'];
	$major = $_POST['major'];
	$pay = $_POST['pay'];
	$internship = 0;
	if (isset($_POST['internship']))
	{
		$internship = 1;
	}
	$city = $_POST['city'];
	$state = $_POST['state'];
	$description = $_POST['description'];
	$company_name = $_SESSION['company']['company_name'];
	
	$query = sprintf("INSERT INTO careers (company_name, job_name, major, job_description, pay, city, state, country, internship) VALUES ('$company_name', '$job_name', '$major', '$description', $pay, '$city', '$state', 'United States', $internship)");
	$result = mysql_query($query);
	if (!$result)
	{
		$error = $query.mysql_error();
	}
}
//Editing job.
else if (isset($_GET['jid']))
{
	
}
//Coming from company add/edit.
else if ($_POST['submit'] == "Submit")
{
	$company_name = $_POST['company_name'];
	$sector = $_POST['sector'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$description = $_POST['description'];
	$idnum = $_SESSION['idnum'];
	if ($_SESSION['option_link'] == "new")
	{
		$query = sprintf("INSERT INTO businesses (company_name, sector, description, city, state, creator) VALUES ('$company_name', '$sector', '$description', '$city', '$state', $idnum)");
	}
	else
	{
		$query = sprintf("UPDATE INTO businesses (company_name, sector, description, city, state, creator) VALUES ('$company_name', '$sector', '$description', '$city', '$state', $idnum)");
	}
	$result = mysql_query($query);
	if (!$result)
	{
		$error = mysql_error();
	}
}

//Apply to a job.
else if (isset($_GET['jid']) && isset($_GET['apply']))
{
	applyJob();
}

//Find businesses started by the user.
$query = sprintf("SELECT * FROM businesses WHERE creator=%d", $_SESSION['idnum']);
$result = mysql_query($query);
if (!$result)
{
	echo mysql_error();
}
// User does not own business.
elseif ((!isset($_GET['jid']) && mysql_num_rows($result) == 0 && isset($_SESSION['education'])) || isset($_GET['usermode']))
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
		$error = $query."".mysql_error();
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
else if (!isset($_GET['jid']) && mysql_num_rows($result) > 0)
{
	if (!isset($_SESSION['company']))
	{
		$_SESSION['company'] = mysql_fetch_assoc($result);
	}
	$query = sprintf("SELECT * FROM careers WHERE company_name='%s'", $_SESSION['company']['company_name']);
	$result = mysql_query($query);
	if (!$result)
	{
		$error = mysql_error();
	}
	else if (mysql_num_rows($result) == 0)
	{
		$message = "<ul id='messages'><li>No jobs are found. Please <a href='createjob.php'>add a job</a></li></ul>";
	}
	else
	{
		$message = "<ul id='job_entries'>";
		while ($job =  mysql_fetch_assoc($result))
		{
			$message = $message."<li>".$job['job_name']." in ".$job['city'].", ".$job['state']."<div id='edit_profile'><a href='createjob.php?jid=".$job['jid']."'>Edit</a> <a href='search.php?jid=".$job['jid']."'>Find candidates</a></div>"; //adds name and options.
			$message = $message."</li>";
		}
		$message = $message."</ul>";
	}
	$_SESSION['career_options'] = "<div id='sidebar' align='left'>
    <ul id='career_options'>
	<li><a href='careers.php?usermode=on'>Search Careers</a></li>
	<li><a href='createbusiness.php'>Edit Business</a></li>
	<li><a href='profile.php?b_id=".$_SESSION['company']['b_id']."'>View Business</a></li>
	<li><a href='createjob.php'>Add Job Entry</a></li></ul></div>";
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
                <div align="center" style="font-size: 16px; font-family: 'Lato', Arial, Helvetica; font-weight:bold; text-transform:uppercase;">
                <label for="careers">Search Careers: </label>
                </div>
                <div align="right">
                <label for="company_name" style="float: left;">Company Name: </label>
                <input name="company_name" size="25" /><br />
                <label for="major" style="float: left;">Major: </label>
                <input name="major" size="25"  /><br />
                <?=$_SESSION['career_options']?><br />                
                <input type="submit" name="search" value="Search"/>
                </div>
                </form>
            </div>
            <div class="grid_6 suffix_2">
                    <fieldset>
                    <?=$update?>
                    <div style="padding-top: 10px; font-size:12px;">
                    <h1 id='edit_title'>Business Information:</h1>
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