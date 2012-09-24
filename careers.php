<?php
if (!isset($_SESSION))
{
	session_start();
}
if (!isset($_SESSION['idnum']))
{
	header("Location: home.php");
}
define('__ROOT__', dirname(__FILE__)); 
require_once(__ROOT__.'/generalfunctions/database.php');
require_once(__ROOT__.'/generalfunctions/template.php');
require_once(__ROOT__.'/generalfunctions/career.php');
$tbl_name="users";
$connect = connectToDatabase();
$error = "reached here";
if (!$connect)
{
	$error = "failed to connect";	
}

if (isset($_POST['export']) && $_POST['export']=="Export to CSV")
{
	header("Location: sample.csv");
}

$search = searchNoVar();

//Apply to a job.
if (isset($_GET['jid']) && isset($_GET['apply']))
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
	if (isset($_POST['search'])&& $_POST['search'] == "Search")
	{
		$majors = $_POST['major'];
	}
	else if(isset($_SESSION['education']))
	{
		$majors = $_SESSION['education']['major'];
	}
	if(isset($majors))
	{
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
				<div id='edit_profile'><a href='careers.php?jid=".$job['jid']."&apply=1'><button>Apply</button></a></div>"; //adds name and options.
				$message = $message."</li>";
			}
			$message = $message."</ul>";
		}
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
		$message = "<ul id='messages_noborder'><li>Your company has yet to post any job opportunities.<br> <div id='edit_profile'><a href='career.php'>Add Job</a></div></li></ul>";
	}
	else
	{
		$message = "<span class='job_title_font'>&nbsp;<a class='header_font' href='career.php'>Add Job</a></span><ul id='company_job_entries'>";
		$job_num = 0;
		while ($job =  mysql_fetch_assoc($result))
		{
			$new_interested = "";
			$message = $message."<fieldset><legend><span class='job_title_font'>&nbsp;".$job['job_name']." in ".$job['city'].", ".$job['state']."</span></legend><hr/><li>
			<ul>
			<li><img src='site_im/plussign.jpg' width='16' height='16' id='slidejob".$job_num."' onclick='slideDown(this.id, \"job".$job_num."\");'/><span class='job_entry_font'>Job Description</span><span id='edit_profile'><a href='career.php?jid=".$job['jid']."'><button>Edit</button></a></span></li>
				<ul id='job".$job_num."' style='display: none'><li><b>Major: </b>".$job['major']."</li>
				<li><b>Location: </b>".$job['city'].", ".$job['state']."</li>
				<li><b>Description: </b>".$job['job_description']."</li>
				<li><b>Qualifications: </b>".$job['qualifications']."</li>
				<li><b>Pay: </b>".$job['pay']." ".$job['rate']."</li></ul>
			<li><img src='site_im/plussign.jpg' width='16' height='16' id='slidecandidates".$job_num."' onclick='slideDown(this.id, \"candidates".$job_num."\");'/><span class='job_entry_font'>Candidates</span><span id='edit_profile'><a href='search.php?jid=".$job['jid']."'><button>Start New Search</button></a></span></li>
				<ul id='candidates".$job_num."' style='display: none'><li><a href='groups.php?jid=".$job['jid']."'><img src='site_im/folderofcands.jpg' width='50'></a><a href='groups.php'><img style='margin-left: 50px;' src='site_im/folderofcands.jpg' width='50'><br><b>Applied</b><b style='margin-left: 50px;'>Top Candidates</b></a></li></ul></ul>";
			/**
			
			<ul>
			<li><img src='site_im/plussign.jpg' width='18' height='18' onclick='return true;'/><span class='job_entry_font'>Job Description</span><span id='edit_profile'><a href='career.php?jid=".$job['jid']."'>Edit</a></span></li>
				<ul><li><b>Major: </b>".$job['major']."</li>
				<li><b>Location: </b>".$job['city'].", ".$job['state']."</li>
				<li><b>Description: </b>".$job['job_description']."</li>
				<li><b>Qualifications: </b>".$job['qualifications']."</li>
				<li><b>Pay: </b>".$job['pay']." ".$job['rate']."</li></ul>
			<li><img src='site_im/plussign.jpg' width='18' height='18' onclick='return true;'/><span class='job_entry_font'>Candidates</span><span id='edit_profile'><a href='search.php?jid=".$job['jid']."'>Start New Search</a></span></li>
				<ul style='border-bottom: 1px dashed gray;'><li><a href='groups.php?jid=".$job['jid']."'><img src='site_im/folderofcands.jpg' width='50'></a><a href='groups.php'><img style='margin-left: 50px;' src='site_im/folderofcands.jpg' width='50'><br><b>Applied</b><b style='margin-left: 50px;'>Saved Candidates</b></a></li></ul>
			</ul>";
			
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
			}
			$message .= "<a href='search.php?jid=".$job['jid']."'>Find candidates</a></div>"; //adds name and options.**/
			$message = $message."</fieldset></li>".$new_interested;
			$job_num ++;
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
<title>Search Candidates</title>
<meta charset="utf-8">
<!--<meta name="viewport" content="width=device-width; initial-scale=1.0">-->
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/skeleton.css">
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="js/jquery-1.7.1.min.js"></script>
<script src="js/superfish.js"></script>
<script src="js/hoverIntent.js"></script>
<script src="js/script.js"></script>
<script src="js/FF-cash.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
<script src="js/slides.min.jquery.js"></script>
<script src="simple.js"></script>
</head>
<body>
<?=$error;?>
<!-- header -->
<header>
	<div class="top-header">
		<div class="container_12">
			<div class="grid_12">
				<div class="fright">
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
			
        <?php
		if(!defined('__ROOT__')) define('__ROOT__', dirname(__FILE__)); 
		require_once(__ROOT__.'/generalfunctions/template.php');
		if(isset($_SESSION['num_mes']))
		{
			echo navBar($_SESSION['num_mes']);
		}
		else
		{
			echo navBar(0);
		}
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
                <form action="search.php" method="post">
                <div align="center" style="font-size: 16px; font-family: 'Lato', Arial, Helvetica; font-weight:bold; text-transform:uppercase;">
                <label for="careers">Search Candidates: </label>
                </div>
                <?=$search?>
                <!--<li><label for='either' style='float: left;'>Any/All Majors</label><input type="checkbox" name='either'></li>-->
                <input type="submit" name="search" value="Search"/>
                </ul>
                </form>
                <form action="careers.php" method="post">
                <input type="submit" name="export" value="Export to CSV"/>
                </form>
            </div>
            <div class="grid_8">
                    <fieldset>
                    <div class="message">
    				<?=$message?>
                    </div>
                    </fieldset> 
            </div> 
    </div>        
    </div> 
</section> 
<!-- footer --> 
<?php echo footer(); ?>
</body>
</html>