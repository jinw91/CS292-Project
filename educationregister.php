<?php
session_start();
define('__ROOT__', dirname(__FILE__)); 
require_once(__ROOT__.'/generalfunctions/database.php');
$tbl_name="users";
$connect = connectToDatabase();
if (!$connect)
{
	$error = "failed to connect";
}

if ($_POST['submit'] == "Register Now")
{
	$_SESSION['complete'] = 1;
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$emailaddress = $_POST['emailaddress'];
	$user_password = $_POST['user_password'];
	
	$emailavailable = emailAvailable($emailaddress);
	if ($emailavailable)
	{
		$query = "INSERT INTO users (email, password, first_name, last_name) VALUES ('$emailaddress', '$user_password', '$first_name', '$last_name')";
	
		$result = mysql_query($query);
		if (!$result)
		{
			$error = mysql_error();	
		}
		$_SESSION['idnum'] = validateLogin($emailaddress, $user_password);
		
		
	}
	else
	{
		header("Location: Home.html");
	}
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
    <form action="workregister.php" method="post">
	<div align="center">
    <p>
    An email was sent out to confirm your account. Please click the link and your account will be verified.
    </p>
    <p>
    For the best use of your profile, please fill out your general and college information. </p></div>
    <div id="education">
        <label class="field" for="college">College Name: </label>
        <select id="college" name="college" size=1 onchange="addothercollege()">
        	<option value="Vanderbilt University">Vanderbilt University</option> 
            <option value="other">Other</option>		
        </select>
        <input id="other" type="hidden" name="other" width="100"/>
    </div>
    <div>
        <label class="field" for="college">Title: </label>
        <select name="title" size=1>
        	<option value="Bachelor of Arts">Bachelor of Arts</option>
            <option value="Bachelor of Science">Bachelor of Science</option>
            <option value="Bachelor of Engineering">Bachelor of Engineering</option>
            <option value="Bachelor of Nursing">Bachelor of Nursing</option>
            <option value="Associate's Degree">Associate's Degree</option> </select>
            
    </div>
   <div id="static_major">
        <label class="field" for="major">Area(s) of Study: </label> <input type="text" name="major"/><br />
	<label class="subscript" for="major">Example: Computer Science, Math</label>
    </div>
    <div id="date">
    	<label class="field" for="college_year_start">Time Attended: </label>
        <script>
		document.write("<select name=\"college_month_start\">");
		months();
		document.write("<select style=\"width: 60px;\" name=\"college_year_start\">");
		years();
		document.write("<label for=\"college_month_end\"> - </label>");
		document.write("<select name=\"college_month_end\">");
		months();
		document.write("<select style=\"width: 60px;\" name=\"college_year_end\">");
		years();
		</script>
    </div>
    <div>    
        <label class="field" for="gpa">Cumulative GPA<sup onclick="return window.alert('Cumulative GPA is shown only for employers, if the GPA is higher than the institution's average. Otherwise, GPA will not be shown on profiles and is strictly confidential.');">1</sup>: </label> <input name="gpa" size=8/>
     </div>
	<div>
    <label class="field" for="activities">Activities during College: </label>
    <textarea name="activities" rows="3"></textarea>
	</div>
    <div id="buttons" align="center"><input type="submit" name="submit" value="Submit" />
<input type="submit" name="skip" value="Skip" /></div>
</form>
	<span id="notes"></span>
	</th>
  <th scope="row">&nbsp;</th>
  </tr>
  <tr>
    <th height="70" colspan="2" scope="row">
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