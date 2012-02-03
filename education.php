<?php
session_start();
if (!isset($_SESSION['idnum']))
{
	header("Location: index.php");
}
if ($_POST['skip'] == "Cancel")
{
	header("Location: home.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Professional Archives</title>
<link href="member.css" rel="stylesheet" type="text/css" />
</head>

<body>
<script type="text/javascript" src="simple.js">
</script>
<?php
define('__ROOT__', dirname(__FILE__)); 
require_once(__ROOT__.'/generalfunctions/database.php');
$tbl_name="users";
$connect = connectToDatabase();
if (!$connect)
{
	echo "failed to connect";	
}
$query = sprintf("SELECT * FROM education_data WHERE idnum=%d", $_SESSION['idnum']);
$result = mysql_query($query);
if (mysql_num_rows($result) == 0)
{
	$education = NULL;
}
else
{
	$education = mysql_fetch_assoc($result);
}
$month_start = substr($education['college_start'], 5, 2);
$year_start = substr($education['college_start'], 0, 4);
$month_end = substr($education['college_end'], 5, 2);
$year_end = substr($education['college_end'], 0, 4);

if ($_POST['submit'] == "Submit")
{
	$college = $_POST['college'];
	$title = $_POST['title'];
	$major = $_POST['major'];
	$college_month_start = $_POST['college_month_start'];
	$college_year_start = $_POST['college_year_start'];
	$college_month_end = $_POST['college_month_end'];
	$college_year_end = $_POST['college_year_end'];
	$gpa = $_POST['gpa'];
	$organization = $_POST['activities'];
	$idnum = $_SESSION['idnum'];
	$college_start = $college_year_start."-".$college_month_start."-01"; //arbitrary day.
	$college_end = $college_year_end."-".$college_month_end."-01"; //arbitrary day.
	if (!is_null($education))
	{
		$query = sprintf("UPDATE education_data SET college='$college', title='$title', major='$major', college_start='$college_start', college_end='$college_end', gpa='$gpa', organization='$organization' WHERE idnum=$idnum LIMIT 1");
	}
	else
	{
		$query = sprintf("INSERT INTO education_data (idnum, college, title, major, college_start, college_end, gpa, organization) VALUES ('$idnum', '$college', '$title', '$major', '$college_start', '$college_end', '$gpa', '$organization')");
	}
	$result = mysql_query($query);
	if (!$result)
	{
		echo mysql_error();	
	}
	$query = sprintf("SELECT * FROM education_data WHERE idnum=%d", $_SESSION['idnum']);
	$result = mysql_query($query);
	$education = mysql_fetch_assoc($result);
	$_SESSION['education'] = $education;
	$message = "<p id='update_message'>Education updated.</p>";
}
?>
<div class="inner" id="sitebk">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <th height="56" colspan="2" scope="col" class="top">
    <div id="sitenav" align="right"><ul>
    <li><a href="./home.php">Home</a></li> 
    <li><a href="profile.php">Profile</a></li>
    <li><a href="inbox.php">Inbox</a></li>
    <li><a href="careers.php">Careers</a></li></ul>
    </div></th>
    <th width="15%" scope="col" class="tright">
    <div id="sitenav" align="center">
    <ul><li><a href="logout.php">Logout</a></li></ul></div>
    </th>
  </tr>
  <tr>
    <th colspan="2" scope="row">
    <form action="education.php" method="post">
	<h1 id="edit_title">Education:</h1>
    <?=$message?><br />
    <div>
        <label class="field" for="college">College Name: </label>
        <select name="college" size=1>
        	<option value="Vanderbilt University">Vanderbilt University</option>
            <option value="other">Other</option> 
        </select>
    </div>
    <div>
        <label class="field" for="college">Title: </label>
        <select name="title" size=1>
        	<option value="Bachelor of Arts">Bachelor of Arts</option>
            <option value="Bachelor of Science">Bachelor of Science</option>
            <option value="Bachelor of Engineering">Bachelor of Engineering</option>
            <option value="Bachelor of Nursing">Bachelor of Nursing</option>
            <option value="Associate's Degree">Associate's Degree</option> 
        </select>    
    </div>
    <div id="static_major">
        <label class="field" for="major">Area(s) of Study: </label> <input type="text" name="major" value="<?=$education['major']?>"/><br />
	<label class="subscript" for="major">Example: Computer Science, Math</label>
    </div>
    <div id="date">
    	<label class="field" for="college_year_start">Time Attended: </label>
        <script>
		document.write("<select name=\"college_month_start\">");
		months();
		document.write("<select style=\"width: 60px;\" name=\"college_year_start\">");
		years("<?=$year_start?>");
		document.write("<label for=\"college_month_end\"> - </label>");
		document.write("<select name=\"college_month_end\">");
		months();
		document.write("<select style=\"width: 60px;\" name=\"college_year_end\">");
		years("<?=$year_end?>");
		selectMonth("college_month_start", "<?=$month_start?>");
		selectMonth("college_month_end", "<?=$month_end?>");
		</script>
    </div>
    <div>    
        <label class="field" for="gpa">Cumulative GPA: </label> <input name="gpa" size=8 value="<?=$education['gpa']?>"/>
     </div>
	<div>
    <label class="field" for="activities">Activities during College: </label>
    <textarea name="activities" rows="3"><?=$education['organization']?></textarea>
	</div>
    <div id="buttons" align="center"><input type="submit" name="submit" value="Submit" />
<input type="submit" name="skip" value="Cancel" />
</div>
<!--<input type="submit" name="add" value="Add another college" /></div>-->
</form></th>
  <th scope="row">&nbsp;</th>
  </tr>
  <tr>
    <th height="70" colspan="2" scope="row" style="border-top: 1px solid #4F7D7D;">
    <?php
	define('__ROOT__', dirname(__FILE__)); 
	require_once(__ROOT__.'/generalfunctions/template.php');
	echo printFooter();
	?>
    </th>
    <th scope="row">&nbsp;</th>
  </tr>
</table>
</div>
</body>
</html>