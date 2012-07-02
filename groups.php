<?php
session_start();

define('__ROOT__', dirname(__FILE__)); 
require_once('generalfunctions/database.php');
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
		if (!isset($to_id) || !array_search($tmp, $to_id))
		{
			$to_id[] = $tmp;
		}
	}
	$_SESSION['to_id'] = $to_id;
	$mes = "messagetype=";
	if ($_POST['offer'] == "Schedule Phone Interview")
	{
		$mes = $mes."phone";
	}
	else if ($_POST['offer'] == "Schedule Job Interview")
	{
		$mes = $mes."interview";
	}
	else if ($_POST['offer'] == "Offer Job")
	{
		$mes = $mes."offer";
	}
	else if ($_POST['offer'] == "Send Supplement Material")
	{
		$mes = $mes."supplement";
	}
	header("Location: generalfunctions/message_template.php?multiple=true&".$mes);
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


/**
Creates the left bar list of jobs.
**/
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
        $jobs = $jobs."<li><label for='name' style='float: left; width: 200px;'>".$job['job_name']." </label><input name='jobs[]' value='".$job['jid']."' type='checkbox' ".(($job['jid']==$_GET['jid']||in_array($job['jid'],$_POST['jobs']))?"checked='checked'":"")."/></li>";
		$job_dropdown .= "<option value='".$job['jid']."'>".$job['job_name']."</option>";
	}
}

$priority = "<li><label for='name' style='float: left;'>High: </label><input name='priorities[]' type='checkbox'/></li><li><label for='name' style='float: left;'>Medium: </label><input name='priorities[]' type='checkbox'/></li><li><label for='name' style='float: left;'>Low: </label><input name='priorities[]' type='checkbox'/></li><li><label for='name' style='float: left;'>None: </label><input name='priorities[]' type='checkbox'/></li>";

//Base query
$query = sprintf("SELECT * FROM c_applied_%d c, users u, education_data ed, careers ca WHERE c.idnum=u.idnum AND u.idnum=ed.idnum AND ca.jid=c.jid", $_SESSION['company']['b_id']);
if (isset($_GET['jid']))
{
	$query .= " AND c.jid=".$_GET['jid'];
}

//Limit based on search.
if ($_POST['search']=="Search")
{
	$archives = $_SESSION['groups']['name'] = $_POST['name'];
	$major = $_SESSION['groups']['major'] = $_POST['major'];
	$either = $_SESSION['groups']['either'] = $_POST['either'];
	$college = $_SESSION['groups']['college'] = $_POST['college'];
	$gpa = $_SESSION['groups']['gpa'] = $_POST['gpa'];
	$work_experience = $_SESSION['groups']['work_experience'] = $_POST['work_experience'];
	$skills = $_SESSION['groups']['skills'] = $_POST['skills'];
	$jids = $_POST['jobs'];
	
	/**
	Searching by name
	**/
	$spaceplace = strpos($archives, " ");
	if ($spaceplace > 0) // two words
	{
		$first_name = substr($archives, 0, strpos($archives, " "));
		$last_name = substr(strchr($archives, " "), 1);
		$query .= " AND u.first_name=$first_name AND u.last_name=$last_name";
	}
	else //either first or last name entered.
	{
		$query = sprintf("SELECT * FROM c_applied_%d c, (SELECT * FROM users WHERE first_name LIKE '%%$archives%%' OR last_name LIKE '%%$archives%%') u, education_data ed, careers ca WHERE c.idnum=u.idnum AND u.idnum=ed.idnum AND ca.jid=c.jid", $_SESSION['company']['b_id']);
	}
	
	$add = "";
	
	/**
	Searching by job id
	**/
	if (count($jids) > 0)
	{
		for ($i = 0; $i<count($jids); $i++)
		{
			$add .= " AND c.jid=".$jids[$i];
		}
	}
	
	/**
	Searching by Major
	**/
	if (isset($major))
	{
		if ($major!="All")
		{
			$add .= " AND ed.major LIKE '%%$major%%'";
		}
	}
	
	/**
	Searching by School
	**/
	if (isset($college))
	{
		$array = "var college_array = new Array();";
		for ($i = 0; $i < count($college); $i++)
		{
			$add .= " AND college LIKE '$college[$i]%%'";
			$array .= "\ncollege_array[".$i."] = '".$college[$i]."';";
		}
		$array .= "\nselectMultipleId('college', college_array);";
	}
	
	/**
	Search by GPA
	**/
	if ($gpa != "")
	{
		$add .= " AND gpa >= '$gpa'";
	}
	
	/**
	Search by Skills
	**/
	if ($skills != "")
	{
		$add .= " AND skills LIKE '%%$skills%%'";
	}
	
	$query .= $add;
	
	if ($work_experience != "")
	{
		$query = "SELECT * FROM (".$query;
		$query = $query.") AS x, work_data w WHERE w.idnum=x.idnum GROUP BY x.idnum HAVING SUM(DATEDIFF(company_end, company_start))/365 > $work_experience";
	}
}
$query .= " ORDER BY c.jid";

