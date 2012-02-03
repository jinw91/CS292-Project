<?php 
session_start();
ob_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Logging In</title>
<link href="member.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php
	define('__ROOT__', dirname(__FILE__)); 
	require_once(__ROOT__.'/generalfunctions/database.php');
	$tbl_name="users";
	$connect = connectToDatabase();
	if (!$connect)
	{
		$error = "failed to connect";	
	}
	if ($_POST['login'] == "Log In")
	{
		$_SESSION['email'] = $_POST['email'];
		$password = $_POST['password'];
		$idnum = validateLogin($_SESSION['email'], $password);
		if ($idnum == -1 || $idnum == 57)
		{
			$error = "Invalid Username/Password. Please try again.";
		}
		else
		{
			$_SESSION['idnum'] = $idnum;
			$query = sprintf("SELECT * FROM education_data WHERE idnum=%d",$_SESSION['idnum']);
			$result = mysql_query($query);
			if ($result && mysql_num_rows($result) > 0)
			{
				$_SESSION['education'] = mysql_fetch_assoc($result);
			}
			//setcookie("idnum", $idnum, time() + 60 * 60 * 24 * 60);
			header("Location: home.php");
		}
	}
	else if ($_POST['submit'] == "Submit")
	{
		$emailaddress = $_POST['email_address'];
		$query = sprintf("SELECT * FROM users WHERE email='%s'", $emailaddress);
		$result = mysql_query($query);
		if (!$result || mysql_affected_rows() == 0)
		{
			$error = "Invalid Email Address. Please try again.";
		}
		else
		{
			$res = mysql_fetch_assoc($result);
			if ($res['idnum'] != 57 && $res['idnum'] != 5)
			{
			$message = "Your password is: ".$res['password']."<br/><br/>Thanks, <br/>Professional Archives<br/>Please do not respond to this email.";
			$msgheader = "From: Professional Archives <proarc@proarcs.com>\r\n";
			$msgheader .= "MIME-Version: 1.0\n";
			$msgheader .= "Content-type: text/html; charset=us-ascii\n";
			mail($emailaddress, "Professional Archives Lost Password", $message, $msgheader);
			}
			else
			{
				$error = "Your account has been disabled due to impromper use.
				<br />Please contact an administrator if you wish to unlock it.";
			}
		}
	}
	else
	{
		$error = "Error message.";
	}
?>
<div class="inner_register">
<table border="0" width="100%">
  <tr>
	<th height="136" align="right" class="topcolumn_register">
	  <form action="login.php" method="post" style="font-family:'Times New Roman', Times, serif"> 
	      Email:
	      <input name="email" width="144"/> <br>
	      Password: <input type="password" name="password" width="144"/>
	      <br>
	      Remember Me <input type="checkbox" name="cookie"/>
	      <input name="login" type="submit" value="Log In"/>
      </form>
   </th></tr>
  <tr>
    <th height="150" scope="row" valign="top"><h1 id="edit_title">Retrieve Your Password:</h1>
    <form action="login.php" method="post">
    <div style="color: gray; margin-left: 15px;"><?=$error?></div>
      <p align="center">Please enter your email: <br />
	  <input name="email_address" width="300px" size="40"/></p>
      <p align="center">
      <input type="submit" name="submit" value="Submit" /></p>
    </form>
    </th>
  </tr>
  <tr>
  <th height="70" scope="row" style="border-top: 1px solid #4F7D7D;"><?php
	define('__ROOT__', dirname(__FILE__)); 
	require_once(__ROOT__.'/generalfunctions/template.php');
	echo printFooter();
	?></th>
    </tr>
</table>
</div>
</body>
</html>
<?php
	ob_end_flush();
?>