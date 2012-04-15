<?php
session_start();

define('__ROOT__', dirname(__FILE__)); 
require_once('generalfunctions/database.php');
$tbl_name="users";
$connect = connectToDatabase();
if (!$connect)
{
	$error = "failed to connect";
}

/**
Change Priority
**/
if ($_POST['submit']=="Change Priority")
{
	$select = $_POST['select'];
	$from_job = $_POST['from_jid'];
	$priority = $_POST['priority'];
	
	for ($i = 0; $i < count($select); $i++)
	{
		$tmp = $select[$i];
		$idn = substr($tmp, 0, strpos($tmp, "."));
		$from_job = substr(strchr($tmp, "."), 1);
		$query = sprintf("UPDATE c_applied_%d SET priority='$priority' WHERE idnum='%d' AND jid='$from_job'", $_SESSION['company']['b_id'], $idn);
		$result = mysql_query($query);
		//if (!$result)
			{
				$error = $query." ".mysql_error();
			}
	}
}
/**
Phone Interview/Job Interview
**/
else if (isset($_POST['offer']))
{
	$select = $_POST['select'];
	for ($i = 0; $i < count($select); $i++)
	{
		$tmp = $select[$i];
		$tmp = substr($tmp, 0, strpos($tmp, "."));
		if (!isset($contacts) || !array_search($tmp, $contacts))
		{
			$contacts[] = $tmp;
		}
	}
	$_SESSION['contacts'] = $contacts;
	if ($_POST['offer'] == "Schedule Phone Interview")
	{
		$_SESSION['subject'] = "Phone Interview: ".$_SESSION['company']['company_name'];
		$_SESSION['body'] = "Thank you for sending in your application to ".$_SESSION['company']['company_name'].". We are pleased with what we see on your resume and would like to schedule a phone interview with you. The following times are available, please let us know what works best for you.";
		$_SESSION['time_edit'] = true;
	}
	else if ($_POST['offer'] == "Schedule Job Interview")
	{
		$_SESSION['subject'] = "Job Interview: ".$_SESSION['company']['company_name'];
		$_SESSION['body'] = "Thank you for sending in your application to ".$_SESSION['company']['company_name'].". We are pleased with what we see on your resume and would like to schedule an in-person interview with you. The following times are available, please let us know what works best for you.";
		$_SESSION['time_edit'] = true;
	}
	else if ($_POST['offer'] == "Offer Job")
	{
		$_SESSION['subject'] = "Job Offer: ".$_SESSION['company']['company_name'];
		$_SESSION['body'] = "Congratulations! We are pleased to have you to be part of ".$_SESSION['company']['company_name'].". Your compensation is as follows: You will begin work on the following day. Please let us know by then whether you will accept the job or not.";
		$_SESSION['time_edit'] = true;
	}
	
	header("Location: inbox.php?write=true&default=true");
}
/**
Add to job, move to job, delete.
**/
else if (isset($_POST['submit']))
{
	$select = $_POST['select'];
	$from_job = $_POST['from_jid'];
	$job = $_POST['jid'];
	if ($_POST['submit']=="Move to Job" || $_POST['submit']=="Delete")
	{
		for ($i = 0; $i < count($select); $i++)
		{
			$tmp = $select[$i];
			$idn = substr($tmp, 0, strpos($tmp, "."));
			$from_job = substr(strchr($tmp, "."), 1);
			$query = sprintf("DELETE FROM c_applied_%d WHERE idnum='%d' AND jid='$from_job'", $_SESSION['company']['b_id'], $idn);
			$result = mysql_query($query);
			//if (!$result)
			{
				$error = $query." ".mysql_error();
			}
		}
	}
	if ($_POST['submit']!="Delete")
	{
		for ($i = 0; $i < count($select); $i++)
		{
			$tmp = $select[$i];
			$idn = substr($tmp, 0, strpos($tmp, "."));
			$from_job = substr(strchr($tmp, "."), 1);
			$query = sprintf("INSERT INTO c_applied_%d (idnum, jid) VALUES ('%d', '$job')", $_SESSION['company']['b_id'], $idn);
			$result = mysql_query($query);
			//if (!$result)
			{
				$error = $query." ".mysql_error();
			}
		}
	}
}
$jobs = "";
$priorities = "";
$job_dropdown = "";

$query = sprintf("SELECT * FROM careers WHERE b_id='%d'", $_SESSION['company']['b_id']);
$result = mysql_query($query);
if (!$result)
{
	$error = $query." ".mysql_error();
}
else if (mysql_num_rows($result) == 0)
{
	$error = "Please add a new job entry.";
}
else if (mysql_num_rows($result) > 0)
{
	while ($job = mysql_fetch_assoc($result))
	{
		$jobs = $jobs."<li><label for='name' style='float: left;'>".$job['job_name']." </label><input name='jobs[]' type='checkbox'/></li>";
		$job_dropdown .= "<option value='".$job['jid']."'>".$job['job_name']."</option>";
	}
}

