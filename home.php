<?php
session_start();
if (!isset($_SESSION['idnum']))
{
	header("Location: index.php");
}

if (isset($_GET['usermode']))
{
	$_SESSION['business_mode'] = !$_SESSION['business_mode'];
	/**
	if ($_SESSION['business_mode']) $error = "Business mode set to true";
	else if (!$_SESSION['business_mode']) $error = "Business mode set to false";
	else
	{
		$error = "invalid output";
	}
	**/
}

define('__ROOT__', dirname(__FILE__)); 
require_once(__ROOT__.'/generalfunctions/database.php');
require_once(__ROOT__.'/generalfunctions/home.php');
if ($_POST['save'] == 'Save') {
    if (isset($_POST0['company']))
    {
        $company = $_POST['company'];
        $title = $_POST['title'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $work_month_start = $_POST['work_month_start'];
        $work_year_start = $_POST['work_year_start'];
        $work_month_end = $_POST['work_month_end'];
        $work_year_end = $_POST['work_year_end'];
        $achievement = $_POST['achievement'];
        $idnum = $_SESSION['idnum'];
        $company_start = $work_year_start."-".$work_month_start."-01"; //arbitrary day.
        $company_end = $work_year_end."-".$work_month_end."-01"; //arbitrary day.
        if (isset($_POST['present']))
        {
            $query = sprintf("INSERT INTO work_data (idnum, company_name, title, company_start, company_end, city, state, present, achievement) VALUES ('$idnum', '$company', '$title', '$company_start', '$company_end', '$city', '$state', 1, '$achievement')");
        }
        else
        {
            $query = sprintf("INSERT INTO work_data (idnum, company_name, title, company_start, company_end, city, state, present, achievement) VALUES ('$idnum', '$company', '$title', '$company_start', '$company_end', '$city', '$state', 0, '$achievement')");
        }
        $result = mysql_query($query);
        if (!$result)
        {
            $error = mysql_error();
        }
    } 
    $query = sprintf("UPDATE users SET summer=1 WHERE idnum='$idnum'");
    $result = mysql_query($query);
    if (!$result)
    {
        $error = mysql_error();
    }
    $message = "<p id='update_message'>Work experience updated.</p>";
}
if ( $_SESSION['business_mode'])
{
	$job_mes = "No events scheduled. Please send some invitations for Interviews.";
	$name = name(true);
	$_SESSION['users']['picture'] = "";
}
else
{
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
    if ($_SESSION['users']['summer'] == 0)
    {
        $summer_intern = "Did you do an internship this summer?";
        $summer_intern .= "<form><input type='radio' name='summer' value='yes' onclick='showSummerIntern(value);' />Yes";
        $summer_intern .= "<input type='radio' name='summer' value='no' onclick='showSummerIntern(value);' />No";
        $summer_intern_confirm = "<span style='margin-left: 38.5em;'>";
        $summer_intern_confirm .= "<input type='submit' name='save' value='Save' />";
        $summer_intern_confirm .= "<input type='submit' name='cancel' value='Cancel' /></span>";
    }
	if (is_null($_SESSION['users']['picture']) || trim($_SESSION['users']['picture']) == "")
	{
		$_SESSION['users']['picture'] = "images/default.png";
	}
	//Updates last-visited date.
	$query = sprintf("UPDATE users SET last_logged_in = NOW( ) WHERE idnum='%d'", $_SESSION['idnum']);
	$result = mysql_query($query);
	
	$query = sprintf("SELECT * FROM personnel_email p JOIN users u ON p.from_id=u.idnum WHERE to_id='%d' AND is_read=0 ORDER BY time_sent DESC LIMIT 10", $_SESSION['idnum']);
	$result = mysql_query($query);
	mysql_close();
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
		$_SESSION['num_mes'] = mysql_num_rows($result);
		$message1 = "You have ".$_SESSION['num_mes']." new messages.";
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
	$name = name(false);
	/** Later add.
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
	}**/
	
	$job_mes = "<ul style='list-style-type: none;'><li>Please fill out your work experience for jobs to appear.</li></ul>";
}
//setting picture
if ($_SESSION['users']['picture'] != "")
{
	$picture = "<a href='image.php'><img src='".$_SESSION['users']['picture']."' alt='' width='200px'></a>";
}
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
<script src="simple.js"></script>
<script>

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-28417433-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>
<body>
<?=$error?>
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
			<div class="text1"><?=$name?></div>
              <form action='home.php' method='post'>
                <div style='margin-left:22em; margin-bottom:1em; margin-top:0.5em; font-size:1.2em;'>
                <?=$summer_intern?>
                </div>
                  <ul id='education' style='margin-left:10em;'>
                    <div id='summer' style='display:none;'>
                    <li> <label class='field'>Company Name: </label><input type='text' name='company' size=20 /> </li>
                    <li> <label class='field'>Title: </label><input type='text' name='title' /> </li>
                    <li> <label class='field'>City: </label><input name='city' style='width: 150px;' /> State: <input name='state' style='width: 60px;' />
                    <li> <label class='field'>Time Period: </label>
                    <script>
                    document.write("<select name=\"work_month_start\">");
                    months();
                    document.write("<select name=\"work_year_start\">");
                    years();
                    document.write("<label class=\"hide_if_present\"> - </label>");
                    document.write("<select class=\"hide_if_present\" name=\"work_month_end\">");
                    months();
                    document.write("<select class=\"hide_if_present\" name=\"work_year_end\">");
                    years();
                    selectMonth("work_month_start", "");
                    selectMonth("work_month_end", "");
                    </script><br>
                    <ul>
                    <label class='subscript'>Currently Employed: </label><input onclick='hideIfPresent()' type='checkbox' name='present' value='1' > </li>
                    <li> <label class='field'>Achievement(s): </label><textarea name='achievement' rows='3'></textarea> </li> </ul>
                    </div>
                    <?=$summer_intern_confirm?>
                </ul>
            </form>
            <div style='border-bottom:1px dotted #b2b2b2; margin-top:0.5em;'></div>
		</div>
	</div>
</div>
<!-- content -->
<section id="content">  
	<div class="container_12">
		<div class="wrapper">
			<div class="grid_4 padbot2">
				<h2 style="font-family: 'Lato', Arial, Helvetica; text-transform: uppercase;">Notifications</h2>
				<div class="box-img"><?=$picture?></div>
      <p><?=$message1?></p>
      <p><?=$viewers?></p>
				<a href="#" class="button1">See all</a>
			</div>
			<div class="grid_4 padbot2">
				<h2 style="font-family: 'Lato', Arial, Helvetica; text-transform: uppercase;">Scheduled Events</h2>
				<p class="padtop padbot"><?=$job_mes?></p>
				<a href="careers.php" class="button1">See all</a><!--<a href="careers.php" class="button1" style="padding-left:50px;">Add event</a>-->
			</div>
			<div class="grid_4 padbot2">
				<h2 style="font-family: 'Lato', Arial, Helvetica; text-transform: uppercase;">Inbox</h2>
				<p class="padtop padbot"><?=$message?></p>
				<a href="inbox.php" class="button1">See all</a>
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
