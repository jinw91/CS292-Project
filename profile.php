<?php
session_start();
define('__ROOT__', dirname(__FILE__)); 
require_once(__ROOT__.'/generalfunctions/database.php');
require_once(__ROOT__.'/generalfunctions/profile_functions.php');
$tbl_name="users";
$connect = connectToDatabase();
if (!$connect)
{
	echo "failed to connect";	
}
if ($_GET['submit'] == "Search" || isset($_GET['idnum']))
{
	$idnum = $_GET['idnum'];
}
else
{
	$idnum = $_SESSION['idnum'];
}
$query = sprintf("SELECT * FROM users WHERE idnum=%d", $idnum);
$result = mysql_query($query);
if (!$result)
{
	echo mysql_error();	
}

$v_users = mysql_fetch_assoc($result);

//Checks if visited.
$query = sprintf("SELECT * FROM viewed WHERE to_id=%d", $idnum);
$result = mysql_query($query);
if (!$result)
{
	$error = mysql_error();	
}
else if (mysql_num_rows($result) == 0)
{
	$query = sprintf("INSERT INTO viewed (from_id, to_id, viewed) VALUES (%d, %d, NOW())", $_SESSION['idnum'], $idnum);
	$result = mysql_query($query);
}
else if (mysql_num_rows($result) > 0)
{
	$query = sprintf("UPDATE viewed SET viewed=NOW() WHERE to_id=$idnum");
	$result = mysql_query($query);
}

if (is_null($v_users['picture']))
{
	$v_users['picture'] = "images/default.png";
}
$p_name = $v_users['first_name']." ".$v_users['last_name'];

$query = sprintf("SELECT * FROM education_data WHERE idnum=%d", $idnum);
$result = mysql_query($query);
$v_education = mysql_fetch_assoc($result);
$query = sprintf("SELECT * FROM work_data WHERE idnum=%d", $idnum);
$result = mysql_query($query);
$v_work = mysql_fetch_assoc($result);
/**
Creates the message under experience.
**/
if ($idnum == $_SESSION['idnum'])
{
	$v_work_message = work_own($idnum);
}
else
{
	$v_work_message = work($idnum);
}
/**
Creates the message under extracurriculars.
**/
if ($v_education['organization'] == "")
{
	$extracurriculars = "<li>Extracurriculars not available.";
	if ($idnum == $_SESSION['idnum'])
	{
		$extracurriculars .= "<div id='edit_profile'><a href='education.php#activities'>Add</a></div>";
	}
	$extracurriculars .= "</li>";
}
else
{
	$extracurriculars = "<li>".$v_education['organization']."</li>";
	if ($idnum == $_SESSION['idnum'])
	{
		$extracurriculars .= "<div id='edit_profile'><a href='education.php#activities'>Edit</a></div>";
	}
	$extracurriculars .= "</li>";
}

