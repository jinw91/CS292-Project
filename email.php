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
		$message = "Hey ".$user['first_name'].",<br/><br/>I hope you all are enjoying the summer. We've been making some big<br />
changes here at ProArcs as we continue to do our best to bring you the<br />
best internship opportunities available. As we continue to polish the<br />
site, we wanted to ask for your support. If you are in the <b>Nashville</b><br />
area for the summer or are willing to relocate to the <b>Nashville area</b><br />
and are looking for employment for at least one month, please contact<br />
us by replying to this email. We are currently looking to match some<br />
students directly with internships, so they can each attest to the<br />
quality of the service we are providing. Thanks again for your<br />
continued support!<br/><br/>Thanks, <br/>Professional Archives";
		$msgheader = "From: Professional Archives <proarcs@proarcs.com>\r\n";
		$msgheader .= "MIME-Version: 1.0\n";
		$msgheader .= "Content-type: text/html; charset=us-ascii\n";
		mail($user['email'], "Professional Archives: Nashville Internships", $message, $msgheader);
		
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