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
?>
