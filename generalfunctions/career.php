<?php
function applyJob()
{
	$update = "<p id=\"update_message\">Job Applied.</p>";
	$query = sprintf("INSERT INTO u_interested (idnum, jid, is_read) VALUES (%d, %d, 0)", $_SESSION['idnum'], $_GET['jid']);
	$result = mysql_query($query);
	if (!$result)
	{
		$error = mysql_error();
	}
}
?>