//$error = $query;
$result = mysql_query($query);
if (!$result)
{
	$error = $query." ".mysql_error();
}
else if (mysql_num_rows($result) > 0)
{
	$lastjid = "";
	$message = $message."<ul id='messages'><form action='groups.php' method='POST'>";
	$first_test = false;
	while ($mes = mysql_fetch_assoc($result))
	{
		if ($mes['jid'] != $lastjid && $lastjid != "" && $first_test)
		{
			$message .= "</fieldset><fieldset><legend><span class='job_title_font'>".$mes['job_name']."</span></legend><hr />";
		}
		else if (!$first_test)
		{
			$message .= "<fieldset><legend><span class='job_title_font'>".$mes['job_name']."</span></legend><hr />";
			$first_test = true;
		}
		$lastjid = $mes['jid'];
		if (is_null($mes['picture']))
		{
			$mes['picture'] = "images/default.png";
		}
		$message = $message."<li><img style='float:left; margin-right:2px' src='".$mes['picture']."' width='35' height='35'/><a href='cprofile.php?idnum=".$mes['idnum']."'>".$mes['first_name']." ".$mes['last_name']."</a>";
		$message = $message."<span style='float: right;'><input type='checkbox' name='select[]' class='candidate_checkbox' onclick='select_one();' value='".$mes['idnum'].".".$mes['jid']."'/></span>";
		$message = $message."<a href='generalfunctions/message_template.php?messagetype=interview&single=true&to_id=".$mes['idnum']."'><img style='float:right; margin-right:4px' src='site_im/interviewicon.jpg' width='30' height='30' /></a>";
		$message = $message."<a href='generalfunctions/message_template.php?messagetype=phone&single=true&to_id=".$mes['idnum']."'><img style='float:right; margin-right:4px' src='site_im/phoneicon.jpg' width='30' height='30' /></a>";
		$message = $message."<a href='generalfunctions/message_template.php?messagetype=blank&single=true&to_id=".$mes['idnum']."'><img style='float:right; margin-right:4px' src='site_im/messageicon.jpg' width='30' height='30' /></a>";
		$message = $message."<a href='generalfunctions/message_template.php?messagetype=supplement&single=true&to_id=".$mes['idnum']."'><img style='float:right; margin-right:4px' src='site_im/resumeicon.jpg' width='30' height='30' /></a>";
		$message = $message."<br>".$mes['field']." at ".$mes['college']."</li>";
	}
	$message = $message."\n<li><span style='float: right;'>Select all<input type='checkbox' id='selectall' onclick='select_all();'/></span></li>";
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
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="js/superfish.js"></script>
<script type="text/javascript" src="js/hoverIntent.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/FF-cash.js"></script>
<script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
<script type="text/javascript" src="js/slides.min.jquery.js"></script>
<script type="text/javascript" src="simple.js"></script>
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
            <label for="careers">Search Applicants: </label>
            </div>
            <ul id='search'>
                <li><label for='name' style='float: left;'>Name: </label>
                <input name='name' size='25'/></li>
                <li><label for='major' style='float: left;'>Major: </label>
                <select id='major' name='major' size='1'>
				<option>All</option>
                <option>Biomedical Engineering</option>
                <option>Civil Engineering</option>
                <option>Computer Science</option>
                <option>Computer Engineering</option>
                <option>Economics</option>
                <option>Human Organizational Development</option>
                <option>Mechanical Engineering</option>
                </select></li>
                <li><label for='college[]' style='float: left;'>School: </label>
                <select id='college' name='college[]' multiple='multiple' size='1'>
                <option value='Vanderbilt University'>Vanderbilt University</option>
                <option value='Duke University'>Duke University</option>
                <option value='Northwestern University'>Northwestern University</option>
                <option value='University of Chicago'>University of Chicago</option>
                <option value='University of Notre Dame'>University of Notre Dame</option>
                <option value='University of North Carolina'>University of North Carolina</option>
                <option value='University of Virginia'>University of Virginia</option>
                <option value='Washington University in St. Louis'>Washington University in St. Louis</option>
                </select>
                </li>
                <li><label for='gpa' style='float: left;'>Minimum GPA: </label>
                <input name='gpa' size='25' /></li>
                <li><label for='work_experience' style='float: left;'>Work Experience: </label>
                <input name='work_experience' size='10' style='width: 150px;' /> Years</li>
                <li><label for='skills' style='float:left;'>Skill(s): </label><input name='skills' size='25' /></li>
            <div align="center" style="font-size: 16px; font-family: 'Lato', Arial, Helvetica; font-weight:bold; text-transform:uppercase; display:none;">
            <label for="group">Job(s): </label>
            </div>
            <?=$jobs?><br>
            <!--<div align="center" style="font-size: 16px; font-family: 'Lato', Arial, Helvetica; font-weight:bold; text-transform:uppercase; display:none;">
            <label for="group">Priorities: </label>
            </div>
            <?=$priorities?>-->
            <input type="submit" name="search" value="Search"/>
            </ul>
            </form>
            <br>
                <div align="center" style="font-size: 16px; font-family: 'Lato', Arial, Helvetica; font-weight:bold; text-transform:uppercase;">
                <a class='header_font' href='search.php'>Search For Candidates: </a>
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
