<?php
/**
Friends page
@Accessibility: From the navigation bar.
@Business: Should not exist.
@College: Should not exist.
@User: Pulls up a list of friends.

**/
session_start();
define('__ROOT__', dirname(__FILE__)); 
require_once('generalfunctions/database.php');
require_once('generalfunctions/template.php');
require_once('generalfunctions/search.php');

$connect = connectToDatabase();
//If selected an offer.
if (!$connect)
{
	$error = "failed to connect";
}

//Select all schools
$college_list = retrieveAllColleges();
$major_list = retrieveAllMajors();
$query = "";

// If currently searching through friend's list
if ($_POST['search'] == "Search")
{
	$archives = $_SESSION['search']['name'] = $_POST['name'];
	$major = $_SESSION['search']['major'] = $_POST['major'];
	$either = $_SESSION['search']['either'] = $_POST['either'];
	$college = $_SESSION['search']['college'] = $_POST['college'];
	$skills = $_SESSION['search']['skills'] = $_POST['skills'];
	
	
	/**
	Searching by name
	**/
	$spaceplace = strpos($archives, " ");
	if ($spaceplace > 0) // two words
	{
		$first_name = substr($archives, 0, strpos($archives, " "));
		$last_name = substr(strchr($archives, " "), 1);
		$query = sprintf("SELECT DISTINCT u.idnum, first_name, last_name, picture, status, skills, college, title, major, minor, gpa, college_start, college_end, field FROM users u, education_data ed, friends f WHERE u.idnum=ed.idnum AND f.to_id=u.idnum AND first_name='%s' AND last_name='%s' AND f.from_id='%d'", $first_name, $last_name, $_SESSION['idnum']);
	}
	else if ($archives == "") // all users.
	{
		$query = sprintf("SELECT DISTINCT u.idnum, first_name, last_name, picture, status, skills, college, title, major, minor, gpa, college_start, college_end, field FROM users u, education_data ed, friends f WHERE u.idnum=ed.idnum AND f.to_id=u.idnum AND f.from_id='%d'", $_SESSION['idnum']);
	}
	else //either first or last name entered.
	{
		$query = sprintf("SELECT DISTINCT u.idnum, first_name, last_name, picture, status, skills, college, title, major, minor, gpa, college_start, college_end, field FROM (SELECT * FROM users WHERE first_name LIKE '%%$archives%%' OR last_name LIKE '%%$archives%%') u, education_data ed, friends f WHERE u.idnum=ed.idnum AND f.to_id=u.idnum AND f.from_id='%d'", $_SESSION['idnum']);
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
	Search by Skills
	**/
	if ($skills != "")
	{
		$add .= " AND skills LIKE '%%$skills%%'";
	}
	
	$query .= $add;
}

//Checks when to clear search requirements
else if (isset($_GET['new_search']))
{
	unset($_SESSION['search']['name'],$_SESSION['search']['major'], $_SESSION['search']['either'], $_SESSION['search']['college'], $_SESSION['search']['gpa'], $_SESSION['search']['work_experience'], $_SESSION['search']['skills'], $_SESSION['search']['jid']);
}

//Checks whether searching or not.
if (!isset($_POST['search']))
{
	$query = showSavedSearches(0);
	$message = showQueryResults($query, 0, true);
    $query2 = sprintf("SELECT DISTINCT groups FROM friends WHERE from_id='%d'", $_SESSION['idnum']);
    $result = mysql_query($query2);
    if (!$result)
    {
        $error .= mysql_error();
        //$error .= $query2;
    }
    $group_dropdown = "<option value=new_group>Create new group</option>";
	while ($groups = mysql_fetch_assoc($result))
    {
        $group_dropdown .= "<option value='".$group."'>".$group."</option>";
    }
	$add_to_group .= "<div align='right'><select name='group' id='select_group'>";
    $add_to_group .= $group_dropdown;
    $add_to_group .= "</select><input type='submit' name='submit' value='Add to Group' onclick='copy_group()'>";
    $add_to_group .= "<input type='hidden' name='hidden_group_name' id='hidden_group_name'></div>"; //add option to pick job.
}
if ($_POST['submit'] == "Add to Group")
{
    $group = $_POST['hidden_group_name'];
    $select = $_POST['select'];
    for ($i = 0; $i < count($select); $i++)
    {
        $query = sprintf("UPDATE friends SET groups='%s' WHERE from_id='%d' AND to_id='%d'", $group, $_SESSION['idnum'], $select[$i]);
        $result = mysql_query($query);
    }
}
else
{
	$message = showQueryResults($query, 0, true);
    //$error .= $query;
}

mysql_close();
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
                <form action='friend.php' method='post'>
                <div align="center" style="font-size: 16px; font-family: 'Lato', Arial, Helvetica; font-weight:bold; text-transform:uppercase;">
                <label for="careers">Search Friends: </label>
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
                <li><label for="skills" style="float:left;">Skill(s): </label><input name="skills" size="25" value="<?=$_SESSION['search']['skills']?>"></li>
                <!--<li><label for='either' style='float: left;'>Any/All Majors</label><input type="checkbox" name='either'></li>-->
                <input type="hidden" name="jid" value="<?=$_SESSION['search']['jid']?>">
                <li></li>
                <input type="submit" name="search" value="Search"/>
                </ul>
                </form>
                <div align="center" style="font-size: 16px; font-family: 'Lato', Arial, Helvetica; font-weight:bold; text-transform:uppercase;">
                <a class='header_font' href='search.php?friends=true'>Search For Friends: </a>
                </div>
                <script>
				selectDefault('major', '<?=$_SESSION['search']['major']?>');
				<?=$array?>
				</script>
            </div>
            <div class="grid_8">
                    <fieldset>
                    <div style="padding-top: 10px; font-size:12px;">
                    <ul id="friend_list">
                    <?=$message?>
    				<?=$add_to_group?>
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
