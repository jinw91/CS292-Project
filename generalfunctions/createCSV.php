<?php
include("database.php");
session_start();
connectToDatabase();
printf('"Job Applied To","First Name","Last Name","Email Address",City,State,Country,Skills,College,"College City","College State",Degree,Major,Minor,GPA,Honors');
$query = sprintf("SELECT * FROM users u, c_applied_2 c, education_data ed, education_general eg, careers ca WHERE u.idnum=c.idnum AND u.idnum=ed.idnum AND ed.eid=eg.eid AND c.jid=ca.jid");
$result = mysql_query($query);
if (!$result)
{
	echo(mysql_error());
}
if (mysql_num_rows($result) > 0)
{
	while ($row = mysql_fetch_assoc($result))
	{
		printf('"%s","%s","%s","%s","%s","%s","%s","%s"', $row['job_name'], $row['first_name'], $row['last_name'], $row['email'], $row['city'], $row['state'], $row['country'], $row['skills']);
		printf(',"%s","%s","%s","%s","%s","%s","%s","%s"', $row['college'], $row['city'], $row['state'], $row['title'], $row['major'], $row['minor'], $row['gpa'], $row['honors']);
	}
}
?>