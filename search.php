<?php
session_start();
define('__ROOT__', dirname(__FILE__)); 
require_once('generalfunctions/database.php');
require_once('generalfunctions/template.php');
require_once('generalfunctions/search.php');
$tbl_name="users";
$connect = connectToDatabase();
if (!$connect)
{
	echo "failed to connect";
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



if ($_POST['search'] == "Search")
{
	$archives = $_POST['name'];
	$major = $_POST['major'];
	$either = $_POST['either'];
	$college = $_POST['college'];
	$gpa = $_POST['gpa'];
	$work_experience = $_POST['work_experience'];
	$skills = $_POST['skills'];
	
	
	
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
		$query = sprintf("SELECT u.idnum, first_name, last_name, picture, status, skills, college, title, major, minor, gpa, college_start, college_end, field FROM users u WHERE first_name LIKE '%%$archives%%' OR last_name LIKE '%%$archives%%'");
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
	Search by skills
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
	
	$message = showQueryResults($query);
}
mysql_close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Search Candidates</title>
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
<?//=$error?>
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
                <ul id="search">
                <li><label for="name" style="float: left;">Name: </label>
                <input name="name" size="25" value="<?=$archives?>"/></li>
                <li><label for="major" style="float: left;">Major: </label>
                <select id="major" name="major" size="1">
		<option selected="selected">All</Option>
                <option>Biomedical Engineering</option>
                <option>Civil Engineering</option>
                <option>Computer Science</option>
                <option>Computer Engineering</option>
                <option>Economics</option>
                <option>Human Organizational Development</option>
                <option>Mechanical Engineering</option>
                </select></li>
                <li><label for="college[]" style="float: left;">School: </label>
                <select id="college" name="college[]" multiple="multiple" size="1">
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
                <li><label for="gpa" style="float: left;">Minimum GPA: </label>
                <input name="gpa" size="25" value="<?=$gpa?>" /></li>
                <li><label for="work_experience" style="float: left;">Work Experience: </label>
                <input name="work_experience" size="10" style="width: 150px;" value="<?=$work_experience?>"/> Years</li>
                <li><label for="skills" style="float:left;">Skill(s): </label><input name="skills" size="25" value="<?=$skills?>"></li>
                <!--<li><label for='either' style='float: left;'>Any/All Majors</label><input type="checkbox" name='either'></li>-->
                <input type="submit" name="search" value="Search"/>
                </ul>
                </form>
                <script>
				selectDefault('major', '<?=$major?>');
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
