<?php
include("database.php");
session_start();
connectToDatabase();
printf('"First Name","Last Name","Email Address",City,State,Country,Skills');
$query = sprintf("SELECT * FROM users u, c_applied_2 c WHERE u.idnum=c.idnum");
$result = mysql_query($query);
if (!$result)
{
	echo(mysql_error());
}
if (mysql_num_rows($result) > 0)
{
	while ($row = mysql_fetch_assoc($result))
	{
		printf(',"%s","%s","%s","%s","%s","%s","%s"', $row['first_name'], $row['last_name'], $row['email'], $row['city'], $row['state'], $row['country'], $row['skills']);
	}
}
?>