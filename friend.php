<?php
session_start();
define('__ROOT__', dirname(__FILE__)); 
require_once('generalfunctions/database.php');
require_once('generalfunctions/template.php');
require_once('generalfunctions/search.php');
$connect = connectToDatabase();

//If selected an offer.
if (!$connect)
{
	echo "failed to connect";
}
$query = "SELECT * FROM education_general";
$result = mysql_query($query);
$college_list = "";
while ($college = mysql_fetch_assoc($result)) 
{
	$college_list = $college_list."<option value='".$college['college']."'>".$college['college']."</option>";
}
$query = "SELECT * FROM majors";
$result = mysql_query($query);
$major_list = "";
while ($major = mysql_fetch_assoc($result)) 
{
	$major_list = $major_list."<option value='".$major['major']."'>".$major['major']."</option>";
}
if (isset($_POST['offer']))
{
        $select = $_POST['select'];
        for ($i = 0; $i < count($select); $i++)
        {
                $tmp = $select[$i];
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
$query = "";

// Store jid as well.
if (isset($_GET['jid']))
{
	$_SESSION['search']['jid'] = $_GET['jid'];
}

// If currently searching.
if ($_POST['search'] == "Search")
{
	$archives = $_SESSION['search']['name'] = $_POST['name'];
	$major = $_SESSION['search']['major'] = $_POST['major'];
	$either = $_SESSION['search']['either'] = $_POST['either'];
	$college = $_SESSION['search']['college'] = $_POST['college'];
	$gpa = $_SESSION['search']['gpa'] = $_POST['gpa'];
	$work_experience = $_SESSION['search']['work_experience'] = $_POST['work_experience'];
	$skills = $_SESSION['search']['skills'] = $_POST['skills'];
	
	
	/**
	Searching by name
	**/
	$spaceplace = strpos($archives, " ");
	if ($spaceplace > 0) // two words
	{
		$first_name = substr($archives, 0, strpos($archives, " "));
		$last_name = substr(strchr($archives, " "), 1);
		$query = sprintf("SELECT u.idnum, first_name, last_name, picture, status, skills, college, title, major, minor, gpa, college_start, college_end, field FROM users u JOIN education_data ed ON u.idnum=ed.idnum WHERE first_name='%s' AND last_name='%s'", $first_name, $last_name);
	}
	else if ($archives == "") // all users.
	{
		$query = sprintf("SELECT u.idnum, first_name, last_name, picture, status, skills, college, title, major, minor, gpa, college_start, college_end, field FROM users u, education_data ed WHERE u.idnum=ed.idnum");
	}
	else //either first or last name entered.
	{
		$query = sprintf("SELECT u.idnum, first_name, last_name, picture, status, skills, college, title, major, minor, gpa, college_start, college_end, field FROM (SELECT * FROM users WHERE first_name LIKE '%%$archives%%' OR last_name LIKE '%%$archives%%') u, education_data ed WHERE u.idnum=ed.idnum");
	}
	
	$add = "";
	/**
	Searching by Major
	**/
	if (isset($major))
	{
		/**
		for ($i = 0; $i < count($major); $i++)
		{
			$add .= " AND major LIKE '%%$major[$i]%%'";
		}
		**/
		if ($major!="All")
		{
			$add .= " AND major LIKE '%%$major%%'";
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

//Checks when to clear search requirements
else if (isset($_GET['new_search']))
{
	unset($_SESSION['search']['name'],$_SESSION['search']['major'], $_SESSION['search']['either'], $_SESSION['search']['college'], $_SESSION['search']['gpa'], $_SESSION['search']['work_experience'], $_SESSION['search']['skills'], $_SESSION['search']['jid']);
}

//Checks whether to add jid or not.
if (isset($_GET['jid']))
{
	//$error = "jid: ".$_SESSION['search']['jid']." ".$query;
	$query = showSavedSearches($_SESSION['search']['jid']);
	//$error = $query;
	$message = showQueryResults($query, 0);
}
else if (!$_SESSION['business_mode'])
{
	$query = showSavedSearches(0);
	$message = showQueryResults($query, 0);
	//$error = $query;
}
else if (isset($_SESSION['search']['jid']))
{
	//$error = $query;
	$message = showQueryResults($query, $_SESSION['search']['jid']);
}
else
{
	//$error = $query;
	$message = showQueryResults($query, 0);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Friends</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width; initial-scale=1.0">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/skeleton.css">
<script src="js/jquery-1.7.1.min.js"></script>
<script src="js/superfish.js"></script>
<script src="js/hoverIntent.js"></script>
<script src="js/script.js"></script>
<script src="js/FF-cash.js"></script>
<script src="simple.js"></script>
</head>
<body>
<?=$error?>
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
                <form action='search.php' method='post'>
                <div align="center" style="font-size: 16px; font-family: 'Lato', Arial, Helvetica; font-weight:bold; text-transform:uppercase;">
                <label for="careers">Search Candidates: </label>
                </div>
                <ul id="search">
                <li><label for="name" style="float: left;">Name: </label>
                <input name="name" size="25" value="<?=$_SESSION['search']['name']?>"/></li>
                <li><label for="major" style="float: left;">Major: </label>
                <select id="major" name="major" size="1">
                <option selected="selected">All</Option>
                <?=$major_list?>
                </select></li>
                <li><label for="college[]" style="float: left;">School: </label>
                <select id="college" name="college[]" multiple="multiple" size="1">
                <?=$college_list?>
                <option value='other'>Other</option>		
                </select>
                </li>
                <li><label for="gpa" style="float: left;">Minimum GPA: </label>
                <input name="gpa" size="25" value="<?=$_SESSION['search']['gpa']?>" /></li>
                <li><label for="work_experience" style="float: left;">Work Experience: </label>
                <input name="work_experience" size="10" style="width: 150px;" value="<?=$_SESSION['search']['work_experience']?>"/> Years</li>
                <li><label for="skills" style="float:left;">Skill(s): </label><input name="skills" size="25" value="<?=$_SESSION['search']['skills']?>"></li>
                <!--<li><label for='either' style='float: left;'>Any/All Majors</label><input type="checkbox" name='either'></li>-->
                <input type="hidden" name="jid" value="<?=$_SESSION['search']['jid']?>">
                <input type="submit" name="search" value="Search"/>
                </ul>
                </form>
                <script>
				selectDefault('major', '<?=$_SESSION['search']['major']?>');
				<?=$array?>
				</script>
            </div>
            <div class="grid_8">
                    <fieldset>
                    <div style="padding-top: 10px; font-size:12px;">
                    <ul id="messages">
    				<?=$message?>
                    </ul>
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
