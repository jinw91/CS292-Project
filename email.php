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
$query = sprintf("SELECT * FROM users WHERE idnum<>164 OR idnum<>168");
$result = mysql_query($query);
if (!$result)
{
	$error = mysql_error();
}
while ($user = mysql_fetch_assoc($result))
{
		$message = "Hey ".$user['first_name'].",<br/><br/>If you are looking for an internship, and<br />
  especially for those of you in Nashville, we're here to help.<br />
  First, head over to <a href='http://www.proarcs.com/'>www.proarcs.com</a> to polish your professional<br />
  profile. Then email <a href='mailto:proarcs@proarcs.com'>proarcs@proarcs.com</a> with the following:<br />
  desired industry of internship, paid or unpaid, availability (start<br />
  and end date), do you have reliable transportation?, and willingness<br />
  to accept internships that may not match all of your desired fields.<br />
  We are looking for candidates to match with some internships in<br />
  Nashville that we have found. Your support is essential to our<br />
  development and greatly appreciated!<br />
  <br />
  Also remember to support our social media! Please like our <a href='https://www.facebook.com/pages/Professional-Archives/165677133537640'>Facebook</a><br />
  page.<br />
  and follow us on twitter @proarcs.<br/><br/>Thanks, <br/>Professional Archives";
		$msgheader = "From: Professional Archives <proarcs@proarcs.com>\r\n";
		$msgheader .= "MIME-Version: 1.0\n";
		$msgheader .= "Content-type: text/html; charset=us-ascii\n";
		mail($user['email'], "Professional Archives: Filling Out Your Profile For Internships", $message, $msgheader);
		
		$sent = $sent . "TO: ".$user['idnum']." EMAIL: ".$user['email'];
}

		
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?=$error?>
<?=$sent?>

</body>
</html>