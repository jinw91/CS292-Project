<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
define('__ROOT__', dirname(__FILE__)); 
require_once(__ROOT__.'/generalfunctions/database.php');
$connect = connectToDatabase();

$query = "SELECT * FROM users";
$res = mysql_query($query);

while($row = mysql_fetch_assoc($res))
{
	$old_password = $row['password'];
	$password = hash("salsa20", $old_password);
	
	$print = $password . "\t". $old_password;
	echo $print;
	//$query = sprintf("UPDATE users SET password='%s'", $password);
}

?>

</body>
</html>