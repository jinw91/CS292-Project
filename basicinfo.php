<?php
session_start();
if ($_POST['skip'] == "Cancel")
{
	header("Location: home.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Professional Archives - Personal Data</title>
<link href="member.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="simple.js">
</script>
</head>

<body>
<?php
define('__ROOT__', dirname(__FILE__)); 
require_once(__ROOT__.'/generalfunctions/database.php');
$tbl_name="users";
$connect = connectToDatabase();
if (!$connect)
{
	echo "failed to connect";	
}

$query = sprintf("SELECT * FROM users WHERE idnum=%d", $_SESSION['idnum']);
$result = mysql_query($query);
$user_info = mysql_fetch_assoc($result);
if ($_POST['send'] == "Submit")
{
	$city = $_POST['city'];
	$state = $_POST['state'];
	$field = $_POST['field'];
	$pay = $_POST['income'];
	$status = $_POST['outlook'];
	if (isset($_POST['hourly']))
	{
		$hourly = 1;
	}
	else
	{
		$hourly = 0;
	}
	if (validateLogin($_SESSION['email'], $_POST['old_password']) != -1 && $_POST['password'] == $_POST['new_password'])
	{
		$query = sprintf("UPDATE users SET city='%s', state='%s', country='United States', field='%s', pay='$pay', hourly=$hourly, password='%s', status='$status' WHERE idnum=%d LIMIT 1", $city, $state, $field, $_POST['password'], $_SESSION['idnum']);
		$message = "<p id=\"update_message\">Password changed.</p>";
	}
	else
	{
		$query = sprintf("UPDATE users SET city='%s', state='%s', country='United States', field='%s', pay='$pay', hourly=$hourly, status='$status' WHERE idnum=%d LIMIT 1", $city, $state, $field, $_SESSION['idnum']);
		$message = "<p id=\"update_message\">Basic information updated.</p>";
	}
	$result = mysql_query($query);	
	if (!$result)
	{
		echo mysql_error();	
	}
	
}
$connect = mysql_close();
if (!$connect) {echo "database not closed";}
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
    <div style="font-family: Tahoma, Geneva, sans-serif; font-size:13px; font-style:normal">
    <form action="basicinfo.php" method="post">
<h1 id="edit_title">Edit Basic Information:</h1>
	<?=$message?><br />
	<div>
	<label class="field" for="city">City: </label><input name="city" value="<?=$user_info['city']?>" size=20/> State: <input name="state" value="<?=$user_info['state']?>" size=3 />
    </div>
    <div>
    <label class="field" for="field">Field: </label><input name="field" value="<?=$user_info['field']?>" size=50/>
    </div>
    <div>
    <label class="field" for="outlook">Outlook: </label>
    <select name="outlook" >
    <option>Searching for Internship</option>
    <option>Seeking Part-time</option>
    <option>Seeking Full-time</option>
    <option>Employed</option>
    </select>
    </div>
    <div>
    <label class="field" for="income">Expected Pay: </label>
    <input name="income" value="<?=$user_info['pay']?>" />
    <label for="hourly">Hourly: </label>
    <input type="checkbox" name="hourly"/>
    </div>
    <br />
    <fieldset>
    <legend align="left">Change Password</legend>
    <div>
    <label class="field" for="old_password">Current Password: </label><input name="old_password" size=50/>
    </div>
    <div>
    <label class="field" for="password">New Password: </label><input name="password" size=50/>
    </div>
    <div>
    <label class="field" for="new_password">Confirm Password: </label><input name="new_password" size=50/>
    </div>
    <script>
	selectDefault('outlook', '<?=$status?>');
	</script>
    </fieldset>
    <div align="center">
    <input type="submit" name="send" value="Submit" />
	<input type="submit" name="skip" value="Cancel" />
	</div>
</form>
</div></th>
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