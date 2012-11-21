<?php
// converts mysql query result to a json object
function mysql2json($mysql_result) {
	$json="[";
	$rows = mysql_num_rows($mysql_result);
	for ($x=0;$x<$rows;$x++) {
		$row = mysql_fetch_array($mysql_result);
		$json.="{'caption':'".$row[0]." ".$row[1]."','value':'".$row[2]."'";
		if ($x==$rows-1) {
			$json.="}";
		} else {
			$json.="},";
		}
	}
	$json.="]";
	return($json);
}

function listOfFriends($id, $default)
{
	$query = sprintf("SELECT * FROM friends f, users u WHERE f.from_id=$id AND u.idnum=f.to_id");
	$result = mysql_query($query);
	if (!$result)
	{
		return("Error");
	}
	if (mysql_num_rows($result) == 0)
	{
		return("<option>Other</option>");
	}
	$message = "";
	while ($row = mysql_fetch_assoc($result))
	{
		$add = "";
		if ($row['idnum']==$default)
		{
			$add = " selected='selected'";
		}
		$message .= "<option".$add." value='".$row['idnum']."'>".$row['first_name']." ".$row['last_name']."</option>";
	}
	$return($message);
}
?>
