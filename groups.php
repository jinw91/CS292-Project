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
Add to Job button
**/
if ($_POST['submit']=="Change Priority")
{
	$select = $_POST['select'];
	$from_job = $_POST['from_jid'];
	$priority = $_POST['priority'];
	
	for ($i = 0; $i < count($select); $i++)
	{
		$query = sprintf("UPDATE c_applied_%d SET priority='$priority' WHERE idnum='%d' AND jid='$from_job'", $_SESSION['company']['b_id'], $select[$i]);
		$result = mysql_query($query);
	}
}
else if (isset($_POST['submit']))
{
	$select = $_POST['select'];
	$from_job = $_POST['from_jid'];
	$job = $_POST['jid'];
	if ($_POST['submit']=="Move to Job")
	{
		for ($i = 0; $i < count($select); $i++)
		{
			$query = sprintf("DELETE FROM c_applied_%d WHERE idnum='%d' AND jid='$from_job'", $_SESSION['company']['b_id'], $select[$i]);
			$result = mysql_query($query);
		}
	}
	if ($_POST['submit']!="Delete")
	{
		for ($i = 0; $i < count($select); $i++)
		{
			$query = sprintf("INSERT INTO c_applied_%d (idnum, jid) VALUES ('%d', '$job')", $_SESSION['company']['b_id'], $select[$i]);
			$result = mysql_query($query);
		}
	}
}


//Base query
$query = sprintf("SELECT * FROM c_applied_%d c, users u, education_data ed WHERE c.idnum=u.idnum AND u.idnum=ed.idnum", $_SESSION['company']['b_id']);
if ($_POST['applicants']=="Submit")
{
	$name = $_POST['name'];
	$major = $_POST['major'];
	$job = $_POST['jobs'];
	$jobs = "";
	$priorities = "";
	
	if (isset($job))
	{
		for ($i = 0; $i<count($job); $i++)
		{
			$query .= " AND jid=".$job[$i];
		}
	}
	
}
$query .= " GROUP BY jid";

$result = mysql_query($query);
if (!$result)
{
	$error = $query." ".mysql_error();
}
else if (mysql_num_rows($result) > 0)
{
	$lastjid = "";
	$message = "<ul id='messages'><form action='search.php' method='POST'>";
	while ($mes = mysql_fetch_assoc($result))
	{
		if ($mes['jid'] != $lastjid)
		{
			$message .= "</fieldset><fieldset title='".$mes['job_name']."'>";
		}
		$lastjid = $mes['jid'];
		$message .= $message."<li><img style='float:left; margin-right:2px' src='".$mes['picture']."' width='35' height='35'/><a href='cprofile.php?idnum=".$mes['idnum']."'>".$mes['first_name']." ".$mes['last_name']."</a>";
		$message .= "<span style='float: right;'><input type='checkbox' name='selected[]' value='".$mes['idnum']."'/></span>";
		$message = $message."<br>".$mes['field']." at ".$mes['college']."</li>";
	}
	$message .= "<div align='right'> <input type='submit' name='submit' value='Add to Job'><input type='submit' name='submit' value='Move to Job'><input type='submit' name='submit' value='Change Priority'><input type='submit' name='submit' value='Delete'></div></form></ul>"; //add option to pick job.
}

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
	}
}

$priority = "<li><label for='name' style='float: left;'>High: </label><input name='priorities[]' type='checkbox'/></li><li><label for='name' style='float: left;'>Medium: </label><input name='priorities[]' type='checkbox'/></li><li><label for='name' style='float: left;'>Low: </label><input name='priorities[]' type='checkbox'/></li><li><label for='name' style='float: left;'>None: </label><input name='priorities[]' type='checkbox'/></li>";

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
            <?=$jobs?>
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
            <div class="grid_6 suffix_2">
                    <fieldset>
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