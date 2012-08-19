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

/*$query = "SELECT u.idnum, u.first_name, u.last_name, SUM(DATEDIFF(company_end, company_start))/365
FROM users u, work_data w
WHERE u.idnum=w.idnum
GROUP BY idnum";*/
$query = "SELECT * FROM education_data WHERE idnum>5";
$res = mysql_query($query);

while($row = mysql_fetch_assoc($res))
{
	
	$idnum = $row['idnum'];
	$print = $idnum;
	
	$query2 = sprintf("INSERT INTO education_data_new (idnum, college, title, major, minor, college_start, college_end, gpa, honors) VALUES ('$idnum', '%s', '%s', '%s', '%s', '%s', '%s', '%f', '%s')", mysql_real_escape_string($row['college']), mysql_real_escape_string($row['title']), mysql_real_escape_string($row['major']), mysql_real_escape_string($row['minor']), $row['college_start'], $row['college_end'], $row['gpa'], mysql_real_escape_string($row['honors']));
	echo $print . $query2 . "<br>";
	$res2 = mysql_query($query2);
	if (!$res2)
	{
		echo mysql_error();
	}
}

/*
$query = "SELECT * FROM users";
$res = mysql_query($query);

while($row = mysql_fetch_assoc($res))
{
	
	$status = $row['status'];
	$idnum = $row['idnum'];
	$print = $idnum . "\t". $status. "<br>";
	echo $print;
	$query2 = sprintf("INSERT INTO about (idnum, field, city, state, country, pay, hourly, status) VALUES ('$idnum', '%s', '%s', '%s', '%s', '%d', '%d', '%s')", $row['field'], $row['city'], $row['state'], $row['country'], $row['pay'], $row['hourly'], $row['status']);
	$res2 = mysql_query($query2);
}
*/

?>

</body>
</html>