$priority = "<li><label for='name' style='float: left;'>High: </label><input name='priorities[]' type='checkbox'/></li><li><label for='name' style='float: left;'>Medium: </label><input name='priorities[]' type='checkbox'/></li><li><label for='name' style='float: left;'>Low: </label><input name='priorities[]' type='checkbox'/></li><li><label for='name' style='float: left;'>None: </label><input name='priorities[]' type='checkbox'/></li>";

//Base query
<<<<<<< HEAD
$query = sprintf("SELECT * FROM c_applied_%d c, users u, education_data ed WHERE c.idnum=u.idnum AND u.idnum=ed.idnum", $_SESSION['company']['b_id']);
if (isset($_GET['jid']))
{
	$query .= " AND jid=".$_GET['jid'];
}
else if ($_POST['applicants']=="Submit")
=======
$query = sprintf("SELECT DISTINCT * FROM c_applied_%d c, users u, education_data ed, careers ca WHERE c.idnum=u.idnum AND u.idnum=ed.idnum AND ca.jid=c.jid", $_SESSION['company']['b_id']);
if ($_POST['applicants']=="Submit")
>>>>>>> master
{
	$name = $_POST['name'];
	$major = $_POST['major'];
	$job = $_POST['jobs'];
	
	if (isset($job))
	{
		for ($i = 0; $i<count($job); $i++)
		{
			$query .= " AND jid=".$job[$i];
		}
	}
	
}
<<<<<<< HEAD
$query .= " ORDER BY jid";
=======
$query .= " ORDER BY c.jid";
>>>>>>> master

$result = mysql_query($query);
if (!$result)
{
	$error = $query." ".mysql_error();
}
else if (mysql_num_rows($result) > 0)
{
	$lastjid = "";
	$message = "<ul id='messages'><form action='groups.php' method='POST'>";
	$first_test = false;
	while ($mes = mysql_fetch_assoc($result))
	{
		if ($mes['jid'] != $lastjid && $lastjid != "" && $first_test)
		{
			$message .= "<hr /></fieldset><fieldset><legend>".$mes['job_name']."</legend>";
		}
		else if (!$first_test)
		{
			$message .= "<hr /><fieldset><legend>".$mes['job_name']."</legend>";
			$first_test = true;
		}
		$lastjid = $mes['jid'];
		$message = $message."<li><img style='float:left; margin-right:2px' src='".$mes['picture']."' width='35' height='35'/><a href='cprofile.php?idnum=".$mes['idnum']."'>".$mes['first_name']." ".$mes['last_name']."</a>";
<<<<<<< HEAD
		$message .= "<span style='float: right;'><input type='checkbox' name='selected[]' value='".$mes['idnum']."'/></span>";
=======
		$message = $message."<span style='float: right;'><input type='checkbox' name='select[]' value='".$mes['idnum'].".".$mes['jid']."'/></span>";
>>>>>>> master
		$message = $message."<br>".$mes['field']." at ".$mes['college']."</li>";
	}
	$message .= "<div align='right'><select name='jid'>";
	$message .= $job_dropdown;
	$message .= "</select><input type='submit' name='submit' value='Add to Job'><input type='submit' name='submit' value='Move to Job'><input type='submit' name='submit' value='Change Priority'><input type='submit' name='submit' value='Delete'></div><div align='right'><input type='submit' name='offer' value='Send Supplement Material'/><input type='submit' name='offer' value='Schedule Phone Interview'/><input type='submit' name='offer' value='Schedule Job Interview'/><input type='submit' name='offer' value='Offer Job'/></div></form></ul>"; //add option to pick job.
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
            <form action="groups.php" method="post">
            <div align="center" style="font-size: 16px; font-family: 'Lato', Arial, Helvetica; font-weight:bold; text-transform:uppercase;">
            <label for="careers">Search: </label>
            </div>
            <ul id="search">
            <li><label for="name" style="float: left;">Name: </label>
            <input name="name" size="25" /></li>
            <li><label for="major[]" style="float: left;">Major: </label>
              <select name="major[]" multiple="multiple" size="1">
                <option>Biomedical Engineering</option>
                <option>Civil Engineering</option>
                <option>Computer Science</option>
                <option>Computer Engineering</option>
                <option>Economics</option>
                <option>Human Organizational Development</option>
                <option>Mechanical Engineering</option>
              </select>
            </li>
            <div align="center" style="font-size: 16px; font-family: 'Lato', Arial, Helvetica; font-weight:bold; text-transform:uppercase;">
            <label for="group">Job(s): </label>
            </div>
            <?=$jobs?><br>
            <div align="center" style="font-size: 16px; font-family: 'Lato', Arial, Helvetica; font-weight:bold; text-transform:uppercase;">
            <label for="group">Priorities: </label>
            </div>
            <?=$priorities?>
            <input type="submit" name="search" value="Search"/>
            </ul>
            </form>
                <div align="center" style="font-size: 16px; font-family: 'Lato', Arial, Helvetica; font-weight:bold; text-transform:uppercase;">
                <a href='search.php'>Search Candidates: </a>
                </div>
            <?=$side_groups?>
            </div>
            <div class="grid_8">
                    <?=$error?>
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