if (isset($_GET['follow']) && $idnum != $_SESSION['idnum'])
{
		$query = sprintf("INSERT INTO subscribed (from_id, to_id, subscribed) VALUES ('%d', '%d', NOW())", $_SESSION['idnum'], $idnum);
		$result = mysql_query($query); 
		$message = "<script type='text/javascript'>alert('You are now following $p_name');</script>";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$p_name?></title>
<link href="member.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?=$message?>
<div class="inner"> 
<table width="100%" border="0" cellpadding="0" cellspacing="0" style="border:1px 1px 1px 1px">
  <tr>
    <th height="56" colspan="3" scope="col" class="top">
      <div id="sitenav" align="right"><ul>
        <li><a href="./home.php">Home</a></li> 
        <li><a href="profile.php">Profile</a></li>
         <li><a href="inbox.php">Inbox</a></li>
        <li><a href="careers.php"> Careers</a></li></ul>
      </div></th>
    <th width="143" scope="col" class="tright">
      <div id="sitenav" align="center">
        <ul><li><a href="logout.php">Logout</a></li></ul></div>
      </th>
  </tr>
  <tr>
    <th width="200" height="258" align="left" valign="top" scope="row" style="margin-top:10px;">
    <img align="absmiddle" src="<?=$v_users['picture']?>" width="200" height="200" style="display: block; border:solid 4px #128517; margin-top:10px; margin-left: 5px;"/>
    <div align="center"><a href="compose.php?idnum=<?=$idnum?>"><img src="images/mail.jpg" alt="Send a message to <?=$p_name?>" width="30" height="30"/></a>
    <a href="profile.php?idnum=<?=$idnum?>&follow=1"><img src="images/follow.jpg" alt="Follow <?=$p_name?>" width="30" height="30" /></a>
    </div>
    </th>
    <td colspan="2" align="center" valign="top">
    <div style="height:250px; background-image:url(site_im/title_profile.png); margin-top:0px; padding-top: 0px;"><br />
      <h1 align="center" style="font-family:'Times New Roman', serif; font-size: 24px; text-decoration:underline"><?=$p_name?></h1>
      <p style="font-size:18px;"><br />
        <?=$v_education['college']?><br />
        <?=$v_education['major']?><br />
        <?php 
		if ($v_users['city'] != "" && $v_users['state'] != "")
		{
			echo $v_users['city'].", ".$v_users['state']."<br />";
		}
		$temp = substr($v_education['college_end'], 0, 4);
		$tmpmonth = intval(substr($v_education['college_end'], 5, 2));
		if ($temp != '0000' && isset($temp))
		{
			if ($tmpmonth <= 6) 
				echo "Expected Graduation: Spring ".$temp;
			else if ($tmpmonth < 8)
				echo "Expected Graduation: Summer ".$temp;
			else
				echo "Expected Graduation: Fall ".$temp;
		}
		?><br />
      </p>
      <p><?=$v_users['status']?></p>
</div>
      </td>
    <td width="143" rowspan="3">&nbsp;</td>
  </tr>
  <tr>
    <th colspan="3" valign="top" align="left" background="site_im/blank.png" style="background-repeat:no-repeat; background-position: center top;">
    <script type="text/javascript">
	function clear()
	{
		var tag = document.getElementById("start");
		tag.innerHTML = "";
	}
	function experience()
	{
		clear();
		var tag = document.getElementById("start");
		tag.innerHTML += "<?=$v_work_message?>";
		return true;
	}
	function skills()
	{
		clear();
		var tag = document.getElementById("start");
		tag.innerHTML += "<li>Skills not available.</li>";
		return true;
	}
	function extra()
	{
		clear();
		var tag = document.getElementById("start");
		tag.innerHTML += "<?=$extracurriculars?>";
		return true;
	}
	</script>
      <ul id="prof_cat">
      <li id="high_cat">
      <a id="experience" href="#" onclick="return experience();">Experience</a></li>
      <li><a id="skills" href="#" onclick="return skills();">Skills</a></li>
      <li><a id="extra" href="#" onclick="return extra();">Extracurriculars</a></li>
      <!--<li><a id="resume" href="resumes/<?=$resume?>" onclick="return true;">Resume</a></li>-->
      </ul>
      <ul id="start"><script>experience();</script></ul>
      <!-- 
      <div align="left">
       <ul>
          <?=$_SESSION['v_education']?></ul>
        </div>
      <div align="left">
        <ul>
          <?=$_SESSION['v_work']?>
        </ul></div> -->
    </th>
    </tr>
  <tr>
    <th height="30" colspan="3" valign="top" align="left" background="site_im/blank.png" style="background-repeat:no-repeat; background-position:center bottom;">&nbsp;</th>
  </tr>
  <tr>
    <th height="70" colspan="4" scope="row"  style="border-top: 1px solid #4F7D7D;">
	<?php
	define('__ROOT__', dirname(__FILE__)); 
	require_once(__ROOT__.'/generalfunctions/template.php');
	echo printFooter();
	?>
    </th>
    </tr>
</table>
</div>
</body>
</html